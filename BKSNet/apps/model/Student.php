<?php 

class student extends database{
	public $MSSV, $ho, $dem, $ten, $email, $gender, $dateofbirth, $address,$description, $grade, $school, $major;

	public function selectAll(){
		// $keys = array('mssv', 'ho', 'dem', 'ten', 'email', 'gender', 'dateofbirth', 'address', 'description', 'grade', 'school', 'major');
		$query = "select * from profile, user where profile.mssv = user.ttk";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'mssv'			=>$row['mssv'],
					'ho'			=>$row['ho'],
					'dem'			=>$row['dem'],
					'ten'			=>$row['ten'],
					'email'			=>$row['email'],
					'gender'		=>$row['gender'],
					'dateofbirth'	=>$row['dateofbirth'],
					'address'		=>$row['address'],
					'description'	=>$row['description'],
					'grade'			=>$row['grade'],
					'school'		=>$row['school'],
					'major'			=>$row['major']
				);
				array_push($arr, $row);
			}
			return $arr;
		} catch (Exception $e){
			echo $e->getMessage();
		}
	}

	public function selectByTTK($TTK){
		$query = "select * from profile, user where user.ttk = '$TTK' and profile.mssv = user.ttk";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'mssv'			=>$row['mssv'],
					'ho'			=>$row['ho'],
					'dem'			=>$row['dem'],
					'ten'			=>$row['ten'],
					'email'			=>$row['email'],
					'gender'		=>$row['gender'],
					'dateofbirth'	=>$row['dateofbirth'],
					'address'		=>$row['address'],
					'decription'	=>$row['decription'],
					'grade'			=>$row['grade'],
					'school'		=>$row['school'],
					'major'			=>$row['major']
				);
				array_push($arr, $row);
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

	public function insertProfile($MSSV, $email, $gender, $dateofbirth, $address, $description, $grade, $school, $major){
		$query = "insert into profile value('$MSSV', '$email', '$gender', '$dateofbirth', '$address', '$description', '$grade', '$school', '$major')";
		try{
			$res = $this->query($query);
			if ($res == null) return false;
			return true;
		} catch (Exception $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function updateProfile($MSSV, $email, $gender, $dateofbirth, $address, $description, $grade, $school, $major){
		$query = "update profile set email = '$email', gender = '$gender', dateofbirth = '$dateofbirth', address = '$address', description = '$description', grade = '$grade', school = '$school', major = '$major' where mssv = '$MSSV'";
		try{
			$res = $this->query($query);
			if ($res) return true;
			else return false;
		} catch (Exception $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function deleteProfile($MSSV){
		$query = "delete profile where mssv = '$MSSV'";
		try{
			$res = $this->query($query);
			if ($res) return true;
			else return false;
		} catch (Exception $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function insertUser($TTK, $ho, $dem, $ten){
		$query = "insert into user value('$TTK', '$ho', '$dem', '$ten')";
		try{
			$res = $this->query($query);
			if ($res) return true;
			else return false;
		} catch (Exception $e){
			echo $e->getMessage();
			return false;
		}	
	}

	public function updateUser($TTK, $ho, $dem, $ten){
		$query = "update user set ho = '$ho', dem = '$dem', ten = '$ten' where ttk = '$TTK'";
		try{
			$res = $this->query($query);
			if ($res) return true;
			else return false;
		} catch (Exception $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function deleteUser($TTK){
		$query = "delete user where ttk = '$TTK'";
		try{
			$res = $this->query($query);
			if ($res) return true;
			else return false;
		} catch (Exception $e){
			echo $e->getMessage();
			return false;
		}
	}


}

?>