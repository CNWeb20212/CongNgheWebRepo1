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

	.user-view{
		display: flex;
		width: 100%;
	}
	.user-frame{
		width: 100%;
		margin: 0px;
	}

	.list-user{
		display: flex;
		justify-content: center;
		width: 100%;
		margin: 0px;
		flex-direction: column;
	}

	.titlesearch-frame{
		display: flex;
		justify-content: center;
		width: 100%;
		margin: 10px;
		margin-left: 45px;
	}
	h3{
		background-color: #fc5659;
		width: fit-content;
		text-align: center;
		border-radius: 8px;
		padding: 10px;
	}
	.title-result{
		background-color: #fc5659;
	}

</style>
<div class="parent-frame">
	<form class="search-view" action="/BKSNet/friendcontroller/searchuser" method="post">
		<input class="input-view" type="text" name="input" placeholder="Tìm kiếm...">
	</form>

	<div class="user-view">
		<div class="user-frame">
			<div class="titlesearch-frame">
				<h3 class="title-result">Kết quả tìm kiếm</h3>
			</div>

			<div class="list-user">
				<?php
				foreach($users as $usersearch){
					include ROOT."/apps/view/socialnetwork/friend/aSearchUserCardView.php";
				}
				?>	
			</div>
			
		</div>
	</div>
</div>

	