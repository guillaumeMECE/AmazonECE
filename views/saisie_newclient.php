
<?php
    //si le BDD existe, faire le traitement

    $name = isset($_POST["name"])? $_POST["name"] : "";
      $password = isset($_POST["password"])? $_POST["password"] : "";

       $mail = isset($_POST["mail"])? $_POST["mail"] : "";

       $adresse1= isset($_POST["input_Adress1"])? $_POST["input_Adress1"]: "";
       $adresse2= isset($_POST["input_Adress2"])? $_POST["input_Adress2"] :"";
       $adresse = $adresse1.$adresse2;
       $ville = isset($_POST["input_City"])? $_POST["input_City"] : "";
       $codepostal = isset($_POST["input_codepostal"])? $_POST["input_codepostal"] : "";
       $pays = isset($_POST["input_State"])? $_POST["input_State"] : "";
       $tel = isset($_POST["input_tel"])? $_POST["input_tel"] : "";
       $nomcard = isset($_POST["input_nomcb"])? $_POST["input_nomcb"] : "";
       $card = isset($_POST["numero_carte"])? $_POST["numero_carte"] : "";
       $datefin = isset($_POST["input_dateexpiration"])? $_POST["input_dateexpiration"] : "";
       $crypto = isset($_POST["input_codesecurite"])? $_POST["input_codesecurite"] : "";
       $typecarte = isset($_POST["type_carte"])? $_POST["type_carte"] : "";

        $database = "piscine.sql";    //connectez-vous dans votre BDD  //Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
         $db_handle = mysqli_connect('localhost', 'root', '');
          $db_found = mysqli_select_db($db_handle, $database);


  if ($db_found) {
    if ($name!="" && $mail!="")
    {
    $sql = "INSERT INTO buyer VALUES (name, password, mail, adresse, ville, cp, pays, tel)
    VALUES('".$name."', '".$password."', '".$mail."', '".$adresse."', '".$ville."', '".$codepostal."','".$pays."','" .$tel."')";
    echo ("ok");
     $result = mysqli_query($db_handle, $sql);

echo ($name);
echo ($ville);
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
      else {
      echo ("Database not found");
     }







      mysqli_close($db_handle);


?>
