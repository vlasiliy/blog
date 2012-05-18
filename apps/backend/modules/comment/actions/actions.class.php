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
  public $id_post;
    
  public function executeListofpost(sfWebRequest $request)
  {
      
    $this->id_post = $request->getParameter('id');
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
  
  protected function getPager()
  {
    $pager = $this->configuration->getPager('post');
    $pager->setQuery($this->buildQuery());
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }
  
  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }
    
}
