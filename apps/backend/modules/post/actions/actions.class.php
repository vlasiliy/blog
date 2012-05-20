<?php

require_once dirname(__FILE__).'/../lib/postGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/postGeneratorHelper.class.php';

/**
 * post actions.
 *
 * @package    blog
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postActions extends autoPostActions
{
    public function executeListComments(sfWebRequest $request)
    {
        //$this->forward ('comment','listofpost',array('id' => $request->getParameter('id')));
        //echo '@comment/'.$request->getParameter('id').'/listofpost';die;
        $this->redirect('comment/listofpost?id='.$request->getParameter('id'));
        
    }
}
