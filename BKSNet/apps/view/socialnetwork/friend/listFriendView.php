<style type="text/css">
	.parent-frame{
		width: 100%;
		display: flex;
		flex-direction: column;
	}

	.search-view{
		display: flex;
		justify-content: center;
		width: 100%;
		margin: 10px;
		border-color: #b31215;
	}
	.input-view{
		justify-content: center;
		width: 50%;
		border-radius: 16px;
		border-color: #b31215;
		font-size: 25px;
	}

	.friend-view{
		display: flex;
		width: 100%;
	}
	.friend-frame{
		width: 60%;
		margin: 0px;
	}
	.friend-request{
		width: 40%;
		margin: 0px;
	}

	.list-request{
		display: flex;
		justify-content: center;
		width: 100%;
		margin: 0px;
		
	}
	.list-friend{
		display: flex;
		justify-content: center;
		width: 100%;
		margin: 0px;
		
	}

	.title-searchframe{
		border-radius: 8px;
		background-color: #fc5659;
		margin: 10px;
		margin-left: 45px;
	}
	h3{
		text-align: center;
	}

</style>
<div class="parent-frame">
	<form class="search-view" action="/BKSNet/friendcontroller/searchuser" method="post">
		<input class="input-view" type="text" name="input" placeholder="Tìm kiếm...">
	</form>

	<div class="friend-view">
		<div class="friend-frame">
			<div class="title-searchframe">
				<h3>Bạn bè</h3>
			</div>

			<div class="list-friend">
				<?php
				foreach($friends as $currentfriend){
					include ROOT."/apps/view/socialnetwork/friend/aFriendCardView.php";
				}
				?>	
			</div>
			
		</div>
		<div class="friend-request">
			<div class="title-frame">
				<h3>Lời mời kết bạn</h3>
			</div>
			
			<div class="list-request">
				<?php
				foreach($friendrequests as $request){
					include ROOT."/apps/view/socialnetwork/friend/aRequestCardView.php";
				}
				?>	
			</div>
			
		</div>
	</div>
</div>

	