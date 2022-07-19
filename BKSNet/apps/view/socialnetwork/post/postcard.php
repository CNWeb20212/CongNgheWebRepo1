
<script type="text/javascript">
	


</script>

<div class="postcard" id="<?php echo $post['postid']; ?>"> 
	<div class="post-header">
		<div class="post-user">
			<div class="user-avatar">
				<img src= "/BKSNet/img/avatar.jpg" class="avatar">
			</div>
			<div class="user-name">
				<?php printarr($post, "username"); ?>
			</div>
		</div>
		<div class="post-group">
			<p>
				<?php printarr($post, "teamname"); ?>
			</p>
		</div>
		<div class="post-time" style="margin-left: 48px;">
			<p>
				<?php printarr($post, "time"); ?>
			</p>
		</div>
		<div class="post-access" style="margin-left: 48px;">
			<p>
				<?php printarr($post, "access"); ?>
			</p>
		</div>
	</div>
	<div class="post-content">
		<div class="caption">
			<p>
				<?php printarr($post, "caption"); ?>
			</p>
		</div>
		<div class="file">
			
		</div>
	</div>
	<div class="post-infor">
		<p>
			<?php echo $post['cntlike'] . " likes, " . $post['cntcomment'] . " comments and " . $post['cntshare'] . " shares." ?>
		</p>
	</div>
	<div class="post-button">
		<div class="like-button" onclick="like(<?php echo $post['postid']; ?>)">
			<p> 
				<?php 
					if ($this->liked($post['postid'])){
						echo "Đã thích";
					} else echo "Thích";
				?>
			</p>
			<img src="" class="icon like">
		</div>
		<div class="comment-button" onclick="comment(<?php echo $post['postid']; ?>)">
			Bình luận
			<img src="" class="icon comment">
		</div>
		<a class="share-button" href="/BKSNet/postcontroller/share/<?php echo $post['postid']; ?>">
			Chia sẻ
			<img src="" class="icon share">
		</a>
	</div>
	<div class="post-comment">
		<div class="comment-frame pattern-comment" style="display: none;">
			<div class="user-frame"> 
				<div class="user-avatar">
					<img src="/BKSNet/img/avatar.jpg" class="avatar">
				</div>
				<div class="user-name">
					Người máy
				</div>
				<div class="comment-time" style="margin-left: 48px;">
					<p>
						<?php printarr($post, "time"); ?>
					</p>
				</div>
			</div>
			<div class="content-frame"> 
				<span> Mẫu bình luận </span>
			</div>
		</div>
		<?php 
			$cnt = 0;
			foreach ($post['comment'] as $comment){
				$cnt += 1;
				if ($cnt > 5) break;
				?>
				<div class="comment-frame">
					<div class="user-frame"> 
						<div class="user-avatar">
							<img src="/BKSNet/img/avatar.jpg" class="avatar">
						</div>
						<div class="user-name">
							<?php echo $comment['username']; ?>
						</div>
						<div class="comment-time" style="margin-left: 48px;">
							<p>
								<?php printarr($comment, "time"); ?>
							</p>
						</div>
					</div>
					<div class="content-frame"> 
						<span> <?php echo $comment['content']; ?> </span>
					</div>
				</div>
				<?php
			}
		?>
	</div>
	<div class="submit-comment-frame">
		<div class="myavatar-frame">
			<img src="/BKSNet/img/avatar.jpg" class="avatar">
		</div>
		<input type="text" name="mycomment" value="" placeholder="Bình luận vào đây" class="input-comment">
		<input type="submit" name="submitcomment" class="submit-comment" value="Bình luận" 
			onclick="submitComment(<?php echo $post['postid'] ?>);">
		
		<a class="submit-comment" href="/BKSNet/postcontroller/postdetail/<?php echo $post['postid'] ?>" 
			style = "width: 200px;font-size: 14px; margin-left: 8px; display: flex; justify-content: center; align-items: center;"> <p> Xem chi tiết bài đăng </p> </a>
	</div>
</div>

