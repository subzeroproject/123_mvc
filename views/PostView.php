<?php
Class PostView{
	public function show($rows,$totalPages){
		include_once('templates/posts.php');
	}
	public function view($post){
		include_once('templates/view_post.php');
	}
}
?>