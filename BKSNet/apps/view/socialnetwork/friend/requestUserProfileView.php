
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
	.content-frame{
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
	}
	.column-avatar-frame{
		width: 250px;
		display: flex;
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
	.item span{
		line-height: 24px;
	}
	.item .title{
		font-weight: bold;
	}

	.button-frame{
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.button-frame .button{
		margin: 64px;
		margin-bottom: 20px;
		height: 50px;
		width: 200px;
		border-radius: 16px;
		box-sizing: border-box;
		font-weight: bold;
		color: white;
		
		display: flex;
		justify-content: center;
		align-items: center;
	}
	#addbtn{
		background-color: #b00418;
	}
	#deletebtn{
		background-color: #473d3d;
	}

	.turn-back{
		margin-top: 0px;
		margin-bottom: 10px;
		padding: 10px;
		border-radius: 8px;
		color: red;
		background-color: #f5edeb;
	}
</style>


<div class="profile-frame"> 
	<div class="title-frame">
		<p>NGƯỜI DÙNG NÀY ĐÃ GỬI LỜI MỜI KẾT BẠN CHO BẠN</p>
	</div>
	
	<div class="separate"></div>
		
	<div class="content-frame">
		<div class="column column-avatar-frame">
			<img src="/BKSNet/img/avatar.jpg" alt="avatar" class="avatar">
		</div>
		<div class="column c1">
			<p class="item name">
				<span class="title">Họ và tên:</span>
				<span class="content">
					<?php echo $currentuser['ho'] . ' ' . $currentuser['dem'] . ' ' . $currentuser['ten'] ?>		
				</span>
			</p>
			<p class="item">
				<span class="title">Giới tính:</span>
				<span class="content">
					<?php echo $currentuser['gender'] ?>		
				</span>
			</p>
			<p class="item">
				<span class="title">Ngày sinh:</span>
				<span class="content">
					<?php echo $currentuser['dateofbirth']; ?>		
				</span>
			</p>
			<p class="item">
				<span class="title">Địa chỉ:</span>
				<span class="content">
					<?php echo $currentuser['address'] ?>		
				</span>
			</p>
			<p class="item">
				<span class="title">Mô tả bản thân:</span>
				<span class="content">
					<?php echo $currentuser['decription'] ?>		
				</span>
			</p>
		</div>
		<div class="column c2">
			<p class="item">
				<span class="title">MSSV:</span>
				<span class="content">
					<?php echo $currentuser['mssv'] ?>		
				</span>
			</p>
			<p class="item">
				<span class="title">Email:</span>
				<span class="content">
					<?php echo $currentuser['email'] ?>		
				</span>
			</p>
			<p class="item">
				<span class="title">Khóa:</span>
				<span class="content">
					<?php echo $currentuser['grade'] ?>		
				</span>
			</p>
			<p class="item">
				<span class="title">Khoa/Viện/Trường:</span>
				<span class="content">
					<?php echo $currentuser['school'] ?>		
				</span>
			</p>
			<p class="item">
				<span class="title">Chuyên ngành:</span>
				<span class="content">
					<?php echo $currentuser['major'] ?>		
				</span>
			</p>
		</div>
	</div>

	<div class="separate"></div>
	
	<div class="button-frame">
		<form action="/BKSNet/friendcontroller/addfriend/<?php echo $currentuser['mssv'] ?>">
			<input id="addbtn" class="button" type="submit" name="add-button" value="Chấp nhận">
		</form>

		<form action="/BKSNet/friendcontroller/deleterequest/<?php echo $currentuser['mssv'] ?>">
			<input id="deletebtn" class="button" type="submit" name="delete-button" value="Xóa">
		</form>
		
	</div>

	<!-- turn back -->
	<div class="button-frame">
		<a class="turn-back" href="/BKSNet/friendcontroller/listfriend/1">
			Quay lại
		</a>
	</div>
</div>
