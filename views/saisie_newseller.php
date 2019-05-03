<?php

function add_profil_pic()
{
    echo "<br>fun add profil";
    // Create connection

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    extract($_POST);
    if (isset($_FILES['path_profil'])) {
        $UploadedFileName = $_FILES["path_profil"]["name"];
    }


    if ($UploadedFileName != '') {
        $upload_directory = "../img/"; //This is the folder which img will be stored from src
        $upload_directoryF = "img/"; //This is the folder which img is stored

        $filename=$_POST['nom'].$_POST['prenom'];
        if (file_exists($filename)) {
            if ($filename != "res/user-img.jpg") {
                unlink($filename);
            }
        }
        $TargetPath = time().$_POST['nom'].$_POST['prenom'].".jpg";
        echo $upload_directory.$TargetPath;
        $temp_file = $_FILES['path_profil']['tmp_name'];
        $max_size = 4000000;
        $size = filesize($temp_file);
        echo "size : " . $size . " ";
        if ($size < $max_size) {
            if (move_uploaded_file($_FILES['path_profil']['tmp_name'], $upload_directory.$TargetPath)) {
                $query="SELECT id_demvendeur FROM demandevendeur WHERE name='" . $_POST["nom"] . "' AND firstname ='" . $_POST["prenom"] . "' AND mail ='" . $_POST["mail"] . "'AND password ='" . $_POST["password"] . "';";
                echo $query;
                $result = mysqli_query($conn, $query); // send the query
                $row = mysqli_fetch_assoc($result);
                //echo "ATTTTTENNNNTION:".$row['id_music'];

                // make the request to the DATABASE
                $sql = "UPDATE demandevendeur SET photoProfil = '" . $upload_directoryF.$TargetPath . "' WHERE id_demvendeur='" .$row["id_demvendeur"] . "' ";

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
function add_bg_pic()
{
    echo "<br>fun add bg";
    // Create connection

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    extract($_POST);
    if (isset($_FILES['path_bg'])) {
        $UploadedFileName = $_FILES["path_bg"]["name"];
    }


    if ($UploadedFileName != '') {
        $upload_directory = "../img/"; //This is the folder which img will be stored from src
        $upload_directoryF = "img/"; //This is the folder which img is stored

        $filename=$_POST['nom'].$_POST['prenom'];
        if (file_exists($filename)) {
            if ($filename != "res/user-img.jpg") {
                unlink($filename);
            }
        }
        $TargetPath = time()."bg".$_POST['nom'].$_POST['prenom'].".jpg";
        echo $upload_directory.$TargetPath;
        $temp_file = $_FILES['path_bg']['tmp_name'];
        $max_size = 4000000;
        $size = filesize($temp_file);
        echo "size : " . $size . " ";
        if ($size < $max_size) {
            if (move_uploaded_file($_FILES['path_bg']['tmp_name'], $upload_directory.$TargetPath)) {
                $query="SELECT id_demvendeur FROM demandevendeur WHERE name='" . $_POST["nom"] . "' AND firstname ='" . $_POST["prenom"] . "' AND mail ='" . $_POST["mail"] . "'AND password ='" . $_POST["password"] . "';";
                echo $query;
                $result = mysqli_query($conn, $query); // send the query
                $row = mysqli_fetch_assoc($result);
                //echo "ATTTTTENNNNTION:".$row['id_music'];

                // make the request to the DATABASE
                $sql = "UPDATE demandevendeur SET photoBg = '" . $upload_directoryF.$TargetPath . "' WHERE id_demvendeur='" .$row["id_demvendeur"] . "' ";

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

    //si le BDD existe, faire le traitement

    $name = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";
    $mail = isset($_POST["mail"])? $_POST["mail"] : "";
    $photo = isset($_POST["photo"])? $_POST["photo"] : "";
    $image = isset($_POST["image"])? $_POST["image"] : "";

require_once("../config/db.php");
$url="";
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       } elseif ($conn) {
           $query="SELECT mail FROM buyer WHERE mail =  '".$mail."';";
           $query1 ="SELECT mail FROM admin WHERE mail =  '".$mail."';";
           $query2 ="SELECT mail FROM seller WHERE mail =  '".$mail."';";

           $result1  = mysqli_query($conn, $query);
           $result2= mysqli_query($conn, $query1);
           $result3= mysqli_query($conn, $query2);
           $a =mysqli_num_rows($result1);
           $b =mysqli_num_rows($result2);
           $c =mysqli_num_rows($result3);
           if ($a>0 or $b>0 or $c>0) {
               $url="Location:/amazonece/inscription.php?sign=false";
           } else {
               if ($name!="" && $prenom!="" && $mail!=""&& $password!="") {
                   $sql = "INSERT INTO demandevendeur (mail, name, firstname, password, type)
                   VALUES('".$mail."', '".$name."', '".$prenom."', '".$password."','seller');";
                   //$result = mysqli_query($conn, $sql);
                   if (mysqli_query($conn, $sql)) {
                       echo "New record created successfully UPDATE";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($sql);
                   }
                   $url="Location:/amazonece";
                   /*if ($result) {
                     echo "New record created successfully UPDATE";
                   } else {
                     echo "Error: " . $sql . "<br>" . mysqli_error($sql);
                   }*/
               //header('Location : ../index.php');
               } else {
                  $url="Location:/amazonece/inscription.php?sign=false";
               }
           }
       }
      mysqli_close($conn);
      add_profil_pic();
      add_bg_pic();
      header($url);
