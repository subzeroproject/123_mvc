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
	public function addPost(){
		include_once('views/PostView.php');
		$postView = new PostView();
		$postView = $postView->add();
	}
	public function doAdd(){
		
			$title = $_POST['title'];
		    $description = $_POST['description'];
		    $status = $_POST['status'];
		    if($_FILES['image']['name']==''){
                $error_image='<span style="color: red;">Ảnh không hợp lệ</span>';
            }
            else{
                $image=$_FILES['image']['name'];
                $tmp_name=$_FILES['image']['tmp_name'];
            }
            move_uploaded_file($tmp_name, 'templates/image/'.$image);

		    $row = array(
		    	'title'=>$title,
		    	'description'=>$description,
		    	'status'=>$status,
		    	'image'=>$image,
		    );
		    
	        $postModel = new PostModel();
	        $rows = $postModel->addPost($row);
        
    }
    public function showPost(){
		include_once('views/PostView.php');
		$id_post = $_GET['id_post'];
		$postModel = new PostModel();
		$rows = $postModel->getShowPost($id_post);
		$postView = new PostView();
		$postView = $postView->show1($rows);
	}

    public function deletePost($id_post){
    	include_once('views/PostView.php');
    	$postModel = new PostModel();
	    $postModel->deletePost($id_post);
    }

    public function editPost($id_post){
		
		$postModel = new PostModel();
		$rows = $postModel->getPostEdit($id_post);

		include_once('views/PostView.php');

    	$postView = new PostView();
		$postView = $postView->edit($rows);
	}

}
?>