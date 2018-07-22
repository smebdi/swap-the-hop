<!-- Include Header-->
<?php
    include_once 'header.php';
?>
<!-- create form for adding a beer -->
<form id='beerInfo-Form' action='addBeerDB.php' method='POST'enctype="multipart/form-data">
    <table class='addBeerForm' >
        <tr>
            <td>
                Name of Beer <span style="color:red;">*</span>:
            </td>
            <td>
                <input type='text' name='beerName'>
            </td>
        </tr>
        <tr>
            <td>
                Brewery<span style="color:red;">*</span>:
            </td>
            <td>
                <input type='text' name='breweryName'>
            </td>
        </tr>
        <tr>
            <td>
                Style<span style="color:red;">*</span>:
            </td>
            <td>
                <select name = "beerStyle">
                    <option>Pale Ale</option>
                    <option>IPA</option>
                    <option>Lager</option>
                    <option>Porter</option>
                    <option>stout</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                State<span style="color:red;">*</span>:
            </td>
            <td>
                <select name = "state">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
            City:
            </td>
            <td>
                <input type='text' name='city'>
            </td>
        </tr>
        <tr>
            <td>
                ABV:
            </td>
            <td>
                <select name="ABVIntegerOne">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
        
                <select name="ABVIntegerTwo">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
                .
                <select name="ABVDecimal">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                IBU:
            </td>
            <td>
                <select name="IBUIntegerOne">
                    <option value="0">0</option>
                    <option value="1">1</option>
                </select>
                <select name="IBUIntegerTwo">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
                <select name="IBUIntegerThree">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Upload an Image:
            </td>
            <td>
                <input type="file" name="file">
            </td>
        </tr>
        <tr>
            <td>
                <input type='submit' name='addBeer' value='Add Beer'>
            </td>
        </tr>
    </table>
</form>


<!-- code from index page -->
<?php
// Make sql insert
if(isset($_POST['submit'])){
    // make variables
    $beerName = $_POST["beerName"];
    $breweryName = $_POST["breweryName"];
    $beerType = $_POST["beerType"];
  $sql_1 = "INSERT INTO beer_list (beerName, Brewery, beerType)VALUES ('$beerName','$breweryName','$beerType')";
  include('DBC.php');
  $insert_1 = mysqli_query($connect, $sql_1);
  if(!$insert_1){
      die('invalid query');
  }
}
?>

<!-- Include Footer -->
<?php
    include_once 'footer.php';
?>