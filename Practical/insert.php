<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Insert data into the database
    if(ISSET($_POST['insertData']))
    {
        $username= $_POST['username'];
        $emailid = $_POST['emailid'];
        $address = $_POST['address'];
        $dateofbirth = $_POST['dateofbirth'];
        $uploadyourpic = $_POST['uploadyourpic'];

        $sql = "INSERT INTO tbl_record(username, emailid, address, dateofbirth, uploadyourpic, created_date) VALUES('$username', '$emailid', '$address', '$dateofbirth', '$uploadyourpic', NOW())";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script> alert("Data saved."); </script>';
            header('Location: index.php');
        }else{
            echo '<script> alert("Data Not saved."); </script>';
        }
    }
?>
