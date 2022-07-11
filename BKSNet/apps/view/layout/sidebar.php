
<style type="text/css">
	.sidebar-frame{
		width: 100%;
		height: 100vh;
		box-sizing: border-box;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	.avatar-frame{
		width: 100%;
		height: 100px;
		background-color: lightgray;
		border-radius: 16px;
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
		color: red;
	}
	.function-frame{
		width: 100%;
		height: calc(100vh - 110px);
		background-color: lightgray;
		border-radius: 16px;	
	}
	.avatar-frame > *{
		height: 60px;
/*		border: solid red 1px;*/
		display: flex;
		align-items: center;
		justify-content: center;
		box-sizing: border-box;
		padding: 0 8px;
		font-weight: 700;
	}
	.avatar-frame .avatar{
		width: 40%;
		justify-content: flex-end;
	}
	.avatar-frame .name{
		width: 60%;
		justify-content: flex-start;
		color: black;
	}
	.avatar-frame .avatar .img{
		height: 60px;
		width: 60px;
		background-color: black;
		border-radius: 50%;
		cursor: pointer;
	}
	.avatar-frame .name a{
		text-decoration: none;
		cursor: pointer;
	}

	/*=======================================*/

	.function-frame{
		box-sizing: border-box;
		padding: 10px 0;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		align-items: center;
		width: 100%;
	}
	.navigator-frame{
		display: flex;
		flex-direction: column;
		align-items: center;
		width: 100%;
	}
	.navigator-frame a{
		width: 100%;
	}
	.nav{
		display: flex;
		flex-direction: row;
		width: 90%;
		justify-content: space-between;
		background-color: gray;
		margin: 12px;
		box-sizing: border-box;
		border-radius: 12px;
	}
	.nav > *{
		height: 60px;
		display: flex;
		align-items: center;
	}
	.nav .icon{
		width: 40%;
	}
	.nav .title{
		width: 60%;
		font-size: 20px;
		font-weight: 700;
		color: red;
	}
	a{
		text-decoration: none;
	}

	.setting-frame{
		display: flex;
		justify-content: center;
		align-items: center;
		width: 90%;
	}
	.setting-frame a{
		width: 100%;
	}
	.setting{
		display: flex;
		justify-content: center;
		align-items: center;
		height: 50px;
	}

</style>

<?php 
global $controller;
$ctrlarr = array('postcontroller', 'profilecontroller', 'friendcontroller', 'groupcontroller', 'messagecontroller', 'studycontroller');
$clsname = array('home', 'announce', 'friend', 'group', 'message', 'study');
for ($i = 0; $i < 6; $i++){
	if ($controller == $ctrlarr[$i]){
?>
<style type="text/css">
	.<?php echo $clsname[$i]; ?>{
		background-color: lightblue;
	}
</style>
<?php
	} else {
?>
<style type="text/css">
	.<?php echo $clsname[$i]; ?>{
		background-color: gray;
	}
</style>
<?php
	}
}

?>


<div class="sidebar-frame">
	<div class="avatar-frame">
		<div class="avatar">
			<a href="/BKSNet/profilecontroller/viewme">
				<img src="/BKSNet/img/avatar.jpg" class="img">
			</a>
		</div>
		<div class="name">
			<a href="/BKSNet/profilecontroller/viewme">
				<p> Trần Phúc </p>
			</a>
		</div>
	</div>	
	<div class="function-frame">
		<div class="navigator-frame">
			<a href="/BKSNet/postcontroller/postlist">
				<div class="nav home">
					<div class="icon">
						
					</div>
					<div class="title">
						<p>HOME</p>
					</div>
				</div>
			</a>
			<a href="/BKSNet/profilecontroller/announce">
				<div class="nav announce">
					<div class="icon">
						
					</div>
					<div class="title">
						<p>Announce</p>
					</div>
				</div>
			</a>
			<a href="/BKSNet/friendcontroller/listfriend/1">
				<div class="nav friend">
					<div class="icon">
						
					</div>
					<div class="title">
						<p>Friend</p>
					</div>
				</div>
			</a>				
			<a href="/BKSNet/groupcontroller/listgroup/1">
				<div class="nav group">
					<div class="icon">
						
					</div>
					<div class="title">
						<p>Group</p>
					</div>
				</div>
			</a>
			<a href="/BKSNet/messagecontroller/view/null">
				<div class="nav message">
					<div class="icon">
						
					</div>
					<div class="title">
						<p>Message</p>
					</div>
				</div>
			</a>
			<a href="/BKSNet/studycontroller/choose">
				<div class="nav study">
					<div class="icon">
						
					</div>
					<div class="title">
						<p>Study</p>
					</div>
				</div>
			</a>
		</div>
		<div class="setting-frame">
			<a href="/BKSNet/settingcontroller/setting">
				<div class="setting">
					<p>setting</p>
				</div>
			</a>
		</div>
	</div>
</div>

