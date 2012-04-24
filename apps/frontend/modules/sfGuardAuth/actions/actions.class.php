<?php

require_once(dirname(__FILE__)."/../../../../../plugins/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php");

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Evgeny Babin <psylosss@gmail.com>
 * @version
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
  public function executeSignin($request)
  {
    $user = $this->getUser();
    if ($user->isAuthenticated())
    {
      return $this->redirect('@homepage');
    }

    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
    $this->form = new $class();

    //echo $request->getMethod();

    if ($request->isMethod('post'))
    {

      $this->form->bind($request->getParameter('signin'));
      if ($this->form->isValid())
      {
        $values = $this->form->getValues();
        return $this->renderText(json_encode($values['remember']));

        return $this->renderText(json_encode(array_key_exists('remember', $values)));

        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

        if ($request->isXmlHttpRequest())
        {
          return $this->renderText(json_encode('ok'));
        }

        // always redirect to a URL set in app.yml
        // or to the referer
        // or to the homepage
        $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));
        //$signinUrl = $user->getReferer($request->getReferer());

        return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
      }
      else
      {
        if ($request->isXmlHttpRequest())
        {
          return $this->renderText(json_encode('error'));
        }
      }
    }
    else
    {
      // if we have been forwarded, then the referer is the current URL
      // if not, this is the referer of the current request
      $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module)
      {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
    }
  }
}