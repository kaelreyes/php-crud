<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?> | CRUD</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">

</head>
<body>
    <div class="container-fluid px-0">
    <nav class="navbar navbar-expand navbar-dark bg-dark mb-3 py-3 text-wrap">
        <div class="container-fluid" id="nav">
            <ul class="navbar-nav float-start">
                <li class="nav-item" id="records"> 
                    <a class="nav-link" aria-current="page" href="records.php" >RECORDS</a>
                </li>
            </ul>
            <?php 
                if(isset($_SESSION['fname']) && $_SESSION['loggedin'] == true){
                    echo '
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item" id="add_user">
                            <a class="nav-link" aria-current="page" href="add.php">ADD USER</a>
                        </li>
                        <li class="nav-item" id="login">
                            <a class="nav-link" aria-current="page" href="process.php?logout">LOGOUT</a>
                        </li>
                    </ul>';
                } else {
                    echo '
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item" id="login">
                            <a class="nav-link" aria-current="page" href="index.php">LOGIN</a>
                        </li>
                    </ul>';
                }
            ?>
        </div>
    </nav>