<?php

require_once("config/db.php");


       // Create connection

      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      // Check connection

      if (!$conn) {

          die("Connection failed: " . mysqli_connect_error());

      }

if (isset($_POST['Accepter']))
{
  $id = isset($_POST["id_demvendeur"])? $_POST["id_demvendeur"] : "";
  $bgpic = isset($_POST["bgpic"])? $_POST["bgpic"] : "";
  $password = isset($_POST["password"])? $_POST["password"] : "";
  $picture = isset($_POST["picture"])? $_POST["picture"] : "";
  $name = isset($_POST["name"])? $_POST["name"] : "";
  $firstname = isset($_POST["firstname"])? $_POST["firstname"] : "";
  $mail = isset($_POST["mail"])? $_POST["mail"] : "";
  echo "hello";
      $query="SELECT * FROM demandevendeur WHERE id_demvendeur = '$id'";


      $result1= mysqli_query($conn, $query);

      // make the request to the DATABASE
      $sql = "INSERT INTO seller(bgpic, mail, name, firstname, password, picture, type)

      VALUES('".$bgpic."','".$mail."', '".$name."', '".$firstname."', '".$password."', '".$picture."', 'buyer');";
      $result = mysqli_query($conn, $sql);

      $sql1 = "DELETE FROM demandevendeur WHERE id_demvendeur = '$id'";
      $result1 = mysqli_query($conn, $sql1);

}

if (isset($_POST['Supprimervendeur']))
{
  $idsell = isset($_POST["id_seller"])? $_POST["id_seller"] : "";
  $bgpic = isset($_POST["bgpic"])? $_POST["bgpic"] : "";
  $password = isset($_POST["password"])? $_POST["password"] : "";
  $picture = isset($_POST["picture"])? $_POST["picture"] : "";
  $name = isset($_POST["name"])? $_POST["name"] : "";
  $firstname = isset($_POST["firstname"])? $_POST["firstname"] : "";
  $mail = isset($_POST["mail"])? $_POST["mail"] : "";
  echo "hello2";

      $sql2 = "DELETE FROM seller WHERE id_seller = '$idsell';";
      $result2 = mysqli_query($conn, $sql2);
}
if (isset($_POST['Supprimer']))
{
  $id = isset($_POST["id_demvendeur"])? $_POST["id_demvendeur"] : "";
  $bgpic = isset($_POST["bgpic"])? $_POST["bgpic"] : "";
  $password = isset($_POST["password"])? $_POST["password"] : "";
  $picture = isset($_POST["picture"])? $_POST["picture"] : "";
  $name = isset($_POST["name"])? $_POST["name"] : "";
  $firstname = isset($_POST["firstname"])? $_POST["firstname"] : "";
  $mail = isset($_POST["mail"])? $_POST["mail"] : "";
  echo "hello3";


      $sql1 = "DELETE * FROM demandevendeur WHERE id_demvendeur = '$id'";
      $result1 = mysqli_query($conn, $sql1);

}

      //$row = mysqli_fetch_assoc($result); // fetch keys with values


      mysqli_close($conn);
header("location:/amazonece/views/admin_home.php");
       ?>
