<style type="text/css">
	
	.a-card-friend{
		width: 100%;

	}

	ul {
		list-style-type: none;
		display: flex;
		justify-content: center;
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
		width: 100%;
	}

	li:hover {
	 	background: #eee;
		cursor: pointer;
	}
	.content-friend{
			display: flex;
			border: solid;
			border-width: 1px;
			border-color: #a6a3a2;
			border-radius: 10px;
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

	h4{
		background-color: white;
	}

	.name{
		margin: 0;
	}


</style>

<a class="a-card-friend" href="/BKSNet/friendcontroller/viewusersearch/<?php echo $usersearch['ttk'] ?>">
	<ul>
		<li>
			<div class="content-friend">
				<div class="img">
					<img src="/BKSnet/img/avatar.jpg">
				</div>
				<div class="description">

					<h4 id="name"><?php echo $usersearch['hoten'] ?></h3>
					<p id="ttk"><?php echo $usersearch['ttk'] ?></p>
					<p id="school"><?php echo $usersearch['school'] ?></p>
					<p id="major"><?php echo $usersearch['major'] ?></p>
				</div>
			</div>
		</li>
	</ul>
</a>