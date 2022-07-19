<?php 
class post extends database{
	public $id, $caption, $files, $cntlike, $cntcomment, $cntshare, $user, $group, $time, $access, $comment;

	public function selectPostFor($ttk){
		$query = "select id from (
						(
						    select post.id, teamid, post.time, access 
						    from 
								post left join team on post.teamid = team.id 
						        join user on post.ttk = user.ttk 
						        left join tuongtac on (post.id = tuongtac.id and user.ttk = tuongtac.ttk) 
						    where 
								access='public' 
						        and (isnull(post.teamid)
									or ('20194185' in (select user_team.ttk from user_team where user_team.teamid = post.teamid)))
						)
						union
						(
						    select post.id, teamid, post.time, access 
						    from 
								post left join team on post.teamid = team.id 
						        join user on post.ttk = user.ttk 
						        left join tuongtac on (post.id = tuongtac.id and user.ttk = tuongtac.ttk) 
						    where 
								access='friend' 
						        and ('20194185' in (select friend.ttk2 from friend where friend.ttk1 = user.ttk)) 
						        and (isnull(post.teamid)
									or ('20194185' in (select user_team.ttk from user_team where team.id = post.teamid)))
						)
					) as tab order by tab.time desc";
		$table = $this->query($query);
		$postidarr = array();
		while ($row = $table->fetch_assoc()){
			// $team = new team();
			// $t = $team->getTeam($row['teamid']);
			// $row['teamname'] = $t ? $t['name'] : "";

			// $student = new student();
			// $std = $student->getRow($row['ttk']);
			// $row['studentname'] = $std['ho'] . " " . $std['ten'];
			array_push($postidarr, $row['id']); // field: id, caption, filepath, ttk, teamid, time, access, groupname, studentname
		}
		$res = array();
		foreach ($postidarr as $postid){
			$item = $this->getPost($postid);
			if ($item)
				array_push($res, $item);
		}
		return $res;
	}

	public function selectPostOf($ttk){
		$query = "select post.id from post where post.ttk = '$ttk' order by time desc";
		$table = $this->query($query);
		$postidarr = array();
		while ($row = $table->fetch_assoc()){
			array_push($postidarr, $row['id']); 		
		}
		$res = array();
		foreach ($postidarr as $postid){
			$item = $this->getPost($postid);
			if ($item)
				array_push($res, $item);
		}
		return $res;
	}

	public function getPost($postid){
		$query = "select post.id, caption, post.filepath, user.ttk, concat(user.ho, ' ', user.ten) as username, teamid, team.name as teamname, post.time, access from post left join team on post.teamid = team.id join user on post.ttk = user.ttk left join tuongtac on (post.id = tuongtac.id and user.ttk = tuongtac.ttk) where post.id = '$postid'";
		$table = $this->query($query);
		$res = array();
		while ($row = $table->fetch_assoc()){
			$lscomment = $this->getAllComment($postid);
			$item = array(
				'postid' => $row['id'],
				'caption' => $row['caption'],
				'filepath' => $row['ttk'],
				'username' => $row['username'],
				'teamid' => $row['teamid'],
				'teamname' => $row['teamname'],
				'time' => $row['time'],
				'access' => $row['access'],
				'cntlike' => count($this->getAllLike($postid)),
				'comment' => $lscomment,
				'cntcomment' => count($lscomment),
				'cntshare' => count($this->getAllShare($postid))
			);
			array_push($res, $item); // field: id, caption, filepath, ttk, teamid, time, access, teamname, username, cntlike, cntshare, cntcomment
		}
		return isset($res[0]) ? $res[0] : null;
	}

	public function insertPost($user, $caption, $files, $access, $group){
		$time = gettime();
		$query = "";
		if ($group == "" or $group == "null"){
			$query = "insert into post value(null, '$user', '$caption', '$files', '$time', '$access', null)";
		}
		else {
			$query = "insert into post value(null, '$user', '$caption', '$files', '$time', '$access', '$group')";
		}
		return $this->query($query);
	}

	public function updatePost($postid, $caption, $files, $access){
		$time = gettime();
		$query = "update post set caption = '$caption', file_path = '$files', access = '$access' where id = '$postid'";
		return $this->query($query);	
	}

	public function getAllComment($postid){
		$query = "select concat(user.ho, ' ', user.ten) as username, tuongtac.content, tuongtac.time from tuongtac join user on tuongtac.ttk = user.ttk where tuongtac.postid = '$postid' and tuongtac.type = 'comment' order by time desc";;
		$table = $this->query($query);
		$arr = $this->toArr($table);
		return $arr;
	}

	public function getCommentOf($ttk){
		$query = "SELECT user.ttk, concat(user.ho, ' ', user.ten) as username, tuongtac.postid, tuongtac.content, tuongtac.time FROM tuongtac join user on tuongtac.ttk = user.ttk WHERE user.ttk = '$ttk' and tuongtac.type = 'comment' order by time desc";
		$table = $this->query($query);
		return $this->toArr($table);
	}

	public function insertComment($ttk, $postid, $content){
		$time = gettime();
		$query = "insert into tuongtac value ('null', '$ttk', '$postid', '$time', 'comment', '$content')";
		return $this->query($query);
	}

	public function deleteComment($ttk, $postid, $content, $time){
		$query = "delete from tuongtac where tuongtac.ttk = '$ttk' and postid = '$postid' and type = 'comment' and content = '$content' and time = '$time'";
		return $this->query($query);
	}

	public function getAllLike($postid){
		$query = "select user.ttk, concat(user.ho, ' ', user.ten) as username, tuongtac.time from tuongtac join user on tuongtac.ttk = user.ttk where tuongtac.postid = '$postid' and tuongtac.type = 'like' order by time desc";
		$table = $this->query($query);
		$arr = $this->toArr($table);
		return $arr;
	}

	public function getLikeOf($ttk){
		$query = "SELECT user.ttk, concat(user.ho, ' ', user.ten) as username, tuongtac.postid, tuongtac.time FROM tuongtac join user on tuongtac.ttk = user.ttk WHERE user.ttk = '$ttk' and tuongtac.type = 'like' order by time desc";
		$table = $this->query($query);
		return $this->toArr($table);
	}

	public function insertLike($ttk, $postid){
		$time = gettime();
		$query = "insert into tuongtac value ('null', '$ttk', '$postid', '$time', 'like', 'null')";
		return $this->query($query);
	}

	public function deleteLike($ttk, $postid){
		$query = "delete from tuongtac where tuongtac.ttk = '$ttk' and postid = '$postid' and type = 'like'";
		return $this->query($query);
	}

	public function getAllShare($postid){
		$query = "select user.ttk, concat(user.ho, ' ', user.ten) as username, tuongtac.time from tuongtac join user on tuongtac.ttk = user.ttk where tuongtac.postid = '$postid' and tuongtac.type = 'share' order by time desc";
		$table = $this->query($query);
		$arr = $this->toArr($table);
		return $arr;
	}

	public function getShareOf($ttk){
		$query = "SELECT user.ttk, concat(user.ho, ' ', user.ten) as username, tuongtac.postid, tuongtac.time FROM tuongtac join user on tuongtac.ttk = user.ttk WHERE user.ttk = '$ttk' and tuongtac.type = 'share' order by time desc";
		$table = $this->query($query);
		return $this->toArr($table);
	}

	public function insertShare($ttk, $postid){
		$time = gettime();
		$query = "insert into tuongtac value ('null', '$ttk', '$postid', '$time', 'share', 'null')";
		return $this->query($query);
	}

}

?>

