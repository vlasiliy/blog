<?php
// auto-generated by sfViewConfigHandler
// date: 2012/04/19 16:22:13
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addJavascript('cufon-yui.js', '', array ());
  $response->addJavascript('arial.js', '', array ());
  $response->addJavascript('cuf_run.js', '', array ());
  $response->addJavascript('jquery-1.3.2.min.js', '', array ());
  $response->addJavascript('radius.js', '', array ());


