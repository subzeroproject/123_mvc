<?php
include_once('models/PostModel.php');

Class PostController{
	public function getPost($page){
		include_once('views/PostView.php');
		$postModel = new PostModel();
		$rows = $postModel->getPost($page);
		$totalPages = $postModel->getPagi();

		$postView = new PostView();
		$postView = $postView->show($rows,$totalPages);
	}
	public function viewPost(){
		include_once('views/PostView.php');
		$id_post = $_GET['id_post'];
		$postModel = new PostModel();
		$post = $postModel->getViewPost($id_post);
		$postView = new PostView();
		$postView = $postView->view($post);
	}
}
?>