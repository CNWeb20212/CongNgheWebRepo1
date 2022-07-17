

<style>
	.parent-frame{
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.child-frame{
		margin: 96px 0px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		background-color: #c0fcf6;
		width: 42.5%;
		box-sizing: border-box;
		border-radius: 16px;
	}

	.input-frame{
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		box-sizing: border-box;
		margin: 32px 0px;
	}

	.input{
		width: 85%;
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
		align-items: center;
	}
	.input > *{
		height: 28px;
		padding: 4px 4px;
		margin: 0 0 24px 0;
	}
	.label{
		width: 30%;
	}
	.input-pass{
		width: 70%;
		border-radius: 4px;
	}

	.button-frame{
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		box-sizing: border-box;
		margin: 0 0 24px 0;
	}

	.button-frame .button{
		width: 250px;
		font-weight: bold;
		border: none;
		border-radius: 8px;
		background-color: #b00418;
		color: white;
		font-family: sans-serif;
		font-size: 16px;
		cursor: pointer;
		padding: 12px;
	}

	.button-frame .announce{
		color: red;
		font-family: sans-serif;
		font-size: 16px;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 48px;
		padding: 0;
		margin: 0;
	}

</style>


<div class="parent-frame">
	<form class="child-frame" action="/BKSNet/logincontroller/forgotpassword" method="post">
		<div class="input-frame">
			<div class="input MK">
				<div class="label">
					Mật khẩu mới
				</div>
				<input type="password" name="mk" placeholder="Nhập mật khẩu mới" class="input-pass" required>
			</div>
			<div class="input REMK">
				<div class="label">
					Nhập lại mật khẩu
				</div>
				<input type="password" name="remk" placeholder="Nhập lại mật khẩu" class="input-pass" required>
			</div>
		</div>
		<div class="button-frame">
			<input type="submit" name="change" class="button" value="Thay đổi mật khẩu">
			<p class="announce">
				<?php echo $announce; ?>
			</p>
		</div>
	</form>
</div>


