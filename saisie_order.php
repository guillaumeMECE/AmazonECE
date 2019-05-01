<?php session_start();
require_once("config/db.php");
?>
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

    <?php
    include("views/navbar.php");
    // Create connection
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }


      mysqli_close($conn);
         ?>

         <?php
         $nomcarte = "";
         $num = "";
         $date = "";
         $crypto = "";
         $type = "";

         // Create connection
         $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
         // Check connection
         if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
         }

         // make the request to the DATABASE
         $sql = "SELECT *
               FROM card
               INNER JOIN buyer ON card.id_card = buyer.id_buyer
               WHERE card.id_card = '".$_SESSION["idcb"]."';";

               //echo $_SESSION['idcb'];
               $result = mysqli_query($conn, $sql); // send the query
               //$row = mysqli_fetch_assoc($result); // fetch keys with values
               $row = mysqli_fetch_assoc($result);

               if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                  $nomcarte = $row['nomcarte'];
                  $numero_sql = $row['numero'];
                  $date = $row['datefin'];
                  $crypto_sql = $row['crypto'];
                  $type = $row['type'];


                }

                $numero_form = isset($_POST["numero"])? $_POST["numero"] : "";
                $crypto_form = isset($_POST["crypto"])? $_POST["crypto"] : "";

                if( ($numero_sql == $numero_form) and ($crypto_sql == $crypto_form))
                {

 ?>
                <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Votre commande est passée!</h4>
  <p>Nous vous remercions de votre commande. Vous recevrez très bientôt un mail de confirmation. </p>
  <hr>
  <p class="mb-0">A bientôt !</p>
</div>
<?php
                }
                else {
                  echo "Erreur de saisie!";}

            mysqli_close($conn); ?>

</body>
