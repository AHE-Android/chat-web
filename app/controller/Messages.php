<?php

class Messages
{
	private lastTimestamp;

	public function __constructor(){
		$this->lastTimestamp = time()-1*7*24*60*60;
	}

	public function getLastMessages(){
		$array = [];
		$query = $this->db->collection($this->name)->where($field, $operator, $value)->documents()->rows();
		if(!empty($query)){
			foreach($query as $item){
				$array[] = $item->data();
			}
		}
		return $array;
	}
}