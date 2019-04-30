
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
       }


       else if($conn){
    if ($name!="" && $mail!="")
    {
    $sql = "INSERT INTO buyer (name,firstname, password, mail, adresse, ville, cp, pays, tel)
    VALUES('".$name."','".$prenom."', '".$password."', '".$mail."', '".$adresse."', '".$ville."', '".$codepostal."','".$pays."','" .$tel."');";
    $result = mysqli_query($conn, $sql);

    $sql1 = "INSERT INTO card (nomcarte, numero, datefin, crypto, type)
    VALUES('".$nomcard."','".$card."', '".$datefin."', '".$crypto."', '".$typecarte."');";
    $result = mysqli_query($conn, $sql1);
    header('Location : ../index.php');
    ?>
    <div class="alert alert-success" role="alert">
  Felicitation vous avez bien été inscrit!
</div>
<?php
}
else
{
  ?>

  <div class="alert alert-danger" role="alert">
    Veuillez remplir tous les champs requis
  </div>
  <?php
  require "newclient.php";

}
}
      mysqli_close($conn);


?>
