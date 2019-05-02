<?php
 session_start();
require_once("../config/db.php");
  function add_pic()
{
    // Create connection

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    extract($_POST);
    if (isset($_FILES['path'])) {
        $UploadedFileName = $_FILES["path"]["name"];
    }


    if ($UploadedFileName != '') {
        $upload_directory = "../img/"; //This is the folder which img will be stored from src
        $upload_directoryF = "img/"; //This is the folder which img is stored

        $filename=$_POST['nom'];
        if (file_exists($filename)) {
            if ($filename != "res/user-img.jpg") {
                unlink($filename);
            }
        }
        $TargetPath = time().$_POST['nom'].".jpg";
        echo $upload_directory.$TargetPath;
        $temp_file = $_FILES['path']['tmp_name'];
        $max_size = 4000000;
        $size = filesize($temp_file);
        echo "size : " . $size . " ";
        if ($size < $max_size) {
            if (move_uploaded_file($_FILES['path']['tmp_name'], $upload_directory.$TargetPath)) {
                switch ($_POST['type']) {
                case 'Musique':
                $query="SELECT id_music FROM music WHERE id_seller='" . $_POST["id"] . "' AND nom ='" . $_POST["nom"] . "' AND description ='" . $_POST["description"] . "'AND nombre ='" . $_POST["quantite"] . "';";
                echo $query;
                $result = mysqli_query($conn, $query); // send the query
               $row = mysqli_fetch_assoc($result);
               //echo "ATTTTTENNNNTION:".$row['id_music'];

                // make the request to the DATABASE
                $sql = "UPDATE music SET photo = '" . $upload_directoryF.$TargetPath . "' WHERE id_music='" .$row["id_music"] . "' ";

                  break;
                case 'Livre':
                $query="SELECT id_book FROM book WHERE id_seller='" . $_POST["id"] . "' AND title ='" . $_POST["nom"] . "' AND description ='" . $_POST["description"] . "'AND nombre ='" . $_POST["quantite"] . "';";
                echo $query;
                $result = mysqli_query($conn, $query); // send the query
               $row = mysqli_fetch_assoc($result);
               //echo "ATTTTTENNNNTION:".$row['id_music'];

                // make the request to the DATABASE
                $sql = "UPDATE book SET photo = '" . $upload_directoryF.$TargetPath . "' WHERE id_book='" .$row["id_book"] . "' ";

                  break;
                 case 'Vetement':
                 $query="SELECT id_vetement FROM vetements WHERE id_seller='" . $_POST["id"] . "' AND nom ='" . $_POST["nom"] . "' AND description ='" . $_POST["description"] . "'AND nombre ='" . $_POST["quantite"] . "';";
                 echo $query;
                 $result = mysqli_query($conn, $query); // send the query
                $row = mysqli_fetch_assoc($result);
                //echo "ATTTTTENNNNTION:".$row['id_music'];

                 // make the request to the DATABASE
                 $sql = "UPDATE vetements SET photo = '" . $upload_directoryF.$TargetPath . "' WHERE id_vetement='" .$row["id_vetement"] . "' ";

                    break;
                case 'Sports & Loisirs':
                $query="SELECT id_sl FROM sportsloisirs WHERE id_seller='" . $_POST["id"] . "' AND nom ='" . $_POST["nom"] . "' AND description ='" . $_POST["description"] . "'AND nombre ='" . $_POST["quantite"] . "';";
                echo $query;
                $result = mysqli_query($conn, $query); // send the query
               $row = mysqli_fetch_assoc($result);
               //echo "ATTTTTENNNNTION:".$row['id_music'];

                // make the request to the DATABASE
                $sql = "UPDATE sportsloisirs SET photo = '" . $upload_directoryF.$TargetPath . "' WHERE id_sl='" .$row["id_sl"] . "' ";

                   break;
             }

                if ($conn->query($sql) === true) {
                    $_POST['submit'] = null;
                //header("Refresh:0");
                } else {
                    echo "Error updating path: ".$conn->error;
                }
            } else {
                echo "Error move upload";
            }
        } else {
            echo "Error move upload : Your picture is too Big";
        }

        $conn->close();
    }
}
function create_product()
{

   // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    switch ($_POST['type']) {
     case 'Musique':
     // make the request to the DATABASE
   $sql = "INSERT INTO music(nom, auteur, datesortie, taille,description, prix, genre, nombre, id_seller) VALUES ('" . $_POST["nom"] . "','" . $_POST["auteur"] . "','" . $_POST["date"] . "','" . $_POST["tours"] . "','" . $_POST["description"] . "','" . $_POST["prix"] . "','" . $_POST["genre"] . "','" . $_POST["quantite"] . "','" . $_POST["id"] . "')";
        break;
     case 'Livre':
      $sql = "INSERT INTO book(title, auteur, date,editeur,description, prix, genre, nombre, id_seller) VALUES ('" . $_POST["nom"] . "','" . $_POST["auteur"] . "','" . $_POST["date"] . "','" . $_POST["editeur"] . "','" . $_POST["description"] . "','" . $_POST["prix"] . "','" . $_POST["genre"] . "','" . $_POST["quantite"] . "','" . $_POST["id"] . "')";
       break;
      case 'Vetement':
      $sql = "INSERT INTO vetements(nom,couleur,sexe,marque, taille,description, prix, genre, nombre, id_seller) VALUES ('" . $_POST["nom"] . "','" . $_POST["couleur"] . "','" . $_POST["sexe"] . "','" . $_POST["marque"] . "','" . $_POST["taille"] . "','" . $_POST["description"] . "','" . $_POST["prix"] . "','" . $_POST["genre"] . "','" . $_POST["quantite"] . "','" . $_POST["id"] . "')";
         break;
     case 'Sports & Loisirs':
      $sql = "INSERT INTO sportsloisirs(nom,marque,description, prix, genre, nombre, id_seller) VALUES ('" . $_POST["nom"] . "','" . $_POST["marque"] . "','" . $_POST["description"] . "','" . $_POST["prix"] . "','" . $_POST["genre"] . "','" . $_POST["quantite"] . "','" . $_POST["id"] . "')";
        break;
  }
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully UPDATE";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
if (isset($_POST['submit'])) {
    create_product();
    add_pic();
    header("location:/amazonece/");
} ?>
