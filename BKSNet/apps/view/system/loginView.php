

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

	.announce{
		width: 60%;
		display: flex;
		color: red;
		justify-content: center;
		align-items: center;
		margin: 0 0 24px 0;
		padding: 0;
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



<div class="parent-frame">
	<div class="sub-frame">
		<form class="login-frame" method="post" action="/BKSNet/logincontroller/login" onsubmit="return submitAccount()">
			<!-- Input account and password -->
			<div class="input-frame">
				<div class="input account">
					<p> Tài khoản </p>
					<input type="text" name="account" placeholder="Tên tài khoản" value="<?php echo $inputacc; ?>" required>
				</div>
				<div class="input password">
					<p> Mật khẩu </p>
					<input type="password" name="password" placeholder="Mật khẩu" value="<?php echo $inputpass; ?>" required>
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
						<img src="/BKSNet/img/reload.png" onclick="refreshCode();">
					</div>
				</div>
				<div class="input code">
					<p> Mã code </p>
					<input id = "input-code" type="text" name="code" placeholder="Mã xác nhận" required>
				</div>
			</div>

			<!-- Submit -->
			<div class="submit-button">
				<input class="dangnhap" type="submit" name="submit" value="Đăng nhập">
			</div>
			<div class="announce" id="announce">
				<?php echo $announce; ?>
			</div>

			<!-- Forgot pass and sign up -->
			<div class="links">
				<div class="left">
					<a rel="stylesheet" type="text/css" href="/BKSNet/logincontroller/forgotpassword"> Quên mật khẩu </a>
				</div>
				<div class="right">
					<a rel="stylesheet" type="text/css" href="/BKSNet/logincontroller/register"> Đăng ký </a>
				</div>
			</div>
		</form>
	</div>
</div>

