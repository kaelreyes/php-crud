<?php 
    require_once "includes/connect.php";

    $fname = "";
    $lname = "";
    $email = "";

    //login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        // echo $username . $password;
        if(empty($username) || empty($password)){
            header("location:index.php?status=empty");
        } else {
            $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['fname'] = $username;
                header("location:records.php");
            } else {
                header("location:index.php?status=failed");
            }
        }
    }

    if(isset($_GET['logout'])){
        session_start();
        session_destroy();
        header("location:index.php");
    }

    //add
    if(isset($_POST['add'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        // echo "hello";
        $sql = "INSERT INTO student(fname, lname, email) VALUES('$fname', '$lname', '$email')";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("location: records.php?status=added");
        } else {
            header("location: records.php?status=failed");
        }
    }

    //edit to form field
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];

        $sql = "SELECT * FROM student WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
            }
        } else {
            header("location:records.php?status=failed");
        }
    }

    //edit
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];

        $sql = "UPDATE student SET fname='$fname', lname='$lname', email='$email' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("location:records.php?status=edited");
        } else {
            header("location:records.php?status=failed");
        }
    }

    //delete
    if(isset($_GET['del'])){
        $id = $_GET['del'];

        $sql = "DELETE FROM student WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("location:records.php?status=deleted");
        } else {
            header("location:records.php?status=failed");
        }
    }

?>