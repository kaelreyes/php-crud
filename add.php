<?php 
    $title = 'Add';
    require_once "includes/header.php";
    require_once "process.php";

    if(!isset($_SESSION['fname']) && !$_SESSION['loggedin']){
        header("location:records.php");
    }   
?>
<form action="process.php" method="POST">
    <div class="row justify-content-center m-2">
        <div class="col-sm-3 border border-dark p-5" style="width:500px">
            <h3 class="text-center mb-4">USER INFORMATION</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="fname" name="fname" value="<?= $fname ?>" placeholder="name@example.com" autocomplete="off" required>
                <label for="fname">FIRST NAME</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="lname" name="lname" value="<?= $lname ?>" placeholder="name@example.com" autocomplete="off" required>
                <label for="lname">LAST NAME</label>
            </div>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="Password" autocomplete="off" required>
                <label for="email">EMAIL ADDRESS</label>
            </div>
            <?php 
                if(isset($_GET['edit'])){  
                    $id = $_GET['edit'];
                    echo '<input type="hidden" value="' . $id .'" name="id">'; 
                    echo '<button type="submit" class="btn btn-success col-12" name="edit">SAVE CHANGES</button>';
                    echo '<a class="btn btn-secondary mt-2 col-12" href="records.php">BACK</a>';
                } else {
                    echo '<button type="submit" class="btn btn-primary col-12" name="add">SUBMIT</button>';
                }
            ?>
        </div>
    </div>
</form>


<?php require_once "includes/footer.php"?>