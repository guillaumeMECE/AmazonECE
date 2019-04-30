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
  // Create connection
 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }

 // make the request to the DATABASE
 $sql = "SELECT *
        FROM buyer
        WHERE id_buyer = '".$_SESSION["id"]."';";

        echo $_SESSION['id'];
        $result = mysqli_query($conn, $sql); // send the query
        //$row = mysqli_fetch_assoc($result); // fetch keys with values
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good

           $nom = $row['name'];
           $prenom = $row['firstname'];
           $mdp = $row['password'];
           $adresse = $row['adresse'];
           $ville = $row['ville'];
           $cp = $row['cp'];
           $pays = $row['pays'];
           $tel = $row['tel'];
           $mail = $row['mail'];

         }
     mysqli_close($conn);
        ?>

  <div class="container ml-3 my-4 shadow " id="Infogéné">
    <h2>Informations générales</h2>
    <form>
      <div class="form-group">
        <label for="mdp">Nom</label>
        <input type="text" class="form-control" id="nom" value="<?php echo $nom;?>">
      </div>

      <div class="form-group">
          <label for="mdp">Prénom</label>
          <input type="text" class="form-control" id="prénom" value="<?php echo $prenom;?>">
      </div>

      <div class="form-group">
          <label for="mdp">Mot de passe</label>
          <input type="password" class="form-control" id="mdp" value="<?php echo $mdp;?>">
      </div>

      <div class="form-group">
        <label for="mdp">Adresse</label>
        <input type="text" class="form-control" id="adresse" value="<?php echo $adresse;?>">
      </div>

      <div class="form-group">
          <label for="mdp">Ville</label>
          <input type="text" class="form-control" id="ville" value="<?php echo $ville;?>">
      </div>

      <div class="form-group">
          <label for="mdp">Code Postale</label>
          <input type="number" class="form-control" id="cp" value="<?php echo $cp;?>">
      </div>

      <div class="form-group">
          <label for="mdp">Pays</label>
          <input type="text" class="form-control" id="pays" value="<?php echo $pays;?>">
      </div>

      <div class="form-group">
          <label for="mdp">Téléphone</label>
          <input type="tel" class="form-control" id="tel" value="<?php echo $tel;?>">
      </div>

      <div class="form-group">
        <label for="mail">Adresse mail</label>
        <input type="mail" class="form-control" id="mail" value="<?php echo $mail;?>">
      </div>


  </form>
</div>


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

      echo $_SESSION['idcb'];
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
<div class="container ml-3 my-4 shadow " id="Infobanque">
  <h2>Informations bancaires</h2>
  <form>

    <div class="form-group">
      <label for="mdp">Nom du titulaire de la carte</label>
      <input type="text" class="form-control" id="nomcarte" value="<?php echo $nomcarte;?>">
    </div>

    <div class="form-group">
      <label for="mdp">Numéro</label>
      <input type="password" class="form-control" id="num" value="<?php echo $num;?>">
    </div>

    <div class="form-group">
      <label for="mdp">Date d'expiration</label>
      <input type="date" class="form-control" id="date" value="<?php echo $date;?>">
    </div>

    <div class="form-group">
      <label for="mdp">Cryptogramme</label>
      <input type="password" class="form-control" id="crypto" value="<?php echo $crypto;?>">
    </div>

    <div class="form-group">
      <label for="mdp">Type</label>
      <input type="text" class="form-control" id="type" value="<?php echo $type;?>">
    </div>

  </form>
</div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
