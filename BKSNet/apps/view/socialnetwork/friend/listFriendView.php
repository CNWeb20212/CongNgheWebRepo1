<style type="text/css">
	.friend-view{
		display: flex;
		width: 100%;
	}
	.friend-frame{
		width: 60%;
	}
	.friend-request{
		width: 40%;
	}

</style>

<div class="friend-view">
	<div class="friend-frame">
		<?php
		foreach($friends as $currentfriend){
			include ROOT."/apps/view/socialnetwork/friend/aFriendCardView.php";
		}
		?>
	</div>
	<div class="friend-request">
		
	</div>
</div>
	