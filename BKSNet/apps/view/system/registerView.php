

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

	.register-frame{
		width: 50%;
		background-color: #c0fcf6;
		margin: 48px 0px;
		display: flex;
		justify-content: center;
		align-items: center;
		border-radius: 16px;
		flex-direction: column;
	}
	.register-frame > *{
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

	/*for gender*/
	.input-gender{
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 4px 0px;
	}
	label {
	    padding-right: 10px;
	    position: relative;
	    margin-right: 0px;
	    line-height: 20px;
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
/*	.code-frame .reload{
		width: 35%;
		display: flex;
		justify-content: center;
	}
	.reload img{
		height: 35px;
		cursor: pointer;
	}*/

	.description{
		font-size: 10px;
		align-items: center;
		text-align: center;
		justify-content: center;
		color: #10c0e8;
		margin-top: 5px;
		margin-bottom: 20px;
	}

	.submit-button{
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0px 0px 0px 0px;
	}
	.submit-button .dangky{
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
	.send-code{
		width: max(40%, 120px);
		border: none;
		border-radius: 8px;
		background-color: #b00418;
		color: white;
		font-family: sans-serif;
		font-size: 15px;
		cursor: pointer;
		padding: 12px;
		margin-top: 10px;
	}

	.links{
		width: 100%;
		display: flex;
		justify-content: flex-start;
		margin: 0;
	}
	.links > *{
		width: 100%;
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
	function sendCode(){
		
	}
	function checkCode(){
		
	}
</script>


<div class="parent-frame">
	<div class="sub-frame">
		<div class="register-frame">
			<!-- Input infomation, account and password -->
			<div class="input-frame">
				<div class="input lastName">
					<p>Họ</p>
					<input id="lastName" type="text" name="Ho" placeholder="Họ" required>	
				</div>
				<div class="input firstName">
					<p>Tên</p>
					<input id="firstName" type="text" name="Ten" placeholder="Tên" required>	
				</div>
				<div class="input-gender">
					<p></p>
					<div id="genderBtn">
						<input name="gender" id="male" type="radio" value="Nam" /> <label for="male">Nam</label>
						<input name="gender" id="female" type="radio" value="Nữ" /> <label for="female">Nữ</label>
						<input name="gender" id="other" type="radio" value="Khác" /> <label for="other">Khác</label>
					</div>
				</div>
				
				<div class="input email">
					<p>Email</p>
					<input id="email" type="text" pattern="^(\w+)\.(\w+)(\d{6})@sis\.hust\.edu\.vn$" name="Email" placeholder="Email nhà trường" title="Hãy nhập email mà nhà trường cấp" required>
				</div>
				<div class="input birthday">
					<p>Ngày sinh</p>
					<input id="birthday" type="date" name="Ngay sinh" placeholder="Ngày sinh" required>	
				</div>

				<div class="input account">
					<p>Tài khoản</p>
					<input id="account" type="text" name="account" placeholder="Tên tài khoản" required>
				</div>
				<div class="input password">
					<p>Mật khẩu</p>
					<input id="password" type="password" name="password" placeholder="Mật khẩu" required onkeyup="inputPassKeyUp(this)">
				</div>
				<div class="input password">
					<p></p>
					<input id="repassword" type="password" name="password" placeholder="Nhập lại mật khẩu" required onkeyup="inputPassKeyUp(this)">
				</div>
			</div>

			<!-- Input code -->
			<div class="submit-button">
				<input class="send-code" type="submit" name="submit" value="Gửi mã xác nhận" onclick="sendCode()">
			</div>

			<p class="description">Sau khi nhấn gửi, mã code sẽ được gửi đến email của bạn. Nếu nhận thất bại, bạn có thể nhấn gửi lại</p>

			<div class="input-code">
				<div class="input code">
					<p> Mã code </p>
					<input id = "input-code" type="text" name="code" placeholder="Mã xác nhận" required>
				</div>
			</div>

			<!-- Submit -->
			<div class="submit-button">
				<input class="dangky" type="submit" name="submit" value="Đăng ký" onclick="checkCode()">
			</div>

			<!-- Turn back to login -->
			<div class="links">
				<div class="center">
					<a rel="stylesheet" type="text/css" href="/BKSNet/logincontroller/login"> Đăng nhập </a>
				</div>
			</div>
		</div>
	</div>
</div>

