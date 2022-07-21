<?php
class message extends database{
	public $ttk1, $ttk2, $datetime;

	//hàm search user
	public function selectSearchUser($input){
		$query = "select ttk, concat(ho,' ', dem,' ', ten) as hoten from profile, user where ((mssv like '%$input%') or (concat(ho,' ', dem,' ', ten) like '%$input%')) and profile.mssv=user.ttk order by mssv";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'ttk'			=>$row['ttk'],
					'hoten'			=>$row['hoten'],
				);
				array_push($arr, $item);
			}
			return $arr;
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function selectUserChatOf($ttk){
		$query = "select chat.id from user_chat, chat where user_chat.chatid=chat.id and user_chat.ttk = '$ttk' order by chat.time desc";
		try{
			$table = $this->query($query);
			$chatuserids = array();
			while ($row = $table->fetch_assoc()){
				array_push($chatuserids, $row['id']);
			}
			$res = array();
			foreach ($chatuserids as $chatuserid){
				$item = $this->selectChatOf($chatuserid, $ttk);
				if ($item)
					array_push($res, $item);
			}
			return $res;
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function selectChatOf($chatid, $ttk){
		$query = "select user_chat.chatid, concat(user.ho, ' ', user.ten, ' ', user.ttk) as username from user, user_chat where user_chat.ttk=user.ttk and user_chat.chatid = '$chatid' and user.ttk<>'$ttk' ";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'username' => $row['username'],
					'chatid'	   => $row['chatid']
				);
				array_push($arr, $item);
			}
			return isset($arr[0]) ? $arr[0] : null;
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getMessage($chatid)
	{
		$query = "select message.content, message.ttk from message, chat where message.chatid = chat.id and chat.id='$chatid' order by message.time asc";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'content' => $row['content'],
					'ttk'     => $row['ttk']
				);
				array_push($arr, $item);
			}
			return $arr;
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function insertMessage($ttk, $chatid, $message)
	{
		$time = gettime();
		$query = "insert into message value(null, '$ttk', '$chatid', '$message', null, '$time')";
		return $this->query($query);
	}

	public function insertChat(){

	}

	public function detailMessage()
	{

	}



	public function getUser($chatid, $ttk)
	{
		$query = "select user.ttk, concat(user.ho, ' ', user.ten, ' ', user.ttk) as username from user, user_chat where user_chat.ttk=user.ttk and user_chat.chatid='$chatid' and user.ttk<>'$ttk'";
		try{
			$table = $this->query($query);
			$arr = array();
			while ($row = $table->fetch_assoc()){
				$item = array(
					'username' => $row['username'],
				);
				array_push($arr, $item);
			}
			$res = implode(', ', $arr[0]);
			return $res;
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}


}
?>