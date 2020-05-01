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
            elseif($_GET['action']=='view'){
                $id_post = $_GET['id_post'];
                $postController->viewPost();
            }
            else{
                $postController->getPost();
            }
        }


?>
