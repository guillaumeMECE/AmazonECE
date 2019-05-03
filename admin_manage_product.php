<!DOCTYPE html>
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
   <body>
      <?php session_start();
      require_once("config/db.php");

      include("views/navbar.php");
      // Create connection
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $sql_pic="SELECT photoBg FROM admin WHERE id_admin = '".$_SESSION['id']."';";
      $result_pic = mysqli_query($conn, $sql_pic); // send the query
      $row_pic=mysqli_fetch_assoc($result_pic);
      $photoBg=$row_pic['photoBg'];
      ?>
      <!--FLOAT BTN ADD PRODUCT-->
      <div class="floatBtnAdd  shadow-lg">
         <a href="admin_add_product.php" class="add-icon">
               <i class="material-icons md-36" style="margin-top: 11px;">add</i>
         </a>
      </div>

      <div class="container m-5" style="background-image:url(<?php echo $row_pic['photoBg'] ?>)" >
         <h2>Produits en Vente</h2>
      <?php


      // make the request to the DATABASE
      $sql = "SELECT *
        FROM music";

      $result = mysqli_query($conn, $sql); // send the query
      if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
         $cpt=0;
          while ($row = mysqli_fetch_assoc($result)) {
              if ($cpt==0) {
                  echo "<div class=\"row\">";
              }
              echo "<div class=\"col-3 my-2\">
            <div class=\"card\" style=\"width: 17rem;\">
               <img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\">
               <div class=\"card-body\">
               <form action=\"src/admin_add_delete.php\" method=\"post\">
               <input type=\"hidden\" name=\"id\" value=\"".$row["id_music"]."\">
               <input type=\"hidden\" name=\"cat\" value=\"music\">
                  <div class=\"form-group\">
                     <label>Nom</label>
                     <input class=\"form-control form-control-sm\" type=\"text\" name=\"nom\" placeholder=\"Nom\" value=\"".$row["nom"]."\" disabled>
                  </div>
                  <div class=\"form-group\">
                     <label>Description</label>
                     <textarea class=\"form-control\" name=\"description\" id=\"exampleFormControlTextarea1\" rows=\"3\" disabled>".$row["description"]."</textarea>
                  </div>
                  <div class=\"form-group\">
                     <label>Prix</label>
                     <input class=\"form-control form-control-sm\" name=\"prix\" type=\"text\" placeholder=\"Prix\" value=\"".$row["prix"]."\" disabled>
                  </div>
                  <div class=\"form-group\">
                     <label>Nombre d'unité</label>
                     <input class=\"form-control form-control-sm\" name=\"quantite\" type=\"text\" placeholder=\"Nombre d'unité\" value=\"".$row["nombre"]."\" disabled>
                  </div>
                     <input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"supprimer\">
               </div>
               </form>
            </div>
         </div>";
              $cpt++;
              if ($cpt==4) {
                  echo "</div>";
                  $cpt=0;
              }
          }
          /* if ($cpt!=0) {
               echo "</div>";
        }*/
      }
                  /////////
                  //BOOK///
                  /////////
      // make the request to the DATABASE
      $sql = "SELECT *
        FROM book";

      $result = mysqli_query($conn, $sql); // send the query
      if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
         //$cpt=0;
          while ($row = mysqli_fetch_assoc($result)) {
              if ($cpt==0) {
                  echo "<div class=\"row\">";
              }
              echo "<div class=\"col-3 my-2\">
            <div class=\"card\" style=\"width: 17rem;\">
               <img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["title"]."\">
               <div class=\"card-body\">
               <form action=\"src/admin_add_delete.php\" method=\"post\">
               <input type=\"hidden\" name=\"id\" value=\"".$row["id_book"]."\">
               <input type=\"hidden\" name=\"cat\" value=\"book\">
                  <div class=\"form-group\">
                     <label>Nom</label>
                     <input class=\"form-control form-control-sm\" type=\"text\" name=\"nom\" placeholder=\"Nom\" value=\"".$row["title"]."\" disabled>
                  </div>
                  <div class=\"form-group\">
                     <label>Description</label>
                     <textarea class=\"form-control\" name=\"description\" id=\"exampleFormControlTextarea1\" rows=\"3\" disabled>".$row["description"]."</textarea>
                  </div>
                  <div class=\"form-group\">
                     <label>Prix</label>
                     <input class=\"form-control form-control-sm\" name=\"prix\" type=\"text\" placeholder=\"Prix\" value=\"".$row["prix"]."\" disabled>
                  </div>
                  <div class=\"form-group\">
                     <label>Nombre d'unité</label>
                     <input class=\"form-control form-control-sm\" name=\"quantite\" type=\"text\" placeholder=\"Nombre d'unité\" value=\"".$row["nombre"]."\" disabled>
                  </div>
                     <input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"supprimer\">
               </div>
               </form>
            </div>
         </div>";
              $cpt++;
              if ($cpt==4) {
                  echo "</div>";
                  $cpt=0;
              }
          }
          /* if ($cpt!=0) {
               echo "</div>";
        }*/
      }


               //////////
               //CLOTH///
               //////////
      // make the request to the DATABASE
      $sql = "SELECT *
        FROM vetements;";

      $result = mysqli_query($conn, $sql); // send the query
      if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
         //$cpt=0;
          while ($row = mysqli_fetch_assoc($result)) {
              if ($cpt==0) {
                  echo "<div class=\"row\">";
              }
              echo "<div class=\"col-3 my-2\">
            <div class=\"card\" style=\"width: 17rem;\">
               <img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\">
               <div class=\"card-body\">
               <form action=\"src/admin_add_delete.php\" method=\"post\">
               <input type=\"hidden\" name=\"id\" value=\"".$row["id_vetement"]."\">
               <input type=\"hidden\" name=\"cat\" value=\"cloth\">
                  <div class=\"form-group\">
                     <label>Nom</label>
                     <input class=\"form-control form-control-sm\" type=\"text\" name=\"nom\" placeholder=\"Nom\" value=\"".$row["nom"]."\" disabled>
                  </div>
                  <div class=\"form-group\">
                     <label>Description</label>
                     <textarea class=\"form-control\" name=\"description\" id=\"exampleFormControlTextarea1\" rows=\"3\" disabled>".$row["description"]."</textarea>
                  </div>
                  <div class=\"form-group\">
                     <label>Prix</label>
                     <input class=\"form-control form-control-sm\" name=\"prix\" type=\"text\" placeholder=\"Prix\" value=\"".$row["prix"]."\" disabled>
                  </div>
                  <div class=\"form-group\">
                     <label>Nombre d'unité</label>
                     <input class=\"form-control form-control-sm\" name=\"quantite\" type=\"text\" placeholder=\"Nombre d'unité\" value=\"".$row["nombre"]."\" disabled>
                  </div>
                     <input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"supprimer\">
               </div>
               </form>
            </div>
         </div>";
              $cpt++;
              if ($cpt==4) {
                  echo "</div>";
                  $cpt=0;
              }
          }
          /* if ($cpt!=0) {
               echo "</div>";
        }*/
      }

                  //////////
                  //SPORTS//
                  //////////
      // make the request to the DATABASE
      $sql = "SELECT *
        FROM sportsloisirs;";

      $result = mysqli_query($conn, $sql); // send the query
      if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
         //$cpt=0;
          while ($row = mysqli_fetch_assoc($result)) {
              if ($cpt==0) {
                  echo "<div class=\"row\">";
              }
              echo "<div class=\"col-3 my-2\">
            <div class=\"card\" style=\"width: 17rem;\">
               <img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\">
               <div class=\"card-body\">
               <form action=\"src/admin_add_delete.php\" method=\"post\">
               <input type=\"hidden\" name=\"id\" value=\"".$row["id_sl"]."\">
               <input type=\"hidden\" name=\"cat\" value=\"sports\">
                  <div class=\"form-group\">
                     <label>Nom</label>
                     <input class=\"form-control form-control-sm\" type=\"text\" name=\"nom\" placeholder=\"Nom\" value=\"".$row["nom"]."\" disabled>
                  </div>
                  <div class=\"form-group\">
                     <label>Description</label>
                     <textarea class=\"form-control\" name=\"description\" id=\"exampleFormControlTextarea1\" rows=\"3\" disabled>".$row["description"]."</textarea>
                  </div>
                  <div class=\"form-group\">
                     <label>Prix</label>
                     <input class=\"form-control form-control-sm\" name=\"prix\" type=\"text\" placeholder=\"Prix\" value=\"".$row["prix"]."\" disabled>
                  </div>
                  <div class=\"form-group\">
                     <label>Nombre d'unité</label>
                     <input class=\"form-control form-control-sm\" name=\"quantite\" type=\"text\" placeholder=\"Nombre d'unité\" value=\"".$row["nombre"]."\" disabled>
                  </div>
                     <input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"supprimer\">
               </div>
               </form>
            </div>
         </div>";
              $cpt++;
              if ($cpt==4) {
                  echo "</div>";
                  $cpt=0;
              }
          }
          /* if ($cpt!=0) {
               echo "</div>";
        }*/
      }
       ?>
      </div>
      </div>




      <script type="text/javascript">
         var element = document.getElementById("nav-home");
         element.classList.remove("active");
         element = document.getElementById("nav-panier");
         element.classList.add("active");
         element = document.getElementById("nav-compte");
         element.classList.remove("active");
      </script>

      <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>
