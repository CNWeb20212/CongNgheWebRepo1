<?php
class friend extends database{
	public $ttk1, $ttk2, $datetime;

	public function selectAll($ttk){
		// check order by
		$query = "select ttk, ho, dem, ten, school, major from user, profile, friend  where friend.ttk1 = '$ttk' and user.ttk=friend.ttk2 and user.ttk=profile.mssv order by friend.time";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'ttk'			=>$row['ttk'],
					'hoten'			=>$row['ho'].' '.$row['dem'].' '.$row['ten'],
					'school'        =>$row['school'],
					'major'         =>$row['major']
				);
				array_push($arr, $item);
			}
			return $arr;
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function selectfriend($ttk){
		$query = "select mssv, email, gender, dateofbirth, address, decription, grade, school, major, ho, dem, ten from profile, user where profile.mssv = '$ttk' and user.ttk=profile.mssv";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'ho'            =>$row['ho'],
					'dem'            =>$row['dem'],
					'ten'            =>$row['ten'],
					'mssv'			=>$row['mssv'],
					'email'			=>$row['email'],
					'gender'		=>$row['gender'],
					'dateofbirth'	=>substr(strval($row['dateofbirth']), 0, strpos($row['dateofbirth'], ' ')),
					'address'		=>$row['address'],
					'decription'	=>$row['decription'],
					'grade'			=>$row['grade'],
					'school'		=>$row['school'],
					'major'			=>$row['major']
				);
				array_push($arr, $item);
			}
			return isset($arr[0]) ? $arr[0] : null;
		} catch (Exception $e){
			echo $e->getMessage();
		}	
	}

	public function deletefriend($ttk1, $ttk2){
		$query = "delete from friend where (friend.ttk1='$ttk1' and friend.ttk2='$ttk2') or (friend.ttk1='$ttk2' and friend.ttk2='$ttk1')";
		try{
			$res = $this->query($query);
			if($res){
				return true;
			} else{
				return false;
			}
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function insertfriend($ttk1, $ttk2){
		//hàm gettime
		// $timestamp = time() + 5*3600;
		// $time = date("Y/m/d h:i:s", $timestamp);
		$time = gettime();
		$query = "insert into friend values('$ttk1', '$ttk2', '$time'), ('$ttk2', '$ttk1', '$time')";
		try{
			$res = $this->query($query);
			if($res){
				return true;
			} else{
				return false;
			}
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}

}
?>