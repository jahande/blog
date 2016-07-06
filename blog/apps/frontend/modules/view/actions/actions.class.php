<?php

/**
 * view actions.
 *
 * @package    blog_admin_system
 * @subpackage view
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class viewActions extends sfActions
{
	public function executeCommentLiker(sfWebRequest $request){
		$this->comment = Doctrine_Query::create()
		->select('*')
		->from('comment c')
		->where('c.id = ?', $request->getParameter('id'))
		->fetchOne();
		$this->comment->like_ ++;
		$this->comment->trySave();
		return sfView::SUCCESS;
		//$this->forward('view','index');
	}
	public function executeCommentDisliker(sfWebRequest $request){
		$this->comment = Doctrine_Query::create()
		->select('*')
		->from('comment c')
		->where('c.id = ?', $request->getParameter('id'))
		->fetchOne();
		$this->comment->dislike ++;
		$this->comment->trySave();
		return sfView::SUCCESS;
		//	$this->forward('view','index');
	}
	public function executeLiker(sfWebRequest $request){
		$this->post = Doctrine_Query::create()
		->select('*')
		->from('article a')
		->where('id = ?', $request->getParameter('id'))
		->fetchOne();
		$this->post->like_ ++;
		$this->post->trySave();
		return sfView::SUCCESS;
		//	$this->forward('view','index');
	}
	public function executeDisliker(sfWebRequest $request){
		$this->post = Doctrine_Query::create()
		->select('*')
		->from('article a')
		->where('id = ?', $request->getParameter('id'))
		->fetchOne();
		$this->post->dislike ++;
		$this->post->trySave();
		return sfView::SUCCESS;
		//$this->forward('view','index');
	}
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->findUserProperties();
		//$this->x = "ruhi";

		//		$this->getUser()->

		$this->posts = Doctrine_Query::create()
		//->select('c.id, s.first_name, s.last_name, s.student_number')
		->select('*')
		->from('article a')
		//->innerJoin('c.Student s')
		->where('a.created_at> ?', date('Y-m-d H:i:s', time() - 86400 * 30))
		->execute();
		//$this->forward('default', 'module');


		$this->commentCounts();

		return sfView::SUCCESS;
	}
	public function executeShowComments(sfWebRequest $request)
	{
		$this->findUserProperties();
		//TODO

		$id = $request->getParameter('id');
		$this->postId  = $id;

		$this->post = Doctrine_Query::create()
		->select('*')
		->from('article a')
		->where('a.id= ?', $id )
		->fetchOne();

		$this->comments = Doctrine_Query::create()
		->select('*')
		->from('comment c')
		->where('c.article_id= ?', $id)
		->execute();

		//###############
		//$this->form_ = new ArticleForm();

		//$this->processForm($request, $this->form_);

		//$this->setTemplate('new');
		//##################
		return sfView::SUCCESS;
	}
	public function executeShowTag(sfWebRequest $request)
	{
		$this->findUserProperties();
		//$this->x = $request->getParameter('tag_name');
		//return sfView::SUCCESS;
		$this->tagName = $request->getParameter('tag_name');

		//$this->tagName = 'oiut';

		$this->tags = Doctrine_Query::create()
		//->select('c.id, s.first_name, s.last_name, s.student_number')
		->select('a.*,t.id')
		->from('tag t')
		->innerJoin('t.Article a')
		->where('t.name = ?', $this->tagName)
		->execute();

		$this->commentCounts();

		return sfView::SUCCESS;
	}
	public function executeShowArchive(sfWebRequest $request)
	{
		$this->findUserProperties();

		$year_month = $request->getParameter('year_month');
		$from = date('Y-m-d H:i:s',strtotime("1 $year_month"));
		$to = date('Y-m-d H:i:s',86400 * 30+strtotime("1 $year_month"));

		$this->posts = Doctrine_Query::create()
		->select('*')
		->from('article a')
		->where('a.created_at> ?', $from)
		->andWhere('a.created_at< ?', $to)
		->execute();

		$this->commentCounts();

		return sfView::SUCCESS;
	}
	public function executeAjaxAddComment(sfWebRequest $request){
		$this->id = $request->getParameter('id');

		$this->com  = new Comment();
		$this->com->article_id = $this->id;
		$this->com->author = $request->getPostParameter('comment[author]');
		$this->com->content = $request->getPostParameter('comment[content]');
		$this->com->like_ = 0;
		$this->com->dislike = 0;
		$this->com->created_at = date('Y-m-d H:i:s', time());
		$this->com->trySave();
		return sfView::SUCCESS;
	}
	public function executeAddComment(sfWebRequest $request) {
		$this->id = $request->getParameter('id');
		//		if($request->isXmlHttpRequest()){
		//			//$this->id = $request->getParameter('id');
		//			$com  = new Comment();
		//			$com->article_id = $this->id;
		//			$com->author = $request->getPostParameter('comment[author]');
		//			$com->content = $request->getPostParameter('comment[content]');
		//			$com->like_ = 0;
		//			$com->dislike = 0;
		//			$com->created_at = date('Y-m-d H:i:s', time());
		//			return sfView::SUCCESS;
		//		}

		$com  = new Comment();
		$com->article_id = $this->id;
		$com->author = $request->getPostParameter('comment[author]');
		$com->content = $request->getPostParameter('comment[content]');
		$com->like_ = 0;
		$com->dislike = 0;
		$com->created_at = date('Y-m-d H:i:s', time());
		if($com->trySave()){
			return sfView::SUCCESS;
		}else{
			return sfView::ERROR;
		}
	}
	private function commentCounts(){
		$this->findUserProperties();

		$this->count_array = array();
		$comments_art_id = Doctrine_Query::create()
		->select('c.article_id')
		->from('comment c')
		->execute();

		foreach ($comments_art_id as $cai) {
			$this->count_array[$cai->article_id]= 0;
		}
		foreach ($comments_art_id as $cai) {
			$this->count_array[$cai->article_id]++;
		}
	}
	private function findUserProperties(){
		$this->user_ = Doctrine_Query::create()
		//->select('c.id, s.first_name, s.last_name, s.student_number')
		->select('u.*')
		->from('user u')
		->fetchOne();
		$this->hasAdminCredential = $this->getUser()->hasCredential('admin');
	}
	//###################

}