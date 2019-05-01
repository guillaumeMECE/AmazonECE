<?php
    //si le BDD existe, faire le traitement

    $name = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";
    $mail = isset($_POST["mail"])? $_POST["mail"] : "";

require_once("../config/db.php");
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }

       else if($conn)
       {
         $query="SELECT mail FROM buyer WHERE mail = '$mail'";
         $query1 ="SELECT mail FROM seller WHERE mail = '$mail'";

         $result1  = mysqli_query($conn, $query);
         $result2= mysqli_query($conn, $query1);
         $a =mysqli_num_rows($result1);
         $b =mysqli_num_rows($result1);
         if ($a>0 && $b>0)
         {
           ?>

           <div class="alert alert-danger" role="alert">
             Ce mail existe déjà!
           </div>
           <?php
           require "newadmin.php";
         }
else{

    if ($name!="" && $prenom!="" && $mail!=""&& $password!="")
    {
    $sql = "INSERT INTO admin (name, firstname, mail, password, type)
    VALUES('".$name."', '".$prenom."', '".$mail."','".$password."','admin');";
    $result = mysqli_query($conn, $sql);
  //  header('Location : ../index.php');
    ?>
    <div class="alert alert-success" role="alert">
  Votre inscription a été effectuée!
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
  require "newadmin.php";

}
}
      mysqli_close($conn);


?>
