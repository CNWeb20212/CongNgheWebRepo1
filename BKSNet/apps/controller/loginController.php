<?php 

class logincontroller{
	
	public function login(){

		$announce = "";
		$inputacc = "";
		$inputpass = "";
		// foreach ($_POST as $key=>$value){
		// 	echo $key . " - " . $value . "<br>";
		// }

		if (isset($_POST['account'])){
			$inputacc = $_POST['account'];
			$inputpass = $_POST['password'];

			$db = new account();
			$acc = $db->getRow($inputacc);

			if ($acc == null){
				$announce = 'Tài khoản không tồn tại';
				$inputpass = $inputacc = "";
			} else if ($inputpass != $acc['mk']){
				$announce = 'Mật khẩu sai';
				$inputpass = "";
			} else {
				if ($acc['role'] == 'student'){
					// set cookies
					setcookie('ttk', $inputacc, time() + (86400 * 30), "/");
					setcookie('mk', $inputpass, time() + (86400 * 30), "/");
					header('location: /BKSNet/postcontroller/postlist');
					return;
				} else {
					$announce = 'Tính năng quản trị viên đang được phát triển';
				}
			}  
		}

		?>
		<script type="text/javascript">
			let randomCode = "";
			function refreshCode(){
				let y = "";
				for (let i = 1; i <= 6; i++){
					let x = Math.floor(Math.random() * 10);
					y = y + x.toString();
				}
				let code = document.getElementById("code");
				code.innerHTML = y;
				randomCode = y;
			}
			function submitAccount(){
				input = document.getElementById("input-code");
				if (input.value != randomCode){
					document.getElementById('announce').innerHTML = 'Nhập sai mã';
					input.value = '';
					refreshCode();
					return false;	
				}
				return true;
			}
		</script>
		<?php
		include ROOT . "/apps/view/layout/loginHeader.php";

		include ROOT . "/apps/view/system/loginView.php";

		include ROOT . "/apps/view/layout/loginFooter.php";
	}

	public function logout(){
		echo 'LOGOUT';
	}

	public function forgotpassword(){
		include ROOT . "/apps/view/layout/loginHeader.php";

		global $controller;
		include ROOT . "/apps/view/system/inputFPView.php";

		include ROOT . "/apps/view/layout/loginFooter.php";
	}

	public function register(){
		include ROOT . "/apps/view/layout/loginHeader.php";

		include ROOT . "/apps/view/system/registerView.php";		

		include ROOT . "/apps/view/layout/loginFooter.php";

	}
}




?>


