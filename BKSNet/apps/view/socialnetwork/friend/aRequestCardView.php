<style type="text/css">
	
	.a-card-user{
		width: 100%;
		margin: 0;
	}

	ul {
		list-style-type: none;
	}
	h3 {
  		font: bold 20px/1.5 Helvetica, Verdana, sans-serif;
  		margin: 0;
	}
	li img {
		float: left;
		margin: 0 15px 0 0;
	}

	li p {
	 	font: 200 12px/1.5 Georgia, Times New Roman, serif;
	}

	li {
		padding: 10px;
		overflow: auto;
	}

	li:hover {
	 	background: #eee;
		cursor: pointer;
	}

	.frame-request{
		display: flex;
		flex-direction: column;
		border: solid;
		border-width: 1px;
		border-color: #a6a3a2;
		border-radius: 10px;
	}
	.content{
			display: flex;
	}
	.img{
		margin: 5px;
	}
	.img img{
		object-fit: cover;
		border-radius: 50%;
		height: 60px;
		width: 60px;
	}

	/*css cho button*/
	.button-frame{
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.button-frame .button{
		margin: 64px;
		margin-bottom: 20px;
		height: 30px;
		width: fit-content;
		border-radius: 6px;
		box-sizing: border-box;
		font-weight: bold;
		color: white;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	#accept-button{
		background-color: #b00418;
		margin: 10px;
		margin-right: 50px;
	}

	#delete-button{
		margin: 10px;
		margin-left: 50px;
		background-color: #473d3d;
	}

</style>

<a class="a-card-user" href="/BKSNet/friendcontroller/viewrequestuser/<?php echo $request['ttk'] ?>">
	<ul>
		<li>
			<div class="frame-request">
				<div class="content">
					<div class="img">
						<img src="/BKSnet/img/avatar.jpg">
					</div>
					<div class="description">

						<h3 id="name"><?php echo $request['hoten'] ?></h3>
						<p id="ttk"><?php echo $request['ttk'] ?></p>
						<p id="school"><?php echo $request['school'] ?></p>
						<p id="major"><?php echo $request['major'] ?></p>
					</div>
				</div>
				

				<div class="button-frame">
					<form action="/BKSNet/friendcontroller/addfriend/<?php echo $request['ttk'] ?>">
						<input id="accept-button" class="button" type="submit" name="accept-button" value="Chấp nhận">
					</form>


					<form action="/BKSNet/friendcontroller/deleterequest/<?php echo $request['ttk'] ?>">
						<input id="delete-button" class="button" type="submit" name="delete-button" value="Xóa">
					</form>
				</div>
				
			</div>
		</li>
	</ul>
</a>