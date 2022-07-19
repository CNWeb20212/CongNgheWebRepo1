
<style>
	.parent-frame{
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: center;
	}
	.button-frame{
		width: 100%;
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-items: center;
		margin: 0 0 24px 0px;
	}
	.button-frame .button{
		margin: 0px 64px;
		height: 50px;
		width: 250px;
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

	.postcard{
		width: 75%;
		margin: 48px 0 48px 0px;
		box-sizing: border-box;
		border-radius: 32px;
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: center;
		background-color: #c0fcf6;
	}
	.postcard .post-header{
		width: 90%;
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
		align-items: center;
		box-sizing: border-box;
		margin: 32px 0 16px 0;
	}
	.post-user > *{
		margin-right: 16px;
	}
	.post-user{
		/*width: max(40%, 400px);*/
		box-sizing: border-box;
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
		align-items: center;
	}
	.user-avatar{
		/*width: max(30%, 120px);*/
		display: flex;
		flex-direction: row;
	}
	.avatar{
		width: 50px;
		height: 50px;
		border-radius: 50%;
		/*margin-left: 24px;*/
	}
	.user-name{
		/*width: max(70%, 280px);*/
		font-weight: bold;
		font-size: 18px;
	}
	
	.postcard .post-content{
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: center;
		box-sizing: border-box;
	}
	.post-content .caption{
		width: 90%;
		height: 300px;
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: flex-start;
		word-break: break-word;
		font-size: 18px;
		border-radius: 16px;
		box-sizing: border-box;
		padding: 8px;
	}

	.access{
		width: 90%;
		margin: 24px 0 24px 0;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: flex-start;
	}

	.announce{
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		color: red;
		margin: 0 0 64px 0;
	}
	
</style>


<form class="parent-frame" action="/BKSNet/postcontroller/postcreate" method="post">
	<div class="postcard"> 
		<div class="post-header">
			<div class="post-user">
				<div class="user-avatar">
					<img src= "/BKSNet/img/avatar.jpg" class="avatar">
				</div>
				<div class="user-name">
					<?php echo $acc['ho'] . " " . $acc['ten']; ?>
				</div>
			</div>
		</div>

		<div class="post-content">
			<textarea name="content" class="caption" placeholder="Bạn đang nghĩ gì?" required>
				<?php 
					if ($content){
						echo $content;
					}
				?>
			</textarea>
			<div class="access">
				<p> Quyền truy cập: </p>
				<div> <input type="radio" name="access" value="public" checked = "checked"> Công khai </div>
				<div> <input type="radio" name="access" value="friend"> Bạn bè </div>
				<div> <input type="radio" name="access" value="private"> Riêng tư </div>
			</div>
		</div>
	</div>
	<div class="button-frame">
		<input type="submit" name="create" value="Tạo bài đăng" class="button">
		<a class='button' href='/BKSNet/postcontroller/postlist'> Hủy </a>		
	</div>
	<div class="announce">
		<p>
			<?php echo $announce; ?>
		</p>
	</div>
</form>


