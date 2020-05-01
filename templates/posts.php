<!DOCTYPE html>
<html>
<head>
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/datepicker3.css" rel="stylesheet">        
    <link href="templates/css/styles.css" rel="stylesheet">
    <title></title>
</head>
<body>
<div class="row">
<div class="col-sm-12">
<div class="col-lg-12">
    <h1 class="page-header">List Post</h1>
</div>
</div><!--/.row-->
<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="" style="position: relative;">
                <table data-toggle="table">
                    <thead>

                        <tr>
                            <th class="col-lg-1">ID</th>
                            <th class="col-lg-2">Thump</th>
                            <th class="col-lg-9">Title</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row): ?>

                        <tr>
                          
                            <td>
                                <?php echo $row['id_post']; ?>
                            </td>

                            <td>
                                <a class="click" href="index.php?action=view&id_post=<?php echo $row['id_post']; ?>"><img width="192" height="108" src="templates/image/<?php echo $row['image']; ?>">
                                </a>
                            </td>

                            <td>
                                <a class="click" href="index.php?action=view&id_post=<?php echo $row['id_post']; ?>">
                                <?php echo $row['title']; ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <ul style="float: inherit;margin-left:50%" class="pagination">
                    <?php
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }
                    else{
                         $page=1;
                    }
                    $listPage="";
                    for($i=1;$i<=$totalPages;$i++){
                        if($page==$i){
                            $listPage.='<li class="active"><a href="index.php?action=list&page='.$i.'">'.$i.'</a></li>';
                        }
                        else{
                            $listPage.='<li><a href="index.php?action=list&page='.$i.'">'.$i.'</a></li>';
                        }
                    }
                    echo $listPage;
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>
</div><!--/.row-->
            <script src="templates/js/jquery-1.11.1.min.js"></script>
            <script src="templates/js/bootstrap.min.js"></script>
            <script src="templates/js/chart.min.js"></script>
            <script src="templates/js/chart-data.js"></script>
            <script src="templates/js/bootstrap-table.js"></script>
            <link rel="stylesheet" href="templates/css/bootstrap-table.css"/>

</body>
</html>