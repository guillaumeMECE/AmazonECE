<!--DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">

   <title>Amazon ECE</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body-->
<?php // include the configs / constants for the database connection

  require_once("config/db.php");



   ?>
   <div class="container my-5 py-3 shadow" id="best-sell" style="background:#cdebff ">
<div class="container" id="demandevendeur">


         <h3>Demandes Vendeurs</h3>
         <div class="row">

         <?php

         // Create connection

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // Check connection

        if (!$conn) {

            die("Connection failed: " . mysqli_connect_error());

        }



        // make the request to the DATABASE

        $sql = "SELECT *

              FROM demandevendeur;";

        $result = mysqli_query($conn, $sql); // send the query

        //$row = mysqli_fetch_assoc($result); // fetch keys with values

        if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good

           while ($row = mysqli_fetch_assoc($result)) {

             echo "<div class=\"col-3 my-2\">

                  <div class=\"card\" style=\"width: 17rem;\">

                     <img src=\"".$row["photoProfil"]."\" class=\"card-img-top\">

                     <div class=\"card-body\">

                     <form action=\"src/add_seller.php\" method=\"post\">

                     <input type=\"hidden\" name=\"photoBg\" value=\"".$row["photoBg"]."\">
                     <input type=\"hidden\" name=\"password\" value=\"".$row["password"]."\">
                     <input type=\"hidden\" name=\"photoProfil\" value=\"".$row["photoProfil"]."\">
                     <input type=\"hidden\" name=\"id_demvendeur\" value=\"".$row["id_demvendeur"]."\">
                      <input type=\"hidden\" name=\"name\" value=\"".$row["name"]."\">
                        <input type=\"hidden\" name=\"mail\" value=\"".$row["mail"]."\">
                          <input type=\"hidden\" name=\"firstname\" value=\"".$row["firstname"]."\">

                        <div class=\"form-group\">

                           <input class=\"form-control form-control-sm\" type=\"text\" name=\"name\" placeholder=\"Nom\" value=\"".$row["name"]."\" disabled =\"disabled\" >

                        </div>

                        <div class=\"form-group\">

                        <input class=\"form-control form-control-sm\" type=\"text\" name=\"firstname\" placeholder=\"Nom\" value=\"".$row["firstname"]."\" disabled =\"disabled\">

                        </div>

                        <div class=\"form-group\">


                           <input class=\"form-control form-control-sm\" name=\"mail\" type=\"text\" placeholder=\"mail\" value=\"".$row["mail"]."\" disabled =\"disabled\" >

                        </div>


                           <input type=\"submit\" class=\"btn btn-primary\" name=\"Accepter\" value=\"Accepter\">

                           <input type=\"submit\" class=\"btn btn-danger\" name=\"Refuser\" value=\"Refuser\">

                     </div>

                     </form>

                  </div>

               </div>";

           }

        }else {

           echo "<div class=\"alert alert-primary\" role=\"alert\">
  Il n'y a pas de nouvelle demande de vendeur
</div>";

        }
         ?>
       </div>
       </div>
          </div>
        <div class="container my-5 shadow " id="liste_vendeurs">

   <h2>Liste des vendeurs</h2>

   <div class="row">



                 <?php

        $sql = "SELECT *

              FROM seller;";

        $result = mysqli_query($conn, $sql); // send the query

        //$row = mysqli_fetch_assoc($result); // fetch keys with values

        if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good

           while ($row = mysqli_fetch_assoc($result)) {
             echo "<div class=\"col-3 my-2\">

                  <div class=\"card\" style=\"width: 17rem;\">

                     <img src=\"".$row["photoProfil"]."\" class=\"card-img-top\">

                     <div class=\"card-body\">

                     <form action=\"src/add_seller.php\" method=\"post\" >


                     <input type=\"hidden\" name=\"bgpic\" value=\"".$row["photoBg"]."\">
                     <input type=\"hidden\" name=\"password\" value=\"".$row["password"]."\">
                     <input type=\"hidden\" name=\"picture\" value=\"".$row["photoProfil"]."\">
                     <input type=\"hidden\" name=\"mail\" value=\"".$row["mail"]."\">
                     <input type=\"hidden\" name=\"id_seller\" value=\"".$row["id_seller"]."\">
                     <input type=\"hidden\" name=\"firstname\" value=\"".$row["firstname"]."\">
                     <input type=\"hidden\" name=\"name\" value=\"".$row["name"]."\">



                        <div class=\"form-group\">

                           <input class=\"form-control form-control-sm\" type=\"text\" name=\"name\" placeholder=\"nom\" value=\"".$row["name"]."\" disabled =\"disabled\">

                        </div>

                        <div class=\"form-group\">

                        <input class=\"form-control form-control-sm\" type=\"text\" name=\"firstname\" placeholder=\"prenom\" value=\"".$row["firstname"]."\"disabled =\"disabled\" >

                        </div>

                        <div class=\"form-group\">


                           <input class=\"form-control form-control-sm\" name=\"mail\" type=\"text\" placeholder=\"mail\" value=\"".$row["mail"]."\"disabled =\"disabled\">

                        </div>


                           <input type=\"submit\" class=\"btn btn-danger\" name=\"Supprimervendeur\" value=\"Supprimer\">

                     </div>

                     </form>

                  </div>

               </div>";


           }

        }else {

          echo "<div class=\"alert alert-primary\" role=\"alert\">
  Aucun vendeur
  </div>";

        }

        mysqli_close($conn);

         ?>


   </div>


</div>
<!--/body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html-->
