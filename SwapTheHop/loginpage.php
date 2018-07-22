<?php
    if (isset($_SESSION['user_id'])){ //check that user id is set
        // include pic database

        // make div element for section
        echo "<div class='menu-profile-container'>";

        // display welcome info and link to user page
        // display user profile image
        $id_login = $_SESSION['user_id'];
            $sql_img_login = "SELECT * FROM profileimg WHERE userid='$id_login'";
            $result_img_login = mysqli_query($connect, $sql_img_login);
            while ($rowImg_login = mysqli_fetch_assoc($result_img_login)){
                echo "<div class='menu-profile-container'>";
                    if ($rowImg_login['default_img'] == 0){
                        $ext_login = $rowImg_login['ext'];
                        echo "<img class='Beer-Table-Pic img-circle' src='uploads/profile".$id_login.".".$ext_login."'>";
                    } else{
                        echo "<img class='Beer-Table-Pic img-circle' src='uploads/profiledefault.png'>";
                    }
                echo "</div>";
            }
        // welcome user
        echo '<table class="logout-submit">';
            echo '<tr>';
                echo '<td>';
                    echo 'Welcome <a href="userPage.php">'.$_SESSION["user_username"].'</a>';
                echo '</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>';
                    echo '<Form action="includes/logout.inc.php" method="POST" >';
                        echo '<button type="submit" name="logoutButton" >Logout</button>';
                    echo '</form>';
                echo '</td>';
            echo '</tr>';
        echo '</table>';
        echo "</div>";

    } else {
        // if they are not signed in then prompt them to sign in
        echo '<form action="includes/login.inc.php" method="POST">';
            echo '<input type="text" name="username" placeholder="username/e-mail">';            
            echo '<input type="password" name="password"placeholder="password">';
            echo '<button class="loginButton" type="submit" name="submitLogin">Login</button>';
        echo '</form>';
        echo '<a href="signup.php">Sign Up</a>'; // prompt to sign up 
        echo "</div>";
    }
