<?php
Class PostView{
	public function show($rows,$totalPages){
		include_once('templates/posts.php');
	}
	public function add(){
		include_once('templates/add_post.php');
	}
	public function edit($rows){
		include_once('templates/edit_post.php');
	}
	public function show1($rows){
		include_once('templates/show_post.php');
	}
}
?>