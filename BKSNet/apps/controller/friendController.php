<?php
	class friendcontroller{
		public function listfriend(){
			include ROOT . "/apps/view/layout/header.php";
			
			$ttk = $_COOKIE['ttk'];
			$friends = array();
			$friendInstance = new friend();
			$friends = $friendInstance->selectAll($ttk);

			include ROOT . "/apps/view/socialnetwork/friend/listFriendView.php";

		
			include ROOT . "/apps/view/layout/footer.php";
		}

		public function viewfriend($ttk){
			include ROOT . "/apps/view/layout/header.php";

			$friendInstance = new friend();
			$currentfriend = $friendInstance->selectfriend($ttk);
			include ROOT . "/apps/view/socialnetwork/friend/friendProfileView.php";

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


		public function viewuser($ttk){
			include ROOT . "/apps/view/layout/header.php";

			$friendInstance = new friend();
			$currentfriend = $friendInstance->selectfriend($ttk);
			include ROOT . "/apps/view/socialnetwork/friend/userProfileView.php";

			include ROOT . "/apps/view/layout/footer.php";
		}

		public function addfriend($ttk){
			$friendInstance = new friend();
			$res = $friendInstance->insertfriend($_COOKIE['ttk'], $ttk);
			if($res){
				header('location:/BKSNet/friendcontroller/viewfriend/'.$ttk);
			} else{
				?>
				<script type="text/javascript">
					alert("Gửi lời mời kết bạn thất bại, vui lòng thử lại");
				</script>
				<?php
			}
		}
	}
?>