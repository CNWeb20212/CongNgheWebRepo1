<?php
	class friendcontroller{

		public function listfriend(){
			include ROOT . "/apps/view/layout/header.php";
			
			$ttk = $_COOKIE['ttk'];
			$friends = array();
			$friendInstance = new friend();
			$friends = $friendInstance->selectAll($ttk);

			$friendrequests = $friendInstance->selectAllFriendRequest($ttk);

			include ROOT . "/apps/view/socialnetwork/friend/listFriendView.php";

		
			include ROOT . "/apps/view/layout/footer.php";
		}

		public function deletefriend($ttk){
			$friendInstance = new friend();
			$res = $friendInstance->deletefriend($_COOKIE['ttk'], $ttk);
			if($res){
				header('location:/BKSNet/friendcontroller/viewuser/'.$ttk);
			} else{
				?>
				<script type="text/javascript">
					alert("Hủy kết bạn thất bại, vui lòng thử lại");
				</script>
				<?php
			}
		}

		// check quan hệ để chuyển hướng
		public function checkrelation($ttk){
			//check có phải chính bản thân không
			if($_COOKIE['ttk'] == $ttk){
				return "me";
			}

			//check có phải bạn bè không
			$friendInstance = new friend();
			$friends = $friendInstance->selectAll($_COOKIE['ttk']);
			foreach($friends as $friend){
				if($friend['ttk'] == $ttk){
					return "friend";
				}
			}	

			//check có phải là người gửi lời mời kb cho mình ko
			$requests = $friendInstance->selectAllFriendRequest($_COOKIE['ttk']);
			foreach($requests as $request){
				if($request['ttk'] == $ttk){
					return "request";
				}
			}

			//check có phải là người mình gửi lời mời cho không
			$requesteds = $friendInstance->selectAllFriendRequested($_COOKIE['ttk']);
			foreach($requesteds as $requested){
				if($requested['ttk'] == $ttk){
					return "requested";
				}
			}

			return "user";
		}
		//chuyển hướng
		public function switchProfilePage($relation, $ttk){
			if($relation == "me"){
				header("location:/BKSNet/profilecontroller/viewme");
			}else if($relation == "friend"){
				header("location:/BKSNet/friendcontroller/viewfriend/".$ttk);
			}else if ($relation == "request") {
				header("location:/BKSNet/friendcontroller/viewrequestuser/".$ttk);
			}else if($relation == "requested"){
				header("location:/BKSNet/friendcontroller/viewrequesteduser/".$ttk);
			}else{
				header("location:/BKSNet/friendcontroller/viewuser/".$ttk);
			}
		}

		public function viewfriend($ttk){
			$relation = $this->checkrelation($ttk);
			if($relation != "friend"){
				$this->switchProfilePage($relation, $ttk);
				return;
			}

			include ROOT . "/apps/view/layout/header.php";

			$friendInstance = new friend();
			$currentfriend = $friendInstance->selectfriend($ttk);
			include ROOT . "/apps/view/socialnetwork/friend/friendProfileView.php";

			include ROOT . "/apps/view/layout/footer.php";
		}

		public function viewuser($ttk){
			$relation = $this->checkrelation($ttk);
			if($relation != "user"){
				$this->switchProfilePage($relation, $ttk);
				return;
			}
			$friendInstance = new friend();
			$currentuser = $friendInstance->selectfriend($ttk);

			include ROOT . "/apps/view/layout/header.php";
			
			include ROOT . "/apps/view/socialnetwork/friend/userProfileView.php";

			include ROOT . "/apps/view/layout/footer.php";
		}

		public function viewrequestuser($ttk){
			$relation = $this->checkrelation($ttk);
			if($relation != "request"){
				$this->switchProfilePage($relation, $ttk);
				return;
			}

			include ROOT . "/apps/view/layout/header.php";

			$friendInstance = new friend();
			$currentuser = $friendInstance->selectfriend($ttk);
			include ROOT . "/apps/view/socialnetwork/friend/requestUserProfileView.php";

			include ROOT . "/apps/view/layout/footer.php";
		}

		public function viewrequesteduser($ttk){
			$relation = $this->checkrelation($ttk);
			if($relation != "requested"){
				$this->switchProfilePage($relation, $ttk);
				return;
			}

			include ROOT . "/apps/view/layout/header.php";

			$friendInstance = new friend();
			$currentuser = $friendInstance->selectfriend($ttk);
			include ROOT . "/apps/view/socialnetwork/friend/requestedUserProfileView.php";

			include ROOT . "/apps/view/layout/footer.php";
		}

		//khi chấp nhận lời mời kết bạn của ai đó
		public function addfriend($ttk){
			$friendInstance = new friend();
			$res = $friendInstance->insertfriend($_COOKIE['ttk'], $ttk);
			if($res){
				$res = $friendInstance->deleterequest($ttk);
			}
			if($res){
				header('location:/BKSNet/friendcontroller/viewfriend/'.$ttk);
			} else{
				?>
				<script type="text/javascript">
					alert("Chấp nhận lời mời kết bạn thất bại, vui lòng thử lại");
				</script>
				<?php
			}
		}

		//khi mình gửi lời mời kết bạn cho ai đó
		public function addrequest($receiver){
			$friendInstance = new friend();
			$res = $friendInstance->insertrequest($receiver);
			if($res){
				header('location:/BKSNet/friendcontroller/viewrequesteduser/'.$receiver);
				return;
			} else{
				?>
				<script type="text/javascript">
					alert("Gửi lời mời kết bạn thất bại, vui lòng thử lại");
				</script>
				<?php
			}
		}

		//khi mình xóa lời mời kết bạn của ai đó
		public function deleterequest($sender){
			$friendInstance = new friend();
			$res = $friendInstance->deleterequest($sender);
			if($res){
				header('location:/BKSNet/friendcontroller/viewuser/'.$sender);
			} else{
				?>
				<script type="text/javascript">
					alert("Xóa lời mời kết bạn thất bại, vui lòng thử lại");
				</script>
				<?php
			}
		}

		//thanh tìm kiếm
		public function searchuser(){
			$input = isset($_POST['input']) ? $_POST['input'] : null;
			if($input != null){
				$friendInstance = new friend();
				$users = $friendInstance->searchuser($input);
				// header('location:/BKSNet/friendcontroller/viewlistsearchuser/'.$users);
				include ROOT . "/apps/view/layout/header.php";

				include ROOT . "/apps/view/socialnetwork/friend/listUserSearchview.php";

				include ROOT . "/apps/view/layout/footer.php";
				return;
			}else{
				?>
				<script type="text/javascript">
					alert("Bạn chưa nhập dữ liệu");
				</script>
				<?php
			}
		}

		// public function viewlistsearchuser($users){
		// 	include ROOT . "/apps/view/layout/header.php";

		// 	include ROOT . "/apps/view/socialnetwork/friend/listUserSearchview.php";

		// 	include ROOT . "/apps/view/layout/footer.php";
		// }

		public function viewusersearch($ttk){
			$relation = $this->checkrelation($ttk);
			$this->switchProfilePage($relation, $ttk);
			return;
		}

	}
?>