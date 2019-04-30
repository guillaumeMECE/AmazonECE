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

      <!--a href="#" class="floatBtn previous shadow-lg">
            <i class="material-icons md-36" style="margin-top:15px;">arrow_back_ios</i>
      </a>
      <a href="#" class="floatBtn cart shadow-lg">
            <i class="material-icons md-36" style="margin-top:15px;">add_shopping_cart</i>
      </a-->
         <div class="floatBtnL">
            <a href="<?php echo "/amazonece?cat=".$_GET["cat"]."#".$_GET["cat"]; ?>" class="previous">
                  <i class="material-icons md-36" style="margin-top:12px;">arrow_back_ios</i>
            </a>
         </div>
         <div class="floatBtnR">
            <a href="#" class="cart">
                  <i class="material-icons md-36" style="margin-top:12px;">add_shopping_cart</i>
            </a>
         </div>


      <?php include("views/navbar.php") ?>
      <?php
      if (isset($_GET["cat"]) and isset($_GET["id"])) {
          require_once("config/db.php");
          // Create connection
          $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $isLost=false; //si article introuvable dans BDD
          switch ($_GET["cat"]) {
            case 'music':
            // make the request to the DATABASE
            $sql = "SELECT *
                   FROM music
                   WHERE id_music = '".$_GET["id"]."' ;";
            $result = mysqli_query($conn, $sql); // send the query
            $row = mysqli_fetch_assoc($result);
             if (mysqli_num_rows($result) > 0) {
                 $nom=$row["nom"];
                 $description=$row["description"]. "<br>Artiste : ".$row["auteur"]."<br>Date de Sortie : ".$row["datesortie"]."<br>Tours : ".$row["taille"];
                 $prix=$row["prix"];
                 $nombre=$row["nombre"];
                 $photo=$row["photo"];
                 $genre=$row["genre"];
             } else {
                 $isLost=true;
                 echo "<div class=\"alert alert-danger\" role=\"alert\">
               Article Introuvable
               </div>";
             }
               break;
            case 'sports':
            // make the request to the DATABASE
            $sql = "SELECT *
                   FROM sportsloisirs
                   WHERE id_sl = '".$_GET["id"]."' ;";
            $result = mysqli_query($conn, $sql); // send the query
            $row = mysqli_fetch_assoc($result);
             if (mysqli_num_rows($result) > 0) {
                 $nom=$row["nom"];
                 $description=$row["description"]."<br>Marque : ".$row["marque"];
                 $prix=$row["prix"];
                 $nombre=$row["nombre"];
                 $photo=$row["photo"];
                 $genre=$row["genre"];
             } else {
                 $isLost=true;
                 echo "<div class=\"alert alert-danger\" role=\"alert\">
               Article Introuvable
               </div>";
             }
               break;

            case 'book':
            // make the request to the DATABASE
            $sql = "SELECT *
                   FROM book
                   WHERE id_book = '".$_GET["id"]."' ;";
            $result = mysqli_query($conn, $sql); // send the query
            $row = mysqli_fetch_assoc($result);
             if (mysqli_num_rows($result) > 0) {
                 $nom=$row["title"];
                 $description=$row["description"] . "<br>Auteur : ".$row["auteur"]."<br>Date de Parution : ".$row["date"]."<br>Editeur : ".$row["editeur"];
                 $prix=$row["prix"];
                 $nombre=$row["nombre"];
                 $photo=$row["photo"];
                 $genre=$row["genre"];
             } else {
                 $isLost=true;
                 echo "<div class=\"alert alert-danger\" role=\"alert\">
               Article Introuvable
               </div>";
             }
               break;
            case 'cloth':
            // make the request to the DATABASE
            $sql = "SELECT *
                   FROM vetements
                   WHERE id_vetement = '".$_GET["id"]."' ;";
            $result = mysqli_query($conn, $sql); // send the query
            $row = mysqli_fetch_assoc($result);
             if (mysqli_num_rows($result) > 0) {
                 $nom=$row["nom"];
                 $description=$row["description"] . "<br>Couleur : ".$row["couleur"]."<br>Taille : ".$row["taille"];
                 $prix=$row["prix"];
                 $nombre=$row["nombre"];
                 $photo=$row["photo"];
                 $genre=$row["sexe"];
             } else {
                 $isLost=true;
                 echo "<div class=\"alert alert-danger\" role=\"alert\">
               Article Introuvable
               </div>";
             }
               break;
            default:
               header("location:index.php");
               break;
         }
      } else {
          header("location:index.php");
      }
      ?>
      <div class="container">
         <div class="row my-5">
            <div class="col-4">
               <img src="<?php echo $photo; ?>" alt="<?php echo $nom; ?>">
            </div>
            <div class="col-2">

            </div>
            <div class="col-6">
               <h3><?php echo $nom;  ?></h3>
               <p>Genre : <?php echo $genre;  ?></p>
               <p>Description : <?php echo $description; ?></p>
               <p>Prix : <?php echo $prix; ?> €</p>
               <p><small>Produits restants : <?php echo $nombre; ?></small> </p>
            </div>
         </div>
      </div>

      <?php include("views/best_sell.html"); ?>

      <!--IMPORT BEST SELL-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>
