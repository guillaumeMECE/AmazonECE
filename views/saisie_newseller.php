<?php
    //si le BDD existe, faire le traitement

    $name = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";
    $mail = isset($_POST["mail"])? $_POST["mail"] : "";
    $photo= isset($_POST["image"])? $_POST["image"]: "";
    $image = isset($_POST["photo"])? $_POST["photo"] : "";

require_once("../config/db.php");
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }


       else if($conn){
    if ($nom!="" && $prenom!="" && $mail!=""&& $password!="")
    {
    $sql = "INSERT INTO demandevendeur (mail, name, firstname, password, picture, bgpic, type)
    VALUES('".$mail."', '".$name."', '".$prenom."', '".$password."','".$photo."' ,'".$image."','"seller"');";
    $result = mysqli_query($conn, $sql);
    header('Location : ../index.php');
    ?>
    <div class="alert alert-success" role="alert">
  Votre demande d'inscription a bien été prise en compte!
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
  require "newseller.php";

}
}
      mysqli_close($conn);


?>
