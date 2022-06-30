

<style type="text/css">
	.parent-frame{
		width: 100%;
		margin: 0;
		display: flex;
		justify-content: center;
	}
	.sub-frame{
		width: 85%;
		background-color: white;
		margin: 48px 0px;
		display: flex;
		justify-content: center;
		border-radius: 16px;
	}

	.login-frame{
		width: 50%;
		background-color: #c0fcf6;
		margin: 48px 0px;
		display: flex;
		justify-content: center;
		align-items: center;
		border-radius: 16px;
		flex-direction: column;
	}
	.login-frame > *{
		margin: 24px 0px 0px 0px;
		width: 85%;
	}
	/* input acc and pass */
	.input-frame{
		
	}
	.input{
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 4px 0px;
	}
	.input *{
		display: inline-block;
	}
	.input p{
		width: 30%;
	}
	.input input{
		width: 70%;
		border-radius: 4px;
		height: 28px;
	}
	.input input:focus{
		background-color: lightgray;
	}
	/*.input.password input{
		font-family: sans-serif;
		font-size: 20px;
	}*/

	/* input code */
	.input-code{
		margin: 0px 0px 24px 0px;
	}
	.input-code > *{
		width: 100%;
		display: flex;
		justify-content: flex-start;
		align-items: center;
	}
	.code-frame p{
		width: 30%;
	}
	.code-frame .code{
		width: 35%;
		height: 35px;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: 8px 0px;
		/*border: solid black 1px;*/
		border-radius: 8px;
		background-color: gray;
	}
	.code-frame .reload{
		width: 35%;
		display: flex;
		justify-content: center;
	}
	.reload img{
		height: 35px;
		cursor: pointer;
	}

	.submit-button{
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0px 0px 24px 0px;
	}
	.submit-button .dangnhap{
		width: max(40%, 120px);
		border: none;
		border-radius: 8px;
		background-color: #b00418;
		color: white;
		font-family: sans-serif;
		font-size: 20px;
		cursor: pointer;
		padding: 12px;
	}

	.links{
		width: 100%;
		display: flex;
		justify-content: flex-start;
		margin: 0;
	}
	.links > *{
		width: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0px 0px 24px 0px;
		height: auto;
	}
	.links *{
		text-decoration: none;
	}
</style>
<script type="text/javascript">
	function inputPassKeyUp(input){
		if (input.value.length == 0){
			input.style = "font-size: 14px";	
		} else {
			input.style = "font-size: 24px"; 
		}
	}
	function inputPassKeyDown(input){
		if (input.value.length == 0){
			input.style = "font-size: 14px";	
		} else {
			input.style = "font-size: 24px"; 
		}
	}
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
	function checkCode(){
		input = document.getElementById("input-code");
		if (randomCode != input.value){
			alert("Nhập sai mã");
		}
		input.value = "";
		refreshCode();
	}
</script>


<div class="parent-frame">
	<div class="sub-frame">
		<div class="login-frame">
			<!-- Input account and password -->
			<div class="input-frame">
				<div class="input account">
					<p> Tài khoản </p>
					<input type="text" name="account" placeholder="Tên tài khoản" required>
				</div>
				<div class="input password">
					<p> Mật khẩu </p>
					<input type="password" name="password" placeholder="Mật khẩu" required onkeyup="inputPassKeyUp(this)">
				</div>
			</div>

			<!-- Input code -->
			<div class="input-code">
				<div class="code-frame">
					<p> </p>
					<div class="code" id="code"> rQstUv </div>
					<script type="text/javascript">
						refreshCode();
					</script>
					<div class="reload"> 
						<img src="../../img/reload.png" onclick="refreshCode();">
					</div>
				</div>
				<div class="input code">
					<p> Mã code </p>
					<input id = "input-code" type="text" name="code" placeholder="Mã xác nhận" required>
				</div>
			</div>

			<!-- Submit -->
			<div class="submit-button">
				<input class="dangnhap" type="submit" name="submit" value="Đăng nhập" onclick="checkCode()">
			</div>

			<!-- Forgot pass and sign up -->
			<div class="links">
				<div class="left">
					<a rel="stylesheet" type="text/css" href="../controller/forgotPasswordController.php"> Quên mật khẩu </a>
				</div>
				<div class="right">
					<a rel="stylesheet" type="text/css" href="../controller/registerController.php"> Đăng ký </a>
				</div>
			</div>
		</div>
	</div>
</div>

