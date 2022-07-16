

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

	.description{
		font-size: 16px;
		align-items: center;
		text-align: center;
		justify-content: center;
		color: red;
		margin: 10px 0 20px 0;
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
	.center{
		margin-top: 10px;
	}
</style>

<?php 
function value($val){
	echo ($val==null ? "" : " value = '$val' ");
}
function checked($val, $pat){
	if ($val == null) return;
	if ($val == $pat) echo " checked = 'checked' ";
}
?>

<div class="parent-frame">
	<div class="sub-frame">
		<form class="register-frame" action="/BKSNet/logincontroller/register" method="post">
			<!-- Input infomation, account and password -->
			<div class="input-frame">
				<div class="input lastName">
					<p>Họ</p>
					<input id="lastName" type="text" name="ho" placeholder="Họ" <?php value($ho); ?> required>	
				</div>
				<div class="input middleName">
					<p>Đệm</p>
					<input id="middleName" type="text" name="dem" placeholder="Đệm" <?php value($dem); ?> required>	
				</div>
				<div class="input firstName">
					<p>Tên</p>
					<input id="firstName" type="text" name="ten" placeholder="Tên" <?php value($ten); ?> required>	
				</div>
				<div class="input-gender">
					<p></p>
					<div id="genderBtn">
						<input name="gender" id="male" type="radio" value="Nam" <?php checked($gender, "Nam"); ?> /> 
						<label for="male">Nam</label>
						<input name="gender" id="female" type="radio" value="Nữ" <?php checked($gender, "Nữ"); ?> /> 
						<label for="female">Nữ</label>
						<input name="gender" id="other" type="radio" value="Khác" <?php checked($gender, "Khác"); ?> /> 
						<label for="other">Khác</label>
					</div>
				</div>
				
				<div class="input email">
					<p>Email</p>
					<input id="email" type="text" pattern="^(\w+)\.(\w+)(\d{6})@sis\.hust\.edu\.vn$" name="email" placeholder="Email nhà trường" title="Hãy nhập email mà nhà trường cấp" <?php value($email); ?> required>
				</div>
				<div class="input birthday">
					<p>Ngày sinh</p>
					<input id="birthday" type="date" name="dateofbirth" placeholder="Ngày sinh" <?php value($dateofbirth); ?> required>	
				</div>

				<div class="input account">
					<p>Tài khoản</p>
					<input id="account" type="text" name="ttk" placeholder="Nhập MSSV" pattern="^20(\d{6})$" title="Nhập MSSV của bạn" required <?php value($ttk); ?>>
				</div>
				<div class="input password">
					<p>Mật khẩu</p>
					<input id="password" type="password" name="mk" placeholder="Mật khẩu" required <?php value($mk); ?>>
				</div>
				<div class="input password">
					<p></p>
					<input id="repassword" type="password" name="remk" placeholder="Nhập lại mật khẩu" <?php value($remk); ?> required>
				</div>
			</div>

			<!-- Input code -->
			<div class="submit-button">
				<input class="send-code" type="submit" name="sendcode" value="Gửi mã xác nhận">
			</div>

			<p class="description">
				<?php echo $announce; ?>
			</p>

			<div class="input-code">
				<div class="input code">
					<p> Mã code </p>
					<input id = "input-code" type="text" name="input-code" placeholder="Mã xác nhận">
				</div>
			</div>

			<!-- Submit -->
			<div class="submit-button">
				<input class="dangky" type="submit" name="register" value="Đăng ký">
			</div>

			<!-- Turn back to login -->
			<div class="links">
				<div class="center">
					<a rel="stylesheet" type="text/css" href="/BKSNet/logincontroller/login"> Đăng nhập </a>
				</div>
			</div>
		</form>
	</div>
</div>
