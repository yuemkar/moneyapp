<!doctype html>
<html lang="tr">
<head>
    <?php include "views/includes/head.php"; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <!-- Header --->
    <?php require_once "views/includes/header.php"; ?>
    <!-- /Header --->

    <!-- Left side column. contains the logo and sidebar -->
    <?php require_once "views/includes/aside.php"; ?>

    <!--------------- Main content ------------->
    <?php require_once "views/user/content/list_content.php"; ?>
    <!--------------- /Main content ------------>

    <!-- Footer --->
    <?php require_once "views/includes/footer.php"; ?>
    <!-- /Footer --->

</div>


<?php include "views/includes/include_script.php"; ?>
</body>
</html>