<?php
// include header
include_once 'header.php';

// check if user is set
if (isset($_SESSION['user_id'])){

    // Start page
    ?>
    <!-- Bootsrtap start-->
    <!-- make Title of page -->
    <div class="row">
        <div class="col-sm-4"></div>
        <?php echo "<div class='col-sm-4 sth-header'> <h3 class='h3 text-center'> ".$_SESSION['user_username']." </h3> </div>" ;?>
        <div class="col-sm-4"></div>
    </div>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 sth-user-page">
            <?php
                // load profile pic
                // make variables
                $id = $_SESSION['user_id'];
                $sql_img = "SELECT * FROM profileimg WHERE userid='$id'";
                $result_img = mysqli_query($connect, $sql_img);
                while ($rowImg = mysqli_fetch_assoc($result_img)){
                    echo "<div class=''>";
                        if ($rowImg['default_img'] == 0){
                            $ext = $rowImg['ext'];
                            echo "<img class='sth-user-page-pic' src='uploads/profile".$id.".".$ext."'>";
                        } else{
                            echo "<img class='sth-user-page-pic' src='uploads/profiledefault.png'>";
                        }
                        echo "<h5 class='center'>".$_SESSION['user_username']."</h5></br>";
                        echo "<h5 class='center'>".$_SESSION['user_first']."</h5>";
                        echo "<h5 class='center'>".$_SESSION['user_last']."</h5>";
                    echo "</div>";
                }

            ?>
        </div>
        <div class="col-sm-4"></div>
    <div> <!-- end row -->      

    <?php

} else{
    echo "you are not logged in";
}
?>



<div class="container">
          <br />
      <br />
      <br />
   <div class="panel panel-default">
      <div class="panel-heading">Select Profile Image</div>
      <div class="panel-body" align="center">
       <input type="file" name="upload_image" id="upload_image" accept="image/*" />
       <br />
       <div id="uploaded_image"></div>
      </div>
     </div>
    </div>


<!-- Croppie code -->
<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
        <button class="btn btn-success crop_image">Crop & Upload Image</button>
     </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
    </div>
</div>

<!-- initialize croppie plugin script (jquery) -->
<script>  
$(document).ready(function(){

 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>

<?php
// Include Footer 

    include_once 'footer.php';
?>

<?php
 //  make form for submitting new profile pic 
            //echo "<!--<form action='UploadProfilePic.php' method='POST' enctype='multipart/form-data'>-->
                //<input type='file' name='upload_image' id='upload_image'>
            // <!-- <input type='submit' name='submit_Pic' value='Submit Pic'/> -->

        // <!--</form>-->";
            
            // display image to crop
        // echo "<div id='uploaded_image'></div>";

            // image demo
        // echo "<div id='image_demo' style='width:350px; margin-top:30px'></div>";

            // make submit button
        // echo "<button class='btn btn-success crop_image'>Crop and upload image</button>";

?>