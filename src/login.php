<?php
// include the configs / constants for the database connection
      require_once("../config/db.php");
// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

// make the request to the DATABASE
$sql = "SELECT mail,password
     FROM user
     WHERE mail ='" . $_POST['email'] . "' AND password = '" . $_POST['mdp'] . "';";
$result = mysqli_query($conn, $sql); // send the query
//$row = mysqli_fetch_assoc($result); // fetch keys with values
if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good

      echo "<div class=\"alert alert-success\" role=\"alert\">
      Connecté !
      </div>";

}else {
   echo "<div class=\"alert alert-danger\" role=\"alert\">
   email ou mot de passe incorrect !
   </div>";
}
mysqli_close($conn);
 ?>
