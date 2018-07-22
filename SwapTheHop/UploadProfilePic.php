<?php

// start user session
session_start();
// include databse file
include_once 'DBC_Pic.php';

// variables
$id = $_SESSION['user_id'];

// check if variable is set
if (isset($_POST['submit_Pic'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 500000){
                $fileNameNew = "profile".$id.".".$fileActualExt;
                $fileDestination = "uploads/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                // change db status
                $sql_update_img = "UPDATE profileimg SET default_img=0, ext='$fileActualExt'  WHERE userid='$id'";
                $result_update_img = mysqli_query($conn_Pic_Db, $sql_update_img);
        
                header("Location: userPage.php");

            }else {
                echo "<script>";
                echo "alert('your file is too big');";
                echo "window.location.href = 'userPage.php';";
                echo "</script>";
            }

        }else{
            echo "<script>";
            echo "alert('there was an error uploading your file');";
            echo "window.location.href = 'userPage.php';";
            echo "</script>";
        }

    }else{
        echo "<script>";
        echo "alert('you cannot upload files of this type');";
        echo "window.location.href = 'userPage.php';";
        echo "</script>";
       

    }
}
?>