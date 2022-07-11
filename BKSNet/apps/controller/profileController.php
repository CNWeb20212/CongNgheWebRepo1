
<?php 

class profilecontroller{

	public function viewme(){

		include ROOT . "/apps/view/layout/header.php";

		include ROOT . "/apps/view/socialnetwork/profile/profileView.php";

		include ROOT . "/apps/view/layout/footer.php";
	}

	public function edit(){

		include ROOT . "/apps/view/layout/header.php";

		include ROOT . "/apps/view/socialnetwork/profile/editProfileView.php";

		include ROOT . "/apps/view/layout/footer.php";
	}

	public function announce(){
		
		include ROOT . "/apps/view/layout/header.php";

		include ROOT . "/apps/view/socialnetwork/profile/announceView.php";

		include ROOT . "/apps/view/layout/footer.php";
	}


}


?>



