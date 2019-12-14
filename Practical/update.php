<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {
        $id = $_POST['updateId'];
        $username = $_POST['updateusername'];
        $emailid = $_POST['updateemailid'];
        $address = $_POST['updateAddress'];
        $dateofbirth = $_POST['updatedateofbirth'];
        $uploadyourpic = $_POST['updateuploadyourpic'];

        $sql = "UPDATE tbl_record SET username='$username',
                                        emailid='$emailid',
                                        address='$address',
                                        dateofbirth=' $dateofbirth',
                                        uploadyourpic = '$uploadyourpic'
                                        WHERE id='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>
