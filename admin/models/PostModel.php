<?php
Class PostModel{
	public function getPost($page){
		$connect = mysqli_connect("localhost","root","","oceansoft_test");
		if(mysqli_connect_errno()){
			echo "Failed to connect to". mysqli_connect_error();
		}
		if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        else{
            $page=1;
        }
		$rowsPerPage=5;
        $perRow=$page*$rowsPerPage-$rowsPerPage;
        $sql="SELECT * FROM posts ORDER BY id_post ASC LIMIT $perRow,$rowsPerPage";
        $query=mysqli_query($connect,$sql);

		$rows = array();
		if($query->num_rows > 0){
			while($row = mysqli_fetch_assoc($query)){
				$rows[] = $row;
			}
		}
		return $rows;
	}
	public function getPagi(){
		$connect = mysqli_connect("localhost","root","","oceansoft_test");
		if(mysqli_connect_errno()){
			echo "Failed to connect to". mysqli_connect_error();
		}
		$rowsPerPage=5;
		$totalRows=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM posts"));
        $totalPages=ceil($totalRows/$rowsPerPage);
        return $totalPages;

	}

	public function addPost($row){
		$connect = mysqli_connect("localhost","root","","oceansoft_test");
		if(mysqli_connect_errno()){
			echo "Failed to connect to". mysqli_connect_error();
		}

		$sql = "INSERT INTO posts(
        title,description,status,image,create_at) VALUES ('$row[title]','$row[description]','$row[status]','$row[image]',now())";

		$query = $connect->query($sql);
		return $query;

	}
	public function getShowPost($id_post){
		$connect = mysqli_connect("localhost","root","","oceansoft_test");
		if(mysqli_connect_errno()){
			echo "Failed to connect to". mysqli_connect_error();
		}
		$query = $connect->query("SELECT * FROM posts WHERE id_post = '$id_post'");
		return $query;
	}

	public function deletePost($id_post){
		$connect = mysqli_connect("localhost","root","","oceansoft_test");
		if(mysqli_connect_errno()){
			echo "Failed to connect to". mysqli_connect_error();
		}
		$sql="DELETE FROM posts WHERE id_post = '$id_post'";
		$query = $connect->query($sql);
		return $query;


	}
	public function editPost($id_post,$row){
		$connect = mysqli_connect("localhost","root","","oceansoft_test");
		if(mysqli_connect_errno()){
			echo "Failed to connect to". mysqli_connect_error();
		}
		$sql = "UPDATE `posts` SET `title` = '".$row['title']."',`description` = '".$row['description']."',`status` = '".$row['status']."',`image` = '".$row['image']."', `update_at` = now() WHERE `posts`.`id_post` = ".$id_post."";
		$query = $connect->query($sql);
		return $query;

	}

	public function getPostEdit($id_post) {
		$connect = mysqli_connect("localhost","root","","oceansoft_test");
		if(mysqli_connect_errno()){
			echo "Failed to connect to". mysqli_connect_error();
		}
		$sql = "SELECT * FROM posts WHERE id_post = '$id_post'";
		$query = $connect->query($sql);
		return $query;
	}
}


?>