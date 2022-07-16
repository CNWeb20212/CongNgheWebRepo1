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
		$ho 			= isset($_POST['ho']) 			? $_POST['ho'] 			: null;
		$dem 			= isset($_POST['dem']) 			? $_POST['dem'] 		: null;
		$ten 			= isset($_POST['ten']) 			? $_POST['ten'] 		: null;
		$gender 		= isset($_POST['gender']) 		? $_POST['gender'] 		: null;
		$dateofbirth 	= isset($_POST['dateofbirth']) 	? $_POST['dateofbirth'] : null;
		$ttk 			= isset($_POST['ttk']) 			? $_POST['ttk'] 		: null;
		$mk 			= isset($_POST['mk']) 			? $_POST['mk'] 			: null;
		$remk 			= isset($_POST['remk']) 		? $_POST['remk'] 		: null;
		$email 			= isset($_POST['email']) 		? $_POST['email'] 		: null;
		$announce = "";
		$db = new account();
		$acc = $db->getRow($ttk);
		if ($acc){
			$announce = "Tài khoản đã tồn tại";
			$acc = "";
			include ROOT . "/apps/view/layout/loginHeader.php";
			include ROOT . "/apps/view/system/registerView.php";
			include ROOT . "/apps/view/layout/loginFooter.php";
		} else if ($mk != $remk){
			$mk = $remk = "";
			$announce = "Hai mật khẩu không trùng nhau";
			include ROOT . "/apps/view/layout/loginHeader.php";
			include ROOT . "/apps/view/system/registerView.php";
			include ROOT . "/apps/view/layout/loginFooter.php";
		} else if (isset($_POST['sendcode'])){
			$announce = "Đã gửi code tới email của bạn";
			$code = $this->randomCode();
			setcookie('register-code', $code, time() + 180, "/");
			$emailer = new email();
			$emailer->send($email, "BKSNET account register code", "Your code is: " . $code);
			include ROOT . "/apps/view/layout/loginHeader.php";
			include ROOT . "/apps/view/system/registerView.php";
			include ROOT . "/apps/view/layout/loginFooter.php";
		} else if (isset($_POST['register'])){
			$code = $_POST['input-code'];
			if ($this->isEmpty($code) || !isset($_COOKIE['register-code'])){
				$announce = "Hãy nhập mã code xác nhận";
				include ROOT . "/apps/view/layout/loginHeader.php";
				include ROOT . "/apps/view/system/registerView.php";
				include ROOT . "/apps/view/layout/loginFooter.php";
			} else if ($code != $_COOKIE['register-code']) {
				$announce = "Mã xác nhận không chính xác";
				include ROOT . "/apps/view/layout/loginHeader.php";
				include ROOT . "/apps/view/system/registerView.php";
				include ROOT . "/apps/view/layout/loginFooter.php";
			} else {
				$db1 = new account();
				$db2 = new student();
				$db1->insert($ttk, $mk, 'student');
				$db2->insertUser($ttk, $ho, $dem, $ten);
				$db2->insertStudent($ttk);
				$db2->insertProfile($ttk, $email, $gender, $dateofbirth, "", "", "", "", ""); 
				$announce = "Tạo tài khoản thành công";
				include ROOT . "/apps/view/layout/loginHeader.php";
				include ROOT . "/apps/view/system/registerView.php";
				include ROOT . "/apps/view/layout/loginFooter.php";
			}
		} else {
			include ROOT . "/apps/view/layout/loginHeader.php";
			// foreach ($_POST as $key=>$value){
			// 	echo $key . '=>' . $value . "<br>"; 
			// }
			include ROOT . "/apps/view/system/registerView.php";
			include ROOT . "/apps/view/layout/loginFooter.php";
		}
	}

	public function randomCode(){
		$res = "";
		for ($i = 1; $i <= 6; $i++){
			$res .= strval(rand(0, 9));
		}
		return $res;
	}
	public function isEmpty($val){
		for ($i = 0; $i < strlen($val); $i++){
			if ($val[$i] != ' ') return false;
		}
		return true;
	}
	public function alert($str){
		?>
		<script type="text/javascript">
			alert("<?php echo $str; ?>");
		</script>
		<?php
	}
}




?>

