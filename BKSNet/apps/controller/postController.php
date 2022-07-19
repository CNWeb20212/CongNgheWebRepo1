<?php 


class postcontroller{

	public function postcreate(){
		$acc = (new student())->getRow($_COOKIE['ttk']);
		$announce = "";
		$content = null;

		if (isset($_POST['create'])){
			if ($this->isEmpty($_POST['content'])){
				$announce = "Content không được rỗng";
			} else {
				$content = $_POST['content'];
				$access = $_POST['access'];
				(new post())->insertPost($_COOKIE['ttk'], $content, "null", $access, "null");
				header("location: /BKSNet/postcontroller/viewmypost");
				return;
			}
		}

		include ROOT . "/apps/view/layout/header.php";
		include ROOT . '/apps/view/socialnetwork/post/postFormView.php';
		include ROOT . "/apps/view/layout/footer.php";
	}

	public function postlist(){
		$db = new post();
		// echo $_COOKIE['ttk'];
		$postlist = $db->selectPostFor($_COOKIE['ttk']);

		$this->viewlistpost($postlist);
	}

	public function viewlistpost($postlist){
		$acc = (new student())->getRow($_COOKIE['ttk']);

		include ROOT . "/apps/view/layout/header.php";
		// foreach ($_COOKIE as $key=>$value){
		// 	echo $key . " => " . $value . "<br>";
		// }
		include ROOT . '/apps/view/socialnetwork/post/postListView.php';
		include ROOT . "/apps/view/layout/footer.php";
	}

	public function viewmypost(){
		$db = new post();
		$postlist = $db->selectPostOf($_COOKIE['ttk']);

		$this->viewlistpost($postlist);	
	}
	
	public function postdetail($postid){
		$post = (new post())->getPost($postid);
		$acc = (new student())->getRow($_COOKIE['ttk']);

		include ROOT . "/apps/view/layout/header.php";
		// foreach ($_COOKIE as $key=>$value){
		// 	echo $key . " => " . $value . "<br>";
		// }
		include ROOT . '/apps/view/socialnetwork/post/postDetailView.php';
		include ROOT . "/apps/view/layout/footer.php";	
	}

	public function share($postid){
		$acc = (new student())->getRow($_COOKIE['ttk']);
		$announce = "";
		$post = (new post())->getPost($postid);
		$content = $post['caption'];

		if (isset($_POST['create'])){
			if ($this->isEmpty($_POST['content'])){
				$announce = "Content không được rỗng";
			} else {
				$content = $_POST['content'];
				$access = $_POST['access'];
				(new post())->insertPost($_COOKIE['ttk'], $content, "null", $access, "null");
				header("location: /BKSNet/postcontroller/viewmypost");
				return;
			}
		}

		include ROOT . "/apps/view/layout/header.php";
		include ROOT . '/apps/view/socialnetwork/post/postFormView.php';
		include ROOT . "/apps/view/layout/footer.php";
	}

	public function liked($postid){
		$listLike = (new post())->getAllLike($postid);
		foreach ($listLike as $like){
			if ($_COOKIE['ttk'] == $like['ttk']){
				return true;
			}
		}
		return false;
	}

	public function isEmpty($val){
		for ($i = 0; $i < strlen($val); $i++){
			if ($val[$i] != ' ') return false;
		}
		return true;
	}

}


?>