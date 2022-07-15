

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

	.fp-frame{
		width: 50%;
		background-color: #c0fcf6;
		margin: 48px 0px;
		display: flex;
		justify-content: center;
		align-items: center;
		border-radius: 16px;
		flex-direction: column;
	}
	.fp-frame > *{
		margin: 24px 0px 0px 0px;
		width: 85%;
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

	.submit-button{
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0px 0px 0px 0px;
	}
	.submit-button .forgotpassword{
		width: fit-content;
		border: none;
		border-radius: 8px;
		background-color: #b00418;
		color: white;
		font-family: sans-serif;
		font-size: 20px;
		cursor: pointer;
		padding: 12px;
		margin-top: 20px;
	}
	.submit-button .verify{
		width: fit-content;
		border: none;
		border-radius: 8px;
		background-color: #b00418;
		color: white;
		font-family: sans-serif;
		font-size: 20px;
		cursor: pointer;
		padding: 12px;
		margin-top: 20px;
	}

	.description{
		font-size: 10px;
		align-items: center;
		text-align: center;
		justify-content: center;
		color: #10c0e8;
	}

	.links{
		width: 100%;
		display: flex;
		justify-content: center;
		margin: 0;
	}
	.links > *{
		width: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 24px 0px 24px 0px;
		height: auto;
	}
	.links *{
		text-decoration: none;
	}

	.input-code{
		margin: 0px 0px 24px 0px;
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
</script>


<div class="parent-frame">
	<div class="sub-frame">
		<div class="fp-frame">
			<!-- Input email -->
			<div class="input-frame">
				<div class="input email">
					<p>Email</p>
					<input type="text" name="email" placeholder="Email của tài khoản" required>
				</div>
			</div>

			<!-- Send code button -->
			<div class="submit-button">
				<input class="forgotpassword" type="submit" name="submit" value="Gửi code">
			</div>

			<p class="description">Sau khi nhấn gửi, mã code sẽ được gửi đến email của bạn. Nếu nhận thất bại, bạn có thể nhấn gửi lại</p>

			<!-- Verify code -->
			<div class="input code">
				<p> Mã code </p>
				<input id = "input-code" type="text" name="code" placeholder="Mã xác nhận" required>
			</div>

			<div class="submit-button">
				<input class="verify" type="submit" name="submit" value="Xác nhận">
			</div>

			<!-- turn back to login -->
			<div class="links">
				<div class="center">
					<a rel="stylesheet" type="text/css" href="/BKSNet/logincontroller/login">Hủy</a>
				</div>
			</div>
		</div>
	</div>
</div>

