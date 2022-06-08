<?php

class ItemsController extends Controller {

	function view($id = null,$name = null) {
 //               $todo = $_POST['todo'];
		$this->set('title',$name.' - My Todo List App');
		$this->set('todo',$this->Item->select($id));

	}
	
	function viewall() {
//                $todo = $_POST['todo'];
		$this->set('title','All Items - My Todo List App');
		$this->set('todo',$this->Item->selectAll());
	}
	
	function add() {
		$todo = $_POST['todo'];
		$this->set('title','Success - My Todo List App');
		$this->set('todo',$this->Item->query('insert into items (item_name) values (\''.mysqli_real_escape_string($this->Item->_dbHandle, $todo).'\')'));	
	}
	
	function delete($id = null) {
		$this->set('title','Success - My Todo List App');
//		$this->set('todo',$this->Item->query('delete from items where id = \''.mysqli_real_escape_string($this->Item->_dbHandle, $id).'\''));
                $this->set('todo',$this->Item->query('delete from items where id = \''.$this->Item->_dbHandle->real_escape_string($id??"").'\''));
	}

}
