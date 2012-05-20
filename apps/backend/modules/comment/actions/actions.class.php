<?php

require_once dirname(__FILE__).'/../lib/commentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/commentGeneratorHelper.class.php';

/**
 * comment actions.
 *
 * @package    blog
 * @subpackage comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commentActions extends autoCommentActions
{
    
  public function preExecute()
  {
    $this->dispatcher->connect('admin.build_query', array( $this, 'myBuildCriteria'));
    parent::preExecute();
  }
 
  public function myBuildCriteria($event, Doctrine_Query $query)
  {
      $request = $this->getRequest();
      return $query->andwhere('post_id = '.$request->getParameter('id') );
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->post_id = 0;
      
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }  
  
  public function executeListofpost(sfWebRequest $request)
  {
    $this->post_id = $request->getParameter('id');
       
    //$this->comment = CommentTable::getInstance()->getCommentsPost($request->getParameter('id'));
    // 
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    //$this->setFilters(array('post_id' => $request->getParameter('id')));
    
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeFilter(sfWebRequest $request)
  {
     
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('comment/listofpost?id='.$request->getParameter('id'));
      
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('comment/listofpost?id='.$request->getParameter('id'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('comment/listofpost?id='.$request->getParameter('id'));
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('comment/listofpost?id='.$request->getParameter('id'));
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'comment'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirect('comment/listofpost?id='.$request->getParameter('id'));
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('comment')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect('comment/listofpost?id='.$request->getParameter('id'));
  }
   
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect('comment/listofpost?id='.$request->getParameter('id'));
  }
}
