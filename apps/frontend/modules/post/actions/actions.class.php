<?php

/**
 * post actions.
 */
class postActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      //$this->posts = Doctrine_Core::getTable('Post')->createQuery('a')->execute();
      
      $this->posts = new sfDoctrinePager('Post', sfConfig::get('app_max_post_on_page'));
      $this->posts->setQuery(Doctrine_Core::getTable('Post')->createQuery('a'));
      $this->posts->setPage($request->getParameter('page', 1));
      $this->posts->init();
  
  }
  
  public function executeTag(sfWebRequest $request)
  {
      $this->posts = Doctrine_Core::getTable('Post')->getPostsForTag($request->getParameter('id'));
  }

  public function executeShow(sfWebRequest $request)
  {
    
    $this->comments = CommentTable::getInstance()->getCommentsPost($request->getParameter('id'));
    $this->post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->post);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PostForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PostForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('id'))), sprintf('Object post does not exist (%s).', $request->getParameter('id')));
    $this->form = new PostForm($post);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('id'))), sprintf('Object post does not exist (%s).', $request->getParameter('id')));
    $this->form = new PostForm($post);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('id'))), sprintf('Object post does not exist (%s).', $request->getParameter('id')));
    $post->delete();

    $this->redirect('post/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $post = $form->save();

      $this->redirect('post/edit?id='.$post->getId());
    }
  }
}
