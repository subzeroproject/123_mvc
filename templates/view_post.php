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
        <?php foreach ($post as $row): ?>
        <h2 class="page-header"><?php echo $row['title']; ?></h1>
        <a href="index.php?action=list" class="btn btn-primary" style="margin: 10px 0 20px 0; float:right;">Back</a>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="" style="position: relative;">
                <div class="col-lg-3">
                	<img width="384" height="216" src="templates/image/<?php echo $row['image']; ?>">
                </div>
                <div class="col-lg-9">
                	<h3><?php echo $row['description']; ?></h3>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>
            <script src="templates/js/jquery-1.11.1.min.js"></script>
            <script src="templates/js/bootstrap.min.js"></script>
            <script src="templates/js/chart.min.js"></script>
            <script src="templates/js/chart-data.js"></script>
            <script src="templates/js/bootstrap-table.js"></script>
            <link rel="stylesheet" href="templates/css/bootstrap-table.css"/>

</body>
</html>