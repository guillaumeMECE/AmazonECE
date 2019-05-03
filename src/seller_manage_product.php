<?php

function add_new_pic()
{
    echo "<br> FUN 1";
    $name_photo="";
    // Create connection
    $conn_data = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (!$conn_data) {
        die("Connection failed: " . mysqli_connect_error());
    }
    switch ($_POST["cat"]) {
      case 'cloth':
         $sql_data ="SELECT photo,nbPhoto FROM vetements
         WHERE id_vetement = '" . $_POST['id'] . "'
         AND id_seller = '" . $_SESSION['id'] . "' ;";
         break;
      case 'music':
         $sql_data ="SELECT photo,nbPhoto FROM music
         WHERE id_music = '" . $_POST['id'] . "'
         AND id_seller = '" . $_SESSION['id'] . "' ;";
         break;
      case 'book':
         $sql_data ="SELECT photo,nbPhoto FROM book
         WHERE id_book = '" . $_POST['id'] . "'
         AND id_seller = '" . $_SESSION['id'] . "' ;";
         break;
      case 'sports':
         $sql_data ="SELECT photo,nbPhoto FROM sportsloisirs
         WHERE id_sl = '" . $_POST['id'] . "'
         AND id_seller = '" . $_SESSION['id'] . "' ;";
         break;
      default:
         // code...
         break;
   }

    $result_data=mysqli_query($conn_data, $sql_data);
    $row_data=mysqli_fetch_assoc($result_data);
    $name_photo = $row_data['photo'];
    $nb_photo = $row_data['nbPhoto'];

    mysqli_close($conn_data);
    add_pic($name_photo, $nb_photo);
}

function add_pic($name_photo="", $nb_photo="")
{
   echo $name_photo;
   $name_photo = substr($name_photo, 0, -4);
   echo "<br>".$name_photo."<br>";
    echo "<br> FUN 2";
    // Create connection

    $conn_pic = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection

    if ($conn_pic->connect_error) {
        die("Connection failed: " . $conn_pic->connect_error);
    }

    extract($_POST);
    if (isset($_FILES['path'])) {
        $UploadedFileName = $_FILES["path"]["name"];
    }


    if ($UploadedFileName != '') {
        $upload_directory = "../img/"; //This is the folder which img will be stored from src
      $upload_directoryF = "img/"; //This is the folder which img is stored

      //$filename=$_POST['nom'].$_POST['prenom'];
        $filename=$name_photo.$nb_photo;
        if (file_exists($filename)) {
            if ($filename != "res/user-img.jpg") {
                unlink($filename);
            }
        }
        // $TargetPath = time().$_POST['nom'].$_POST['prenom'].".jpg";
        $TargetPath = $name_photo.$nb_photo.".jpg";
        echo $upload_directory.$TargetPath;
        $temp_file = $_FILES['path']['tmp_name'];
        $max_size = 4000000;
        $size = filesize($temp_file);
        echo "size : " . $size . " ";
        if ($size < $max_size) {
            if (move_uploaded_file($_FILES['path']['tmp_name'], "../".$TargetPath)) {
                switch ($_POST["cat"]) {
                  case 'cloth':
                   $sql = "UPDATE vetements SET nbPhoto = nbPhoto+'1'
                   WHERE id_vetement = '" . $_POST['id'] . "'
                   AND id_seller = '" . $_SESSION['id'] . "';";
                     break;
                  case 'book':
                  $sql = "UPDATE book SET nbPhoto = nbPhoto+'1'
                  WHERE id_book = '" . $_POST['id'] . "'
                  AND id_seller = '" . $_SESSION['id'] . "';";
                     break;
                  case 'music':
                   $sql = "UPDATE music SET nbPhoto = nbPhoto+'1'
                   WHERE id_music = '" . $_POST['id'] . "'
                   AND id_seller = '" . $_SESSION['id'] . "';";
                     break;
                  case 'sports':
                   $sql = "UPDATE sportsloisirs SET nbPhoto = nbPhoto+'1'
                   WHERE id_sl = '" . $_POST['id'] . "'
                   AND id_seller = '" . $_SESSION['id'] . "';";
                     break;
                  default:
                     // code...
                     break;
               }
                /* $query="SELECT id_demvendeur FROM demandevendeur WHERE name='" . $_POST["nom"] . "' AND firstname ='" . $_POST["prenom"] . "' AND mail ='" . $_POST["mail"] . "'AND password ='" . $_POST["password"] . "';";
                 echo $query;
                 $result = mysqli_query($conn, $query); // send the query
                 $row = mysqli_fetch_assoc($result);*/
                //echo "ATTTTTENNNNTION:".$row['id_music'];

                // make the request to the DATABASE
                //$sql = "UPDATE demandevendeur SET photoProfil = '" . $upload_directoryF.$TargetPath . "' WHERE id_demvendeur='" .$row["id_demvendeur"] . "' ";

                if ($conn_pic->query($sql) === true) {
                    $_POST['action'] = null;
                //header("Refresh:0");
                } else {
                    echo "Error updating path: ".$conn_pic->error;
                }
            } else {
                echo "Error move upload";
            }
        } else {
            echo "Error move upload : Your picture is too Big";
        }

        $conn_pic->close();
    }
}

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
           $auteur = isset($_POST["auteur"])? $_POST["auteur"] : "null";
            $taille = isset($_POST["tours"])? $_POST["tours"] : "null";
            $date = isset($_POST["date"])? $_POST["date"] : "null";
            $genre = isset($_POST["genre"])? $_POST["genre"] : "null";

           $sql ="UPDATE music SET `nom`='" . $_POST['nom'] . "',`description`='" . $_POST['description'] . "',`prix`='" . $_POST['prix'] . "',
           `nombre`='" . $_POST['quantite'] . "',`taille`='" . $taille . "',`datesortie`='" . $date . "',`auteur`='" . $auteur . "',`genre`='" . $genre . "'
             WHERE id_music = '" . $_POST['id'] . "'
             AND id_seller = '" . $_SESSION['id'] . "';";
             if (isset($_FILES["path"]["name"])) {
                 add_new_pic();
             }
              break;

           case 'book':
           $auteur = isset($_POST["auteur"])? $_POST["auteur"] : "null";
           $editeur = isset($_POST["editeur"])? $_POST["editeur"] : "null";
           $date = isset($_POST["date"])? $_POST["date"] : "null";
           $genre = isset($_POST["genre"])? $_POST["genre"] : "null";
           $sql ="UPDATE book SET `title`='" . $_POST['nom'] . "',`description`='" . $_POST['description'] . "',`prix`='" . $_POST['prix'] . "',`nombre`='" . $_POST['quantite'] . "'
           ,`genre`='" . $genre . "',`date`='" . $date . "',`editeur`='" . $editeur . "',`auteur`='" . $auteur . "'
             WHERE id_book = '" . $_POST['id'] . "'
             AND id_seller = '" . $_SESSION['id'] . "';";
             if (isset($_FILES["path"]["name"])) {
                 add_new_pic();
             }
              break;

           case 'cloth':
           $sexe = isset($_POST["sexe"])? $_POST["sexe"] : "null";
          $couleur = isset($_POST["couleur"])? $_POST["couleur"] : "null";
          $taille = isset($_POST["taille"])? $_POST["taille"] : "null";
          $marque = isset($_POST["marque"])? $_POST["marque"] : "null";
           $sql ="UPDATE vetements SET `nom`='" . $_POST['nom'] . "',`description`='" . $_POST['description'] . "',`prix`='" . $_POST['prix'] . "',`nombre`='" . $_POST['quantite'] . "'
           ,`sexe`='" . $sexe . "',`couleur`='" . $couleur . "',`taille`='" . $taille . "',`marque`='" . $marque . "'
             WHERE id_vetement = '" . $_POST['id'] . "'
             AND id_seller = '" . $_SESSION['id'] . "';";


             echo $_FILES["path"]["name"];
             if (isset($_FILES["path"]["name"])) {
                 add_new_pic();
             }
              break;

           case 'sports':
           $genre = isset($_POST["genre"])? $_POST["genre"] : "null";
          $marque = isset($_POST["marque"])? $_POST["marque"] : "null";
           $sql ="UPDATE sportsloisirs SET `nom`='" . $_POST['nom'] . "',`description`='" . $_POST['description'] . "',`prix`='" . $_POST['prix'] . "',`nombre`='" . $_POST['quantite'] . "'
           ,`genre`='" . $genre . "',`marque`='" . $marque . "'
             WHERE id_sl = '" . $_POST['id'] . "'
             AND id_seller = '" . $_SESSION['id'] . "';";
             if (isset($_FILES["path"]["name"])) {
                 add_new_pic();
             }
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
