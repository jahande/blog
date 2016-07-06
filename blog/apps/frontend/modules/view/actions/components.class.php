<?php
class viewComponents extends sfComponents
{
	public function executeTagsShower()
	{
		$this->tags = Doctrine_Query::create()
		//->select('c.id, s.first_name, s.last_name, s.student_number')
		->select('*')
		->from('tag')
		->execute();
		$this->tagsFrequent = array();
		foreach ($this->tags as $tag) {
			$this->tagsFrequent[$tag->name] = 0;
		}
		foreach ($this->tags as $tag) {
			$this->tagsFrequent[$tag->name] ++;
		}
		$this->c = "ddd";
	}
	public function executeArchiveShower(){
		$this->links=array();
		$this->currentMonth = date("n",time());
		$this->currentMonth += 0;
		for($i=0;$i<$this->currentMonth;$i++){
			$this->links[$i] = date("F Y",time()-3600*24*30*$i);
		}
	}
}