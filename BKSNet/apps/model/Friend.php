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


	public function selectAllFriendRequest($ttk){
		$query = "select friendrequest.sender as ttk, ho, dem, ten, school, major from user, profile, friendrequest where user.ttk=friendrequest.sender and friendrequest.sender=profile.mssv and friendrequest.receiver='$ttk' order by friendrequest.time";
		try{
			$table = $this->query($query);
			$arr = array();
			while($row = $table->fetch_assoc()){
				$item = array(
				'ttk'              =>$row['ttk'],
				'hoten'            =>$row['ho'].' '.$row['dem'].' '.$row['ten'],
				'school'           =>$row['school'],
				'major'            =>$row['major']
				);
				array_push($arr, $item);
			}
			return $arr;
		} catch(Exception  $e){
			echo $e->getMessage();
		}
	}

	public function selectAllFriendRequested($ttk){
		$query = "select friendrequest.receiver as ttk, ho, dem, ten, school, major from user, profile, friendrequest where user.ttk=friendrequest.receiver and friendrequest.receiver=profile.mssv and friendrequest.sender='$ttk' order by friendrequest.time";
		try{
			$table = $this->query($query);
			$arr = array();
			while($row = $table->fetch_assoc()){
				$item = array(
				'ttk'              =>$row['ttk'],
				'hoten'            =>$row['ho'].' '.$row['dem'].' '.$row['ten'],
				'school'           =>$row['school'],
				'major'            =>$row['major']
				);
				array_push($arr, $item);
			}
			return $arr;
		} catch(Exception  $e){
			echo $e->getMessage();
		}
	}

	public function selectfriend($ttk){
		$query = "select mssv, email, gender, dateofbirth, address, decription, grade, school, major, ho, dem, ten from profile, user where profile.mssv = '$ttk' and user.ttk=profile.mssv";
		// $query = "select * from profile right join user on profile.mssv = user.ttk where user.ttk = '$ttk'";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'ho'            =>$row['ho'],
					'dem'           =>$row['dem'],
					'ten'           =>$row['ten'],
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
		//hàm getttime được chuyển vào trong lib/route
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

	public function insertrequest($receiver){
		$time = gettime();
		$sender = $_COOKIE['ttk'];
		if($_COOKIE['ttk'] == $receiver){
			return false;
		}
		$query = "insert into friendrequest(sender, receiver, time) values('$sender', '$receiver', '$time')";
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

	public function deleterequest($sender){
		$receiver = $_COOKIE['ttk'];
		$query = "delete from friendrequest where sender='$sender' and receiver='$receiver'";
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


	//hàm search user
	public function searchuser($input){
		$query = "select ttk, concat(ho,' ', dem,' ', ten) as hoten, school, major from profile, user where ((mssv like '%$input%') or (concat(ho,' ', dem,' ', ten) like '%$input%')) and profile.mssv=user.ttk order by mssv";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'ttk'			=>$row['ttk'],
					'hoten'			=>$row['hoten'],
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


}
?>