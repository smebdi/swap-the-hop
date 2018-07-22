<?php

if(isset($_POST['addBeer'])){
    // Include database connection to Swap the Hop
    include_once 'DBC.php';

    // create variables to store
    $name = mysqli_real_escape_string($connect, $_POST['beerName']);
    $brewery = mysqli_real_escape_string($connect, $_POST['breweryName']);
    $style = mysqli_real_escape_string($connect, $_POST['beerStyle']);
    $state = mysqli_real_escape_string($connect, $_POST['state']);
    $city = mysqli_real_escape_string($connect, $_POST['city']);
    $ABVIntegerOne = mysqli_real_escape_string($connect, $_POST['ABVIntegerOne']);
    $ABVIntegerTwo = mysqli_real_escape_string($connect, $_POST['ABVIntegerTwo']);
    $ABVDecimal = mysqli_real_escape_string($connect, $_POST['ABVDecimal']);
    $IBUIntegerOne = mysqli_real_escape_string($connect, $_POST['IBUIntegerOne']);
    $IBUIntegerTwo = mysqli_real_escape_string($connect, $_POST['IBUIntegerTwo']);
    $IBUIntegerThree = mysqli_real_escape_string($connect, $_POST['IBUIntegerThree']);

    // write javascript code for form processing before this point so fields cannot be submitted blank where it applies
    // write php cade to condition iunformation input before it gets sent to the database

    // write code to upload a pic
    $file = $_FILES['file']; // gets info from file

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if($fileSize < 100000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTempName, $fileDestination);
                header("location: index.php?uploadsuccess");


            }else{
                echo 
                "Your file is too big";
            }
        }else{
            echo "There was an error uploading your file";
        }

    }else{
        echo "You cannot upload files of this type";
    }
}


?>