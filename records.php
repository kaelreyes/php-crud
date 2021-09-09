<?php 
    $title = 'Records';
    require_once "includes/header.php";
    require_once "process.php";
?>
<div class="record px-3">
    <table class="table table-hover text-center" id="record-table">
        <h3 class="text-center mb-4 mt-2">VIEW RECORDS</h3>
        <thead class="table-dark">
            <tr>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>EMAIL ADDRESS</th>
                <?php 
                    if(isset($_SESSION['fname']) && $_SESSION['loggedin'] == true){
                        echo '<th>ACTION</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody class="align-middle">
            <?php 
                require_once "includes/connect.php";

                $sql = "SELECT * FROM student";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                            echo "<td>" . ucwords($row['fname']). "</td>";
                            echo "<td>" . ucwords($row['lname']). "</td>";
                            echo "<td>" . $row['email']. "</td>";
                            if(isset($_SESSION['fname']) && $_SESSION['loggedin'] == true){
                                echo "<td>";
                                echo "<a class='btn btn-warning' href='add.php?edit=" .$row['id']. "'>EDIT</a>&nbsp";
                                echo "<a class='btn btn-danger' href='process.php?del=" .$row['id']. "'>DELETE</a>";
                            echo "</td>";
                            }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                        echo "<td colspan=4>No data found</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<?php
    if (isset($_GET['status'])){
        $status = $_GET['status'];

        echo '
        <div class="position-fixed bottom-0 start-0 p-3 " style="z-index: 11">
        ';
        if($status == "added"){
            echo '
            <div class="toast hide text-black bg-white" id="myBtn" role="alert" aria-live="assertive" aria-atomic="true" style="border:3px solid green;">
                <div class="d-flex">
                    <div class="toast-body"><i class="fa fa-check-circle" style="margin-right:.25rem; color:green;"></i><span>Successful! User has been added.<span>
            ';
        } else if ($status == "edited"){
            echo '
            <div class="toast hide text-black bg-white" id="myBtn" role="alert" aria-live="assertive" aria-atomic="true" style="border:3px solid green;">
                <div class="d-flex">
                    <div class="toast-body"><i class="fa fa-check-circle" style="margin-right:.25rem; color:green;"></i><span>Successful! Changes has been saved.</span>';
        } else if ($status == "deleted"){
            echo '
            <div class="toast hide text-black bg-white" id="myBtn" role="alert" aria-live="assertive" aria-atomic="true" style="border:3px solid green;">
                <div class="d-flex">
                    <div class="toast-body"><i class="fa fa-check-circle" style="margin-right:.25rem; color:green;"></i><span>Successful! User is deleted.</span>';
        } else if ($status == "failed"){
            echo '
            <div class="toast hide text-black bg-white" id="myBtn" role="alert" aria-live="assertive" aria-atomic="true" style="border:3px solid red;">
                <div class="d-flex">
                    <div class="toast-body"><i class="fa fa-times-circle" style="margin-right:.25rem; color:red;"></i><span>Failed. Something went wrong.</span>';
        }
        echo '
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        ';
    }
?>

<?php require_once "includes/footer.php"?>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- datatable -->
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready( function () {
        $('#record-table').DataTable();
        $('.toast').toast('show');
    } );
</script>

    