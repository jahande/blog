<?php

/**
 * login actions.
 *
 * @package    blog_admin_system
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->findUserProperties();
		$state  = $request->getParameter('state');
		return sfView::SUCCESS;
		//$this->forward('default', 'module');
	}
	public function executeLogout(sfWebRequest $request)
	{
		$this->findUserProperties();
		if($this->getUser()->isAuthenticated()){
			$this->getUser()->setAuthenticated(false);
			$this->getUser()->getAttributeHolder()->clear();
			return sfView::SUCCESS;
		}else{
			return sfView::ERROR;
		}
		//$this->forward('default', 'module');
	}
	public function executeAuthenticated(sfWebRequest $request)
	{
		$this->findUserProperties();
		$this->name = $request->getParameter('username');
		$password = $request->getParameter('password');
		$this->user__ = Doctrine_Query::create()
		//->select('c.id, s.first_name, s.last_name, s.student_number')
		->select('u.*')
		->from('user u')
		->where('user_name = ?', $this->name)
		->fetchOne();
		//$this->pass = $this->user_->password;
		if($this->user__){
			if($this->user__->password==$password){
				$this->getUser()->setAuthenticated(true);
				$this->getUser()->addCredential($this->user__->credential);
				return sfView::SUCCESS;
			}else{
				$this->getUser()->setAuthenticated(false);
				$this->getUser()->getAttributeHolder()->clear();
				return sfView::ERROR;
				//$this->redirect(url_for(array('module'=>'login', 'action'=>'index')),sfView::ERROR);
			}
		}else{
			return sfView::ERROR;
		}
		//$this->getUser()->setAuthenticated(true);
		//$this->getUser()->setAttribute('nickname', $nickname);
		//$this->getUser()->getAttributeHolder()->clear();
		//$user->addCredential('foo');
		//$user->clearCredentials();

	}
	private function findUserProperties(){
		$this->user_ = Doctrine_Query::create()
		//->select('c.id, s.first_name, s.last_name, s.student_number')
		->select('u.*')
		->from('user u')
		->fetchOne();
		$this->hasAdminCredential = $this->getUser()->hasCredential('admin');
	}
}
