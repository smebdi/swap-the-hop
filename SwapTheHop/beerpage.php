<?php
    // Include Header
    include_once 'header.php';
    // include database connection
    include_once 'DBC.php';

    $id = $_GET['beerID'];

    // mysql database data grab
        $sql = "SELECT * FROM beer_list WHERE Id='$id'";
        $result = mysqli_query($connect, $sql);
        $resultCheck = mysqli_num_rows($result);

        // Fetch all data from row returned
        while ($rows = mysqli_fetch_assoc($result)){
            echo ''.$rows['beerName'].'';
        }

        ?>

        <img src='Pictures/GPPaleAle.png' alt='Good People Pale Ale' style='width:100px;height:150px;'>
        <?

?>


<?

    // Include Footer 

    include_once 'footer.php';
?>
