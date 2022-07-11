<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> BKSNet </title>
	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 0;
			width: max(100%, 700px);
		}
		.sidebarFrame{
			width: max(15%, 250px);
			margin: 0;
			box-sizing: border-box;
		}
		.sidebar{
			top: 0px;
			position: fixed;
			height: 100vh;
			width: 250px;
		}

		.contentFrame{
			width: calc(100% - 250px);
			margin: 0;
			float: right;
			box-sizing: border-box;
		}
		.header{
			box-sizing: border-box;
			height: 100px;
			color: black;
			width: 100%;
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin: 0;
			background-image: url("/BKSNet/img/header-background.jpg");
			background-size: 100% 100%;
			font-size: 14px;
			border-radius: 16px;
		}
		.content{
			width: 100%;
			box-sizing: border-box;
			margin: 0;
		}
		p{
			margin: 0;
		}
		.left{
			margin-left: 36px;
			display: flex;
			width: 30%;
			height: 80%;
			align-items: center;
			justify-content: center;
			box-sizing: border-box;
		}
		.left img{
			height: 100%;
			display: inline-block;
			margin: 0 24px;
		}
		.right{
			float: right;
			width: min(max(30%, 220px), 300px);
			box-sizing: border-box;
		}
	</style>
</head>
<body>
	<div class="sidebarFrame">
		<div class="sidebar">
			<?php include ROOT . "/apps/view/layout/sidebar.php" ?>
		</div>
	</div>
	<div class="contentFrame">
		<!-- Header -->
		<div class = "header">
			<div class="left">
				<img src="/BKSNet/img/logoBachKhoa.png">
				<h1>BKSNet</h1>
			</div>
			<div class="right">
				<h1> Mạng xã hội sinh viên Bách Khoa </h1>	
			</div>
					
		</div>

		<div class="content">
			
		

	


