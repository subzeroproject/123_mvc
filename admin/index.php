<?php
include_once('config/connect&database.php');
include_once('controllers/PostController.php');
$postController = new PostController();
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        else{
            $page=1;
        }
        if (isset($_GET['action'])) {
            if($_GET['action']=="list"){
            	$postController->getPost($page);
            }
            elseif($_GET['action']=="add"){
            	$postController->addPost();
            }
            elseif ($_GET['action']=="doAdd") {
            	$postController->doAdd();
                header('location: index.php?action=list');
            }
            elseif ($_GET['action']=="show"){
                $id_post = $_GET['id_post'];
                $postController->showPost();
            }
            elseif($_GET['action']=="delete"){
            	$id_post = $_GET['id_post'];
            	$postController->deletePost($id_post);
            	header('location: index.php?action=list');
            }
            elseif($_GET['action']=="edit"){
            	$id_post = $_GET['id_post'];
            	$postController->editPost($id_post);
            }
            elseif($_GET['action']=="pagi"){
                
                $postController->getPost();
            }

            elseif($_GET['action']=="editPost"){
                include_once('models/PostModel.php');

                $id_post = $_POST['id_post'];
                $title=$_POST['title'];
                $description=$_POST['description'];
                $status=$_POST['status'];
                if($_FILES['image']['name']==''){
                    $image=$_POST['image'];
                }
                else{
                    $image=$_FILES['image']['name'];
                    $tmp_name=$_FILES['image']['tmp_name'];
                }
             
            $row = array(
                    'id_post'=>$id_post,
                    'title'=>$title,
                    'description'=>$description,
                    'status'=>$status,
                    'image'=>$image,
            );

            $postModel = new PostModel();

            $postModel->editPost($id_post,$row);
            header('location:index.php?action=list');
        }
    }
?>