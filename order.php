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
            $num = $row['numero'];
            $date = $row['datefin'];
            $crypto = $row['crypto'];
            $type = $row['type'];


          }

      mysqli_close($conn);
         ?>


   <div class="container m-5 p-5 shadow " id="Récap commande">
     <h2> Passer commande : </h2>

<form class="form-inline" method = "post" action = "saisie_order.php">
  <div class="form-group">
    <label for="nomcarte">Nom du titulaire de la carte : </label>
    <input type="text" class="form-control" name="nomcarte" value="<?php echo $nomcarte;?>"readonly>
  </div>

  <div class="form-group mx-sm-3 mb-2" >
    <label for="numero" class="sr-only">Numéro carte</label>
    <input type="password" class="form-control" name = "numero" id="numero" placeholder="Numéro carte">
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <label for="crypto" class="sr-only">Cryptogramme</label>
    <input type="password" class="form-control" name = "crypto" id="crypto" placeholder="Cryptogramme">
  </div>

  <button type="submit" name="valider" class="btn btn-primary mb-2">Valider</button>
</form>
</div>


<script type="text/javascript">
   var element = document.getElementById("nav-home");
   element.classList.remove("active");
   element = document.getElementById("nav-panier");
   element.classList.remove("active");
   element = document.getElementById("nav-compte");
   element.classList.add("active");
</script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
