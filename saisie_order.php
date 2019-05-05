<?php session_start();
require_once("config/db.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
         } elseif ($conn) {
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

             if (($numero_sql == $numero_form) and ($crypto_sql == $crypto_form)) {
                 ?>
                <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Votre commande est passée!</h4>
  <p>Nous vous remercions de votre commande. Vous recevrez très bientôt un mail de confirmation. </p>
  <p>La redirection vers la page d'accueil s'effectuera d'un instant à l'autre...</p>
  <hr></hr>
  <p class="mb-0">A bientôt !</p>
</div>

<?php
//ENVOI DU mail
$sql_mail = "SELECT mail
  FROM buyer
  WHERE id_buyer = '".$_SESSION["id"]."';";

//echo $_SESSION['idcb'];
  $result_mail = mysqli_query($conn, $sql_mail); // send the query
  //$row = mysqli_fetch_assoc($result); // fetch keys with values
  $row_mail = mysqli_fetch_assoc($result_mail);
echo  $row_mail['mail'];
if (mysqli_num_rows($result_mail) > 0) {

   $mail = $row_mail['mail']; // Déclaration de l'adresse de destination.
   if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
   {
   	$passage_ligne = "\r\n";
   }
   else
   {
   	$passage_ligne = "\n";
   }
   //=====Déclaration des messages au format texte et au format HTML.
   $message_txt = "Votre Commande à bien été prise en compte";
   //==========

   //=====Lecture et mise en forme de la pièce jointe.
   /*$fichier   = fopen("image.jpg", "r");
   $attachement = fread($fichier, filesize("image.jpg"));
   $attachement = chunk_split(base64_encode($attachement));
   fclose($fichier);*/
   //==========

   //=====Création de la boundary.
   $boundary = "-----=".md5(rand());
   $boundary_alt = "-----=".md5(rand());
   //==========

   //=====Définition du sujet.
   $sujet = "AMAZONECE-COMMANDE";
   //=========

   //=====Création du header de l'e-mail.
   $header = "From: \"AmazonECE\"<amazon@ece.com>".$passage_ligne;
   $header.= "Reply-to: \"AmazonECE\" <amazon@ece.com>".$passage_ligne;
   $header.= "MIME-Version: 1.0".$passage_ligne;
   $header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
   //==========

   //=====Création du message.
   $message = $passage_ligne."--".$boundary.$passage_ligne;
   /*$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
   $message.= $passage_ligne."--".$boundary_alt.$passage_ligne;*/
   //=====Ajout du message au format texte.
   $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
   $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
   $message.= $passage_ligne.$message_txt.$passage_ligne;
   //==========

   //$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;

   //=====Ajout du message au format HTML.
   /*$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
   $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
   $message.= $passage_ligne.$message_html.$passage_ligne;*/
   //==========

   //=====On ferme la boundary alternative.
   /*$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;*/
   //==========



   //$message.= $passage_ligne."--".$boundary.$passage_ligne;

   //=====Ajout de la pièce jointe.
   /*$message.= "Content-Type: image/jpeg; name=\"image.jpg\"".$passage_ligne;
   $message.= "Content-Transfer-Encoding: base64".$passage_ligne;
   $message.= "Content-Disposition: attachment; filename=\"image.jpg\"".$passage_ligne;
   $message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
   $message.= $passage_ligne."--".$boundary."--".$passage_ligne; */
   //==========
   //=====Envoi de l'e-mail.
   $message=utf8_decode($message);
   if(mail($mail,$sujet,$message,$header)){
      echo "<br> MAIL ENVOYE <br>";
      echo $mail."<br>";
      echo $sujet."<br>";
      echo $message."<br>";
      echo $header."<br>";
   }else{
      echo "<br> ERROR MAIL <br>";
   }

   //==========
}






// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 } elseif ($conn) {
                     // make the request to the DATABASE
                     $sql1 = "SELECT *
                     FROM cart
                     WHERE user_id = '".$_SESSION["id"]."';";

                     //echo $_SESSION['id'];
      $result = mysqli_query($conn, $sql1); // send the query



while ($row = mysqli_fetch_assoc($result)) {
    //while (mysqli_num_rows($result) > 0)
    switch ($row['type']) {
      case 'music':
      // on met à jour le nombre de musique dans la BDD
      $sql2 = "UPDATE music
               SET nombre = nombre - '".$row["nombre_cart"]."'
               WHERE id_music = '".$row["id_produit"]."';";
      //on incrémente le nombre de vente du produit dans la bdd
      $sql4 = "UPDATE music
               SET nbvente = nbvente + '".$row["nombre_cart"]."'
               WHERE id_music = '".$row["id_produit"]."';";
      // on supprime l'élement dans le panier
      $sql3 = "DELETE
               FROM cart
               WHERE id_cart = '".$row["id_cart"]."';";

      break;

      case 'book':

      // on met à jour le nombre de livres dans la BDD
      $sql2 = "UPDATE book
               SET nombre = nombre - '".$row["nombre_cart"]."'
               WHERE id_book = '".$row["id_produit"]."';";
     //on incrémente le nombre de vente du produit dans la bdd
     $sql4 = "UPDATE book
              SET nbvente = nbvente + '".$row["nombre_cart"]."'
              WHERE id_book = '".$row["id_produit"]."';";
      // on supprime l'élement dans le panier
      $sql3 = "DELETE
               FROM cart
               WHERE id_cart = '".$row["id_cart"]."';";

      break;

      case 'cloth':

      // on met à jour le nombre de vetements dans la BDD
      $sql2 = "UPDATE vetements
               SET nombre = nombre - '".$row["nombre_cart"]."'
               WHERE id_vetement = '".$row["id_produit"]."';";

      //on incrémente le nombre de vente du produit dans la bdd
     $sql4 = "UPDATE vetements
              SET nbvente = nbvente + '".$row["nombre_cart"]."'
              WHERE id_vetement = '".$row["id_produit"]."';";

      // on supprime l'élement dans le panier
      $sql3 = "DELETE
               FROM cart
               WHERE id_cart = '".$row["id_cart"]."';";

      break;

      case 'sports':

      // on met à jour le nombre de sportsloisirs dans la BDD
      $sql2 = "UPDATE sportsloisirs
               SET nombre = nombre - '".$row["nombre_cart"]."'
               WHERE id_sl = '".$row["id_produit"]."';";

     //on incrémente le nombre de vente du produit dans la bdd
     $sql4 = "UPDATE sportsloisirs
              SET nbvente = nbvente + '".$row["nombre_cart"]."'
              WHERE id_sl = '".$row["id_produit"]."';";

      // on supprime l'élement dans le panier
      $sql3 = "DELETE
               FROM cart
               WHERE id_cart = '".$row["id_cart"]."';";

      break;

    }

    $result1=mysqli_query($conn, $sql2); // send the query
    $result2=mysqli_query($conn, $sql3);
    $result4 =mysqli_query($conn, $sql4);
}
                 }
             }else{
                ?>
                <div class="alert alert-alert" role="alert">
            <h4 class="alert-heading">Vos informations personnelle sont erronée!</h4>
            <hr></hr>
          </div>
                <?php
                header("Refresh: 3; /amazonece/panier.php");
             }
         }

      mysqli_close($conn);
header('Refresh: 4; /amazonece/');
                ?>

                   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
