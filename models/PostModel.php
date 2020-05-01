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
        $sql="SELECT * FROM posts WHERE status=1 ORDER BY id_post ASC LIMIT $perRow,$rowsPerPage";
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
	public function getViewPost($id_post){
		$connect = mysqli_connect("localhost","root","","oceansoft_test");
		if(mysqli_connect_errno()){
			echo "Failed to connect to". mysqli_connect_error();
		}
		$query = $connect->query("SELECT * FROM posts WHERE id_post = '$id_post'");
		return $query;
	}
}
?>