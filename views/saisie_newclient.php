
<?php
    //si le BDD existe, faire le traitement

    $name = isset($_POST["name"])? $_POST["name"] : "";
    $prenom = isset($_POST["firstname"])? $_POST["firstname"] : "";
      $password = isset($_POST["password"])? $_POST["password"] : "";

       $mail = isset($_POST["mail"])? $_POST["mail"] : "";

       $adresse= isset($_POST["input_Address1"])? $_POST["input_Address1"]: "";


       $ville = isset($_POST["input_City"])? $_POST["input_City"] : "";
       $codepostal = isset($_POST["input_codepostal"])? $_POST["input_codepostal"] : "";
       $pays = isset($_POST["input_State"])? $_POST["input_State"] : "";
       $tel = isset($_POST["input_tel"])? $_POST["input_tel"] : "";
       $nomcard = isset($_POST["input_nomcb"])? $_POST["input_nomcb"] : "";
       $card = isset($_POST["numero_carte"])? $_POST["numero_carte"] : "";
       $datefin = isset($_POST["input_dateexpiration"])? $_POST["input_dateexpiration"] : "";
       $crypto = isset($_POST["input_codesecurite"])? $_POST["input_codesecurite"] : "";
       $typecarte = isset($_POST["type_carte"])? $_POST["type_carte"] : "";

require_once("../config/db.php");
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       } elseif ($conn) {
           $query="SELECT mail FROM admin WHERE mail = '$mail'";
           $query1 ="SELECT mail FROM seller WHERE mail = '$mail'";
           $query2 ="SELECT mail FROM buyer WHERE mail = '$mail'";

           $result1= mysqli_query($conn, $query);
           $result2= mysqli_query($conn, $query1);
           $result3= mysqli_query($conn, $query2);
           $a =mysqli_num_rows($result1);
           $b =mysqli_num_rows($result2);
           $c =mysqli_num_rows($result3);
           if ($a>0 && $b>0 && $c>0) {
               header('Location : ../inscription.php');
           } else {
               if ($name!="" && $mail!="") {
                   //INSERT CB
                   $sql1 = "INSERT INTO card (nomcarte, numero, datefin, crypto, type)
    VALUES('".$nomcard."','".$card."', '".$datefin."', '".$crypto."', '".$typecarte."');";
                   $result = mysqli_query($conn, $sql1);

                   //RECUP CB ID
                   $sql_cb = "SELECT id_card FROM card
                   WHERE nomcarte ='".$nomcard."'
                   AND numero = '".$card."'
                   AND datefin= '".$datefin."'
                   AND crypto = '".$crypto."'
                   AND type = '".$typecarte."';";
                   $result_cb = mysqli_query($conn, $sql_cb);
                   $row = mysqli_fetch_assoc($result_cb);
                   //INSERT BUYER
                   $sql = "INSERT INTO buyer (name,firstname, password, mail, adresse, ville, cp, pays, tel, type,id_card)
  VALUES('".$name."','".$prenom."', '".$password."', '".$mail."', '".$adresse."', '".$ville."', '".$codepostal."','".$pays."','" .$tel."','buyer','".$row['id_card']."');";
                   $result = mysqli_query($conn, $sql);
               } else {
                   header('Location : ../inscription.php');
               }
           }
       }
      mysqli_close($conn);
header('Location : /amazonece/');
?>
