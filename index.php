<?php 
    $title = 'Login';
    require_once "includes/header.php"
?>

<form action="process.php" method="POST">
    <div class="row justify-content-center">
        <div class="col-3 border border-dark p-5" style="width:400px">
            <h3 class="text-center mb-4">LOGIN</h3>
            <?php 
            if(isset($_GET['status'])){
                $status = $_GET['status'];

                if ($status == 'empty'){
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed! Enter your username and password.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } else if ($status == 'failed'){
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Try again! Incorrect username and password.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com" autocomplete="off" required>
                <label for="username">USERNAME</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>
                <label for="password">PASSWORD</label>
            </div>
            <button type="submit" class="btn btn-primary col-12 mb-2" name="login">SUBMIT</button>
        </div>
    </div>
</form>


<?php require_once "includes/footer.php"?>
    