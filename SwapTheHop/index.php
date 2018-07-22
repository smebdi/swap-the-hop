<!-- Include Header-->
<?php
    include_once 'header.php';
?>


<!-- Show list of beers -->
<h2 style='text-align: center;'>placeholder for beer search bar</h2>

<!-- start bootstrap styling for beer table -->
<div class="row">
    <div class="col-sm-4 content1-left">
        this is the left side <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    </div>
    <div class="col-sm-4">

        <!-- Start Table --> 
        <table class="content1-center">
        
        <?php
              $sql_2 = "SELECT * FROM Beer_List ORDER BY Id ASC;";
              include('DBC.php');
              $query = mysqli_query($connect,$sql_2);
              $queryCheck = mysqli_num_rows($query);
        
            if($queryCheck > 0){
        
                // --------------------
                //make a table of beers
                // --------------------
        
                // make while loop to get beers from table
                while ($rows = mysqli_fetch_assoc($query)){
                    echo ' <tr class="beerTableRow" data-href="beerpage?beerID='.$rows['Id'].'"><td>';
                    echo '<u><b>Pic:</b></u></br><img class="Beer-Table-Pic img-circle" src="Pictures/GPPaleAle.png" alt="Good People Pale Ale" ></td><td>';
                    echo '<u><b>Name:</b></u></br>'.$rows['beerName'].'</td><td>';
                    echo '<u><b>Brewery:</b></u></br>'.$rows['Brewery'].'</td><td>';
                    echo '<u><b>Style:</b></u></br>'.$rows['beerType'].'</td><td>';
                    echo '<u><b>State:</b></u></br>'.$rows['State'].'</td><td>';
                    echo '<u><b>City:</b></u></br>'.$rows['City'].'</td><td>';
                    echo '<u><b>ABV:</b></u></br>'.$rows['ABV'].'</td><td>';
                    echo '<u><b>IBU:</b></u></br>'.$rows['IBU'].'</td>';
                    echo '</tr>';
                   
                }
            }
        
        ?>
        
        <!-- End Table-->
        </table>
    </div>
    <div class="col-sm-4 content1-right">
        this is the right side
    </div>
</div>

<!-- Script for table row clicking function -->
<script>
//jQuery
    $(document).ready(function($) {
    $(".beerTableRow").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

<!-- End Showing List of beers -->

<!-- Include Footer -->
<?php
    include_once 'footer.php';
?>