<?php 

class logincontroller{
	
	public function login(){
		include ROOT . "/apps/view/layout/loginHeader.php";

		include ROOT . "/apps/view/system/loginView.php";

		include ROOT . "/apps/view/layout/LoginFooter.php";
	}

	public function logout(){
		echo 'LOGOUT';
	}

	public function forgotpassword(){
		include ROOT . "/apps/view/layout/loginHeader.php";

		global $controller;
		echo $controller . "<br>";
		echo 'forgotpassword';

		include ROOT . "/apps/view/layout/LoginFooter.php";
	}

	public function register(){
		include ROOT . "/apps/view/layout/loginHeader.php";

		include ROOT . "/apps/view/system/registerView.php";

		include ROOT . "/apps/view/layout/LoginFooter.php";

	}
}




?>


