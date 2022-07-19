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
		margin: 64px 0px;
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

	.post-frame{
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: center;
		box-sizing: border-box;
	}

	.postcard{
		width: 75%;
		margin: 0 0 48px 0px;
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
	.post-user,.user-frame{
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
	.post-header .post-group{
		/*width: calc(100% - max(40%, 400px));*/
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: center;
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
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: flex-start;
	}
	.postcard .post-infor{
		width: 90%;
		display: flex;
		flex-direction: row-reverse;
		justify-content: flex-start;
		color: gray;
		align-items: center;
	}
	.postcard .post-button{
		width: 90%;
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
		box-sizing: border-box;
		padding: 2px;
		border: solid gray 2px;
		cursor: pointer;
	}
	.post-button > *{
		width: 30%;
		border: solid gray 2px;
		height: 36px;
		border-radius: 8px;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.postcard .post-comment{
		width: 90%;
		display: flex;
		flex-direction: column;
	}
	.comment-frame{
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		margin: 8px 0px;
	}

	.comment-frame .user-frame > *{
		margin-right: 16px;
	}
	.comment-frame .content-frame{
		margin: 16px 0px;
	}
	.comment-frame .content-frame span{
		word-break: break-word;
		max-width: 100%;
		box-sizing: border-box;
		border-radius: 8px;
		/*border: solid black 2px;*/
		padding: 8px 16px;
		background-color: blue;
		color: white;
	}

	.postcard .submit-comment-frame{
		width: 90%;
		margin: 16px 8px 32px 8px;
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
		align-items: center;
		box-sizing: border-box;
	}
	.submit-comment-frame .myavatar-frame{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.submit-comment-frame .input-comment{
		height: 32px;
		width: 60%;
		padding: 8px;
		margin: 0px 16px;
		border-radius: 8px;
		background-color: lightgray;
	}
	.submit-comment-frame .input-comment:focus{
		background-color: white;
	}
	.submit-comment-frame .submit-comment{
		height: 32px;
		width: 96px;
		border: none;
		border-radius: 8px;
		box-sizing: border-box;
		font-weight: bold;
		color: white;
		background-color: #b00418;
		display: flex;
		justify-content: center;
		align-items: center;
		cursor: pointer;
	}
</style>

<script type="text/javascript">
	let commentStyle = "word-break:break-word; padding:0;";
	let liked = new Map();
	<?php 
		foreach ($postlist as $post){
			if ($this->liked($post['postid'])){
				?>
					liked.set(<?php echo $post['postid']; ?>, 1);
				<?php
			} else {
				?>
					liked.set(<?php echo $post['postid']; ?>, 0);
				<?php
			}
		}
	?>
	let ttk = "<?php echo $_COOKIE['ttk']; ?>";
	function comment(postid) {
		let post = document.getElementById(postid);
		cmt = post.getElementsByClassName("input-comment")[0];
		cmt.focus();
	}

	function isEmpty(text){
		for (let i = 0; i < text.length; i++){
			if (text[i] != ' ') return false;
		}
		return true;
	}

	function submitComment(postid){
		let post = document.getElementById(postid);
		cmt = post.getElementsByClassName("input-comment")[0];
		cmt.focus();
		text = cmt.value;
		if (isEmpty(text)){
			cmt.placeholder = "Bình luận không được rỗng";
		} else {
			xml = new XMLHttpRequest();
			xml.open("post", "/BKSNet/post/insertComment/<?php echo $_COOKIE['ttk'] ?>/" + postid + "/" + text, true);
			xml.send();

			let patterncmt = post.getElementsByClassName("pattern-comment")[0];
			let cl = patterncmt.cloneNode(true);			

			cl.getElementsByClassName("content-frame")[0].getElementsByTagName("span")[0].innerHTML = text;
			cl.style.display = "initial";
			cl.getElementsByClassName("user-name")[0].innerHTML = "<?php echo $acc['ho'] . " " . $acc['ten'] ?>";
			cl.getElementsByClassName("comment-time")[0].innerHTML = "<?php echo getTime(); ?>";

			post.getElementsByClassName("post-comment")[0].appendChild(cl);
			cmt.value = "";
		}
	}

	

	function like(postid){
		// alert(liked);
		let post = document.getElementById(postid);
		let like = post.getElementsByClassName("like-button")[0].getElementsByTagName("p")[0];
		if (liked.get(postid) == 0){
			liked.set(postid, 1);
			like.innerHTML = "Đã thích";
			xml = new XMLHttpRequest();
			xml.open("post", "/BKSNet/post/insertLike/<?php echo $_COOKIE['ttk'] ?>/" + postid, false);
			xml.send();
		} else {
			liked.set(postid, 0);
			like.innerHTML = "Thích";
			xml = new XMLHttpRequest();
			xml.open("post", "/BKSNet/post/deleteLike/<?php echo $_COOKIE['ttk'] ?>/" + postid, false);
			xml.send();
		}
		// alert("done");
	}
</script>

<?php 
function printval($val){
	echo $val ?? "";
}
function printarr($arr, $key){
	echo isset($arr[$key]) ? $arr[$key] : "";
}
?>

<div class="parent-frame">
	<div class="button-frame">
		<a class="button" href="/BKSNet/postcontroller/postcreate"> Thêm bài đăng </a>
		<?php 
			global $action;
			if ($action == "viewmypost"){
				echo "<a class='button' href='/BKSNet/postcontroller/postlist'> Xem bài đăng </a>";
			} else {
				echo "<a class='button' href='/BKSNet/postcontroller/viewmypost'> Bài đăng của tôi </a>";
			}
		?>
		
	</div>
	<div class="post-frame">
		<?php 
			foreach ($postlist as $post){
				include ROOT . "/apps/view/socialnetwork/post/postcard.php";
			}
		?>
	</div>
</div>

