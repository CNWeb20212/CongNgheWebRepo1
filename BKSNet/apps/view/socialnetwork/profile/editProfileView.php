
<style>
	.profile-frame{
		width: 100%;
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.separate{
		width: 80%;
		height: 1px;
		box-sizing: border-box;
		border: 3px solid #FF9900;
		border-radius: 8px;
	}
	.title-frame{
		width: 100%;
		height: 50px;
		display: flex;
		justify-content: center;
		align-items: center;
		color: #8c1515;
		font-weight: bold;
		font-size: 18px;
		margin: 64px ;
	}
	.input-frame{
		display: flex;
		flex-direction: row;
		justify-content: center;
		width: 100%;
		margin: 32px 0 16px 0;
		flex-wrap: wrap;
	}
	.column{
		box-sizing: border-box;
		margin: 8px 16px;
		display: flex;
		flex-direction: column;
	}
	.column-avatar-frame{
		width: 250px;
		justify-content: center;
		align-items: center;
	}
	.column-avatar-frame .avatar{
		width: 100%;
		box-sizing: border-box;
		border-radius: 16px;
	}
	.column.c1{
		width: 400px;
	}
	.column.c2{
		width: 400px;
	}
	.item{
		width: 100%;
		line-height: 24px;
		display: flex;
		justify-content: flex-start;
		align-items: center;
		margin: 4px 0;
	}
	.item p{
		width: 40%;
	}
	.item input{
		width: 60%;
		height: 30px;
	}
	.item .title{
		font-weight: bold;
	}

	.button-frame{
		width: 100%;
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-items: center;
	}
	.button-frame .button{
		margin: 64px 16px 16px 16px;
		height: 50px;
		width: 200px;
		border: none;
		border-radius: 16px;
		box-sizing: border-box;
		font-weight: bold;
		color: white;
		background-color: #b00418;
		display: flex;
		justify-content: center;
		align-items: center;
		cursor: pointer;
	}

	.announce-frame{
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.announce-frame #announce{
		margin: 16px 0 64px 0;
		color: red;
		display: flex;
		justify-content: center;
		align-items: center;
	}
</style>


<form class="profile-frame" method="post" action="/BKSNet/profilecontroller/edit"> 
	<div class="title-frame">
		<p> SỬA THÔNG TIN CÁ NHÂN </p>
	</div>
	
	<div class="separate"></div>
		
	<div class="input-frame">
		<div class="column column-avatar-frame">
			<img src="/BKSNet/img/avatar.jpg" alt="avatar" class="avatar">
		</div>
		<div class="column c1">
			<span class="item">
				<p> Họ: </p>
				<input  type="text" name="ho" placeholder="<?php echo $me['ho']?>">
			</span>
			<span class="item">
				<p> Tên đệm: </p>
				<input  type="text" name="dem" placeholder="<?php echo $me['dem']?>">
			</span>
			<span class="item">
				<p> Tên: </p>
				<input  type="text" name="ten" placeholder="<?php echo $me['ten'] ?>">	
			</span>
			<span class="item">
				<p> Giới tính: </p>
				<input type="text" name="gender" placeholder="<?php echo $me['gender'] ?>">
			</span>
			<span class="item">
				<p> Ngày sinh: </p>
				<input type="date" name="dateofbirth" placeholder="<?php echo $me['dateofbirth']; ?>">
			</span>
			<span class="item">
				<p> Địa chỉ: </p>
				<input type="text" name="address" placeholder="<?php echo $me['address'] ?>">
			</span>
			<span class="item">
				<p> Mô tả bản thân: </p>
				<input type="text" name="decription" placeholder="<?php echo $me['decription'] ?>">
			</span>
		</div>
		<div class="column c2">
			<span class="item">
				<p> MSSV: </p>
				<input type="text" name="ttk" value="<?php echo $me['ttk'] ?>" 
					onkeypress = "return noinput();" onkeydown = "return noinput();" 
					onkeyup = "return noinput();">
			</span>
			<span class="item">
				<p> Email: </p>
				<input type="text" name="email" value="<?php echo $me['email'] ?>" >
			</span>
			<span class="item">
				<p> Khóa: </p>
				<input type="text" name="grade" placeholder="<?php echo $me['grade'] ?>">
			</span>
			<span class="item">
				<p> Khoa/Viện/Trường: </p>
				<input type="text" name="school" placeholder="<?php echo $me['school'] ?>">
			</span>
			<span class="item">
				<p> Chuyên ngành: </p>
				<input type="text" name="major" placeholder="<?php echo $me['major'] ?>">
			</span>
		</div>
	</div>

	<div class="separate"></div>
	
	<div class="button-frame">
		<input type="submit" name="submit" class="button" value="Lưu thông tin">
		<input type="submit" name="cancel" class="button" value="Hủy bỏ">
	</div>
	<div class="announce-frame">
		<div id="announce">
			<p>
				<?php echo $response; ?>
			</p>
		</div>
	</div>
</form>

