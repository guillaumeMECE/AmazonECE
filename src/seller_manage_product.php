<?php
function traitement_data()
{
    // include the configs / constants for the database connection
    require_once("../config/db.php");
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if ($_POST["action"]=="modifier") {
        // make the request to the DATABASE
        switch ($_POST["cat"]) {
           case 'music':
           $sql ="UPDATE music SET `nom`='" . $_POST['nom'] . "',`description`='" . $_POST['description'] . "',`prix`='" . $_POST['prix'] . "',`nombre`='" . $_POST['quantite'] . "'
             WHERE id_music = '" . $_POST['id'] . "'
             AND id_seller = '" . $_SESSION['id'] . "';";
              break;

           case 'book':
           $sql ="UPDATE book SET `title`='" . $_POST['nom'] . "',`description`='" . $_POST['description'] . "',`prix`='" . $_POST['prix'] . "',`nombre`='" . $_POST['quantite'] . "'
             WHERE id_book = '" . $_POST['id'] . "'
             AND id_seller = '" . $_SESSION['id'] . "';";
              break;

           case 'cloth':
           $sql ="UPDATE vetements SET `nom`='" . $_POST['nom'] . "',`description`='" . $_POST['description'] . "',`prix`='" . $_POST['prix'] . "',`nombre`='" . $_POST['quantite'] . "'
             WHERE id_vetement = '" . $_POST['id'] . "'
             AND id_seller = '" . $_SESSION['id'] . "';";
              break;

           case 'sports':
           $sql ="UPDATE sportsloisirs SET `nom`='" . $_POST['nom'] . "',`description`='" . $_POST['description'] . "',`prix`='" . $_POST['prix'] . "',`nombre`='" . $_POST['quantite'] . "'
             WHERE id_sl = '" . $_POST['id'] . "'
             AND id_seller = '" . $_SESSION['id'] . "';";
              break;
        }


        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully UPDATE";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } elseif ($_POST["action"]=="supprimer") {
        switch ($_POST["cat"]) {
         case 'book':
         $sql ="DELETE FROM book
       WHERE id_book = '" . $_POST["id"] . "'
       AND id_seller = '" . $_SESSION["id"] . "';";
       $sql2 ="DELETE FROM cart
       WHERE id_produit = '" . $_POST["id"] . "'
       AND type = 'book';";
            break;

         case 'music':
         $sql ="DELETE FROM music
       WHERE id_music = '" . $_POST["id"] . "'
       AND id_seller = '" . $_SESSION["id"] . "';";
       $sql2 ="DELETE FROM cart
       WHERE id_produit = '" . $_POST["id"] . "'
       AND type = 'music';";
            break;

         case 'cloth':
         $sql ="DELETE FROM vetements
       WHERE id_vetement = '" . $_POST["id"] . "'
       AND id_seller = '" . $_SESSION["id"] . "';";
       $sql2 ="DELETE FROM cart
       WHERE id_produit = '" . $_POST["id"] . "'
       AND type = 'cloth';";
            break;

         case 'sports':
            $sql ="DELETE FROM sportsloisirs
             WHERE id_sl = '" . $_POST["id"] . "'
             AND id_seller = '" . $_SESSION["id"] . "';";
             $sql2 ="DELETE FROM cart
             WHERE id_produit = '" . $_POST["id"] . "'
             AND type = 'sports';";
            break;

      }

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully UPDATE";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        if (mysqli_query($conn, $sql2)) {
           echo "New record created successfully UPDATE";
      } else {
           echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
      }
    }
    mysqli_close($conn);
    header("location:/amazonece/index.php");
}

if (isset($_POST['action'])) {
    session_start();
    traitement_data();
}
