<?php

/**
 * post actions.
 */
class postActions extends sfActions
{
  //public $spam = false;  
  
  public function executeIndex(sfWebRequest $request)
  {
      $this->route = "@homepage";
     
      //$this->getUser()->setCulture('ru');
      
      $this->posts = new sfDoctrinePager('Post', sfConfig::get('app_max_post_on_page'));
      $this->posts->setQuery(Doctrine_Core::getTable('Post')->createQuery('a')->orderBy('created_at desc'));
      $this->posts->setPage($request->getParameter('page', 1));
      $this->posts->init();
  }
  
  public function executeTag(sfWebRequest $request)
  {
      $this->route = "@posts_for_tag?id=".$request->getParameter('id');
      
      $this->posts = new sfDoctrinePager('Post', sfConfig::get('app_max_post_on_page'));
      $this->posts->setQuery(Doctrine_Core::getTable('Post')->getPostsForTag($request->getParameter('id')));
      $this->posts->setPage($request->getParameter('page', 1));
      $this->posts->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->form = new CommentPostForm();
      
    $this->comments = CommentTable::getInstance()->getCommentsPost($request->getParameter('id'));
    $this->post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->post);
  }
  
  public function executeSubmit(sfWebRequest $request)
  {
    $id_post = $request->getParameter('id');
    
    if(!$this->getUser()->isAuthenticated())
    {
        $this->redirect($this->generateUrl('post_show', array('id' => $id_post)));
    }
    
    $id_user = $this->getUser()->getGuardUser()->getId();

    if(time() - CommentTable::getInstance()->getDateLastCommentUser($id_post, $id_user) < 120)
    {   
        $this->spam = true;
        
        $this->form = new CommentPostForm();
      
        $this->comments = CommentTable::getInstance()->getCommentsPost($request->getParameter('id'));
        $this->post = Doctrine_Core::getTable('Post')->find(array($request->getParameter('id')));
        $this->forward404Unless($this->post);
    }
    else
    {
        $comment = new Comment();
        $comment->text = $request->getParameter('text');
        $comment->post_id = $request->getParameter('id');
        $comment->sf_guard_user_id = $this->getUser()->getGuardUser()->getId();
        $comment->save();
        $this->redirect($this->generateUrl('post_show', array('id' => $id_post)));
    }
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
