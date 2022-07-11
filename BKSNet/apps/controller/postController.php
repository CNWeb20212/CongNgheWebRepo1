<?php 


class postcontroller{

	public function postcreate(){

	}
	public function postlist(){

		include ROOT . "/apps/view/layout/header.php";
		include ROOT . '/apps/view/socialnetwork/post/postListView.php';
		include ROOT . "/apps/view/layout/footer.php";
	}
	public function postdetail(){

	}

}


?>