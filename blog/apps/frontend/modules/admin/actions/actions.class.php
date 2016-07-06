<?php

require_once dirname(__FILE__).'/../lib/adminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminGeneratorHelper.class.php';

/**
 * admin actions.
 *
 * @package    blog_admin_system
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminActions extends autoAdminActions
{
	//private  $availableChars = '0123456789abcdefghijklmnopqrstuvwxyz-)(*~@+*.,';
	//private  $titleLentgh = 254;
	//private $contentLength =  3000;
	//	public function __construct() {
	//		$this->availableChars = '0123456789abcdefghijklmnopqrstuvwxyz-)(*~@+*.,';
	//		$this->titleLentgh = 254;
	//		$this->contentLength =  3000;
	//	}
	public function executeNewTag(sfWebRequest $request) {
		return sfView::SUCCESS;
	}
	public function executeShowAll(sfWebRequest $request) {
//		$r = new Tag();
		//		$r->
		$this->tags = Doctrine_Query::create()->
		select('t.id,t.name,t.article_id')->from('tag t')->
		where("true")->
		execute();
//		$this->s="sss";
//		$this->a = array();//$this->tags[0]->getArticleId();
//		$this->i = array();
//		$this->n = array();
//		foreach ($this->tags as $tag) {
//			array_push($this->a,$tag->article_id);
//		}
//		foreach ($this->tags as $tag) {
//			array_push($this->i,$tag->id);
//		}
//		foreach ($this->tags as $tag) {
//			array_push($this->n,$tag->n);
//		}
		//	$this->tags[0]->
		return sfView::SUCCESS;
			
	}
	public function executeAddTag(sfWebRequest $request) {
		$tag = new Tag();
		$tag->name = $request->getParameter('tagName');
		$tag->article_id = $request->getParameter('article_id');
		switch($request->getParameter('act')){
			case 1:

				$this->x = 'delele';
				//$tag->id= $tag->id;
				//$tag->deleteNode();
				//$tag->clearAccessor('article_id');
				//$tag->article_id = '';
				//$tag->trySave();
				//$tag->delete();
				//$this->redirect('/admin/newTag',200);
				return sfView::SUCCESS;
				break;
			case 2:
				$this->x = 'add';
				$tag->trySave();
				return sfView::SUCCESS;
				$this->redirect('/admin/newTag',200);
				break;
			case 3:
				$this->x = 'edit';
				//$tag->name = null;
				//if($tag->exists()){
				Doctrine_Query::create()->
				delete()->from('tag t')->
				Where('t.name = ?',$request->getParameter('tagName'))->
				execute();
				$tag->trySave();
				return sfView::SUCCESS;
				$this->redirect('/admin/newTag',200);
				//}
		}
		$this->x = 'n';
		return sfView::SUCCESS;
		$this->redirect('admin/newTag',200);
		//return sfView::SUCCESS;
	}
	public function executeBackUp(sfWebRequest $request) {
		$this->posts = Doctrine_Query::create()
		//->select('c.id, s.first_name, s.last_name, s.student_number')
		->select('a.*')
		->from('article a')
		//->innerJoin('c.Student s')
		->execute();
		$this->str = '<all>';
		foreach ($this->posts as $post) {
			$this->str .= '<post>';
			$this->str .= "<id>$post->id</id>";
			$this->str .= "<title>$post->title</title>";
			$this->str .= "<content>$post->content</content>";
			$this->str .= "<created_at>$post->created_at</created_at>";
			$this->str .= "<like_>$post->like_</like_>";
			$this->str .= "<dislike_>$post->dislike</dislike_>";
			$this->str .= '</post>';
		}
		$this->str .= '</all>';
		return sfView::SUCCESS;
	}
	//	public function executeBackUp(sfWebRequest $request) {
	//		$this->input = '';
	//		$this->posts = Doctrine_Query::create()
	//		//->select('c.id, s.first_name, s.last_name, s.student_number')
	//		->select('a.*')
	//		->from('article a')
	//		//->innerJoin('c.Student s')
	//		->execute();
	//		$this->str = '<all>';
	//		foreach ($this->posts as $post) {
	//			$p = new Article();
	//
	//
	//			$this->str .= '<post>';
	//			$this->str .= "<id>$post->id</id>";
	//			$this->str .= "<title>$post->title</title>";
	//			$this->str .= "<content>$post->content</content>";
	//			$this->str .= "<created_at>$post->created_at</created_at>";
	//			$this->str .= "<like_>$post->like_</like_>";
	//			$this->str .= "<dislike_>$post->dislike</dislike_>";
	//			$this->str .= '</post>';
	//		}
	//		$this->str .= '</all>';
	//		return sfView::SUCCESS;
	//	}
	public function executeAddRandomArticle(sfWebRequest $request) {
		$art = new Article();
		$art->setTitle($this->getRandomTitle());
		$art->setContent($this->getRandomContent());
		$art->trySave();
		return sfView::SUCCESS;
	}
	private function getRandomTitle(){
		//		$length = mt_rand(1,$this->titleLentgh);
		//		//$characters = ;
		//		$string ='';
		//		for ($p = 0; $p < $length; $p++) {
		//			$string .= $this->availableChars[mt_rand(0, strlen($this->availableChars))];
		//		}
		//		return $string;
		//return 'randomTitle';
		$length = 10;
		$characters = "\n0123456\n789abcdef\nghijklmno\npqrstuvwxyz\n";
		$string ='';
		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters))];
		}
		return $string;
	}
	private function getRandomContent(){
		//		$length = mt_rand(1,$this->contentLength);
		//		//$characters = ;
		//		$string ='';
		//		for ($p = 0; $p < $length; $p++) {
		//			$string .= $this->availableChars[mt_rand(0, strlen($this->availableChars))];
		//		}
		//		return $string;
		//return 'randomContent';
		$length = 100;
		$characters = "\n0123456\n789abcdef\nghijklmno\npqrstuvwxyz\n";
		$string ='';
		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters))];
		}
		return $string;
	}
}
