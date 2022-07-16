
<?php 

class profilecontroller{

	public function viewme(){

		$db = new student();
		$me = $db->getRow($_COOKIE['ttk']);

		include ROOT . "/apps/view/layout/header.php";

		include ROOT . "/apps/view/socialnetwork/profile/profileView.php";
		
		include ROOT . "/apps/view/layout/footer.php";
	}

	public function isEmpty($val){
		for ($i = 0; $i < strlen($val); $i++){
			if ($val[$i] != ' ') return false;
		}
		return true;
	}

	public function edit(){
		$post = $_POST;
		?>
		<script type="text/javascript">
			function noinput(){
				return false;
			}
		</script>
		<?php
		$keys = array('ttk','ho','dem','ten','email','gender','dateofbirth','address','decription','grade','school','major');
		$newval = array('ttk'=>null,'ho'=>null,'dem'=>null,'ten'=>null,'email'=>null,'gender'=>null,'dateofbirth'=>null,'address'=>null,'decription'=>null,'grade'=>null,'school'=>null,'major'=>null);
		$db = new student();
		$me = $db->getRow($_COOKIE['ttk']);

		if (isset($post['submit'])){
			foreach ($keys as $key){
				if (isset($post[$key]) && !$this->isEmpty($post[$key])){
					$newval[$key] = $post[$key];
				} else {
					$newval[$key] = $me[$key];
				}
				// echo $key . "=>" . $newval[$key] . "<br>";
			}
			$r1 = $db->updateProfile($newval['ttk'], $newval['email'], $newval['gender'], $newval['dateofbirth'], $newval['address'], $newval['decription'], $newval['grade'], $newval['school'], $newval['major']);
			$r2 = $db->updateUser($newval['ttk'], $newval['ho'], $newval['dem'], $newval['ten']);
			if (!$r1 || !$r2){
				$response = "Lỗi khi update";
			} else {
				header("location: /BKSNet/profilecontroller/viewme");
				return;
			}
		}

		

		$response = "";

		$keys = array('');

		include ROOT . "/apps/view/layout/header.php";

		include ROOT . "/apps/view/socialnetwork/profile/editProfileView.php";

		include ROOT . "/apps/view/layout/footer.php";
	}

	public function announce(){
		

		$db = new student();
		$me = $db->getRow($_COOKIE['ttk']);
		include ROOT . "/apps/view/layout/header.php";

		include ROOT . "/apps/view/socialnetwork/profile/announceView.php";

		include ROOT . "/apps/view/layout/footer.php";

	}


}


?>



