<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Amazon ECE</title>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

   <!--NAVBAR-->
   <?php session_start();
   $alert="";
    if (isset($_POST['email']) and isset($_POST['mdp'])) {
        // include the configs / constants for the database connection
        require_once("config/db.php");
        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // make the request to the DATABASE
        $sql = "SELECT mail,password,name,id_buyer,id_card
          FROM buyer
          WHERE mail ='" . $_POST['email'] . "' AND password = '" . $_POST['mdp'] . "';";
        $result = mysqli_query($conn, $sql); // send the query
         $row = mysqli_fetch_assoc($result); // fetch keys with values
         if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
            $_SESSION["email"]=$_POST['email'];
             $_SESSION["name"]=$row['name'];
             $_SESSION["id"]=$row['id_buyer'];
             $_SESSION["idcb"]=$row['id_card'];
             $_SESSION["type"]="buyer";
         } else {
             // make the request to the DATABASE
             $sql2 = "SELECT mail,password,name,id_seller
               FROM seller
              WHERE mail ='" . $_POST['email'] . "' AND password = '" . $_POST['mdp'] . "';";
             $result2 = mysqli_query($conn, $sql2); // send the query
             $row2 = mysqli_fetch_assoc($result2); // fetch keys with values
             if (mysqli_num_rows($result2) > 0) { // if we get back some values so the request was good
                $_SESSION["email"]=$_POST['email'];
                 $_SESSION["name"]=$row2['name'];
                 $_SESSION["id"]=$row2['id_seller'];
                // $_SESSION["idcb"]=$row['id_card'];
                 $_SESSION["type"]="seller";
             } else {
                 // make the request to the DATABASE
                 $sql3 = "SELECT mail,password,name,id_admin
                  FROM admin
                 WHERE mail ='" . $_POST['email'] . "' AND password = '" . $_POST['mdp'] . "';";
                 $result3 = mysqli_query($conn, $sql3); // send the query
                $row3 = mysqli_fetch_assoc($result3); // fetch keys with values
                if (mysqli_num_rows($result3) > 0) { // if we get back some values so the request was good
                   $_SESSION["email"]=$_POST['email'];
                    $_SESSION["name"]=$row3['name'];
                    $_SESSION["id"]=$row3['id_admin'];
                    $_SESSION["type"]="admin";
                }else{
                   $alert="<div class=\"alert alert-danger mt-2 mx-5 mb-5\" role=\"alert\"  style=\"text-align:center\">
                           Connection impossible, Email ou Mot de Passe incorrect !
                           </div>";
                }
             }
         }
        mysqli_close($conn);

    } ?>
   <?php
   include("views/navbar.php");
    ?>

   <?php
   echo $alert;
   if (isset($_SESSION["type"]) and $_SESSION["type"]=="seller") {
      include("views/seller_home.php");
   }elseif(isset($_SESSION["type"]) and $_SESSION["type"]=="admin"){
      include("views/admin_home.php");
   }else{
      include("views/best_sell.html");
      include("views/client_home.php");
   }
    ?>

   <script type="text/javascript">
      var element = document.getElementById("nav-home");
      element.classList.add("active");
      element = document.getElementById("nav-panier");
      element.classList.remove("active");
      element = document.getElementById("nav-compte");
      element.classList.remove("active");
   </script>

   <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
