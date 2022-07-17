<?php 

class account extends database{
	public $TTK, $MK, $role;



	public function selectAll(){
		$query = "select * from account";
		try{
			$table = $this->query($query);
			$arr = array();

			while ($row = $table->fetch_assoc()){
				$item = array('ttk'=>$row['ttk'], 'mk'=>$row['mk'], 'role'=>$row['role']);
				array_push($arr, $item);
			}

			return $arr;				
		} catch (Exception $e){
			echo $e->getMessage();
		}
	}

	public function selectByTTK($TTK){
		$query = "select * from account where ttk = '$TTK'";
		try{
			$table = $this->query($query);
			$arr = array();

			while ($row = $table->fetch_assoc()){
				$item = array('ttk'=>$row['ttk'], 'mk'=>$row['mk'], 'role'=>$row['role']);
				array_push($arr, $item);
			}

			return $arr;				
		} catch (Exception $e){
			echo $e->getMessage();
		}
	}

	public function getRow($TTK){
		$arr = $this->selectByTTK($TTK);
		return isset($arr[0]) ? $arr[0] : null;
	}

	public function getPassword($TTK){
		$row = $this->getRow(TTK);
		return $row['mk'];
	}

	public function getRole($TTK){
		$row = $this->getRow(TTK);
		return $row['role'];
	}

	public function getSize(){
		$arr = $this->selectAll();
		return count($arr);
	}

	public function insert($TTK, $MK, $role = 'student'){
		$row = $this->getRow($TTK);
		if ($row != null){
			// Đã tồn tại tài khoản
			return false;
		} else {
			$query = "insert into account value ('$TTK', '$MK', '$role')";
			try {
				$res = $this->query($query);
				if ($res){
					return true; 
				} else return false;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}

	public function delete($TTK){
		$row = $this->getRow($TTK);
		if ($row == null){
			// Không tồn tại tài khoản
			return false;
		} else {
			$query = "delete account where ttk = '$TTK'";
			try {
				$res = $this->$query($query);
				if ($res){
					return true; 
				} else return false;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}

	public function update($TTK, $MK, $role = 'student'){
		$row = $this->getRow($TTK);
		if ($row == null){
			// Không tồn tại tài khoản
			return false;
		} else {
			$query = "update account set mk = '$MK', role = '$role' where ttk = '$TTK'";
			try {
				$res = $this->query($query);
				if ($res){
					return true; 
				} else return false;
			} catch (Exception $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}

}


?>