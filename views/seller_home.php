

   <div class="floatBtnAdd shadow-lg">
      <a href="seller_add_product.php" class="add-icon">
            <i class="material-icons md-36" style="margin-top: 11px;">add</i>
      </a>
   </div>
   <?php // include the configs / constants for the database connection
   require_once("config/db.php");
   // Create connection
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   $sql_pic="SELECT photoBg FROM seller WHERE id_seller = '".$_SESSION['id']."';";
   $result_pic = mysqli_query($conn, $sql_pic); // send the query
   $row_pic=mysqli_fetch_assoc($result_pic);
    ?>


<div class="container m-5" style="background-image:url(<?php echo $row_pic['photoBg'] ?>)" >
   <h2>Mes Produits en Ventes</h2>
   <!--div class="row"-->
<?php
$idCarousel=0;

            /////////
            //MUSIC//
            /////////
// make the request to the DATABASE
$sql = "SELECT *
  FROM music
  INNER JOIN seller ON music.id_seller = seller.id_seller
  WHERE music.id_seller = '" . $_SESSION['id'] . "';";

$result = mysqli_query($conn, $sql); // send the query
if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
   $cpt=0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($cpt==0) {
            echo "<div class=\"row\">";
        }

         // <!--img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\"-->
        echo "<div class=\"col-3 my-2\">
      <div class=\"card\" style=\"width: 17rem;\">

         <div id=\"carouselExampleIndicators".$idCarousel."\" class=\"carousel slide\" data-ride=\"carousel\">
            <ol class=\"carousel-indicators\">
               <li data-target=\"#carouselExampleIndicators".$idCarousel."\" data-slide-to=\"0\" class=\"active\"></li>";

                  for ($i=1; $i < $row["nbPhoto"] ; $i++) {
                     echo "<li data-target=\"#carouselExampleIndicators".$idCarousel."\" data-slide-to=\"".$i."\"></li>\"";
                  }
                echo"
            </ol>
            <div class=\"carousel-inner\">
               <div class=\"carousel-item active\">
                  <img src=\"".$row["photo"]."\" class=\"card-img-top d-block w-100\" alt=\"".$row["nom"]."\">
               </div>";
                  for ($i=1; $i < $row["nbPhoto"] ; $i++) {
                     echo "<div class=\"carousel-item\">
                        <img src=\"".substr($row["photo"], 0, -4).$i.".jpg"."\" class=\"card-img-top d-block w-100\" alt=\"". $row["photo"] ."\">
                     </div>";

                  }
                echo"
            </div>
            <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators".$idCarousel."\" role=\"button\" data-slide=\"prev\">
               <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\" ></span>
               <span class=\"sr-only\">Previous</span>
            </a>
            <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators".$idCarousel."\" role=\"button\" data-slide=\"next\">
               <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
               <span class=\"sr-only\">Next</span>
            </a>
         </div>



         <div class=\"card-body\">
         <form action=\"src/seller_manage_product.php\" method=\"post\" enctype=\"multipart/form-data\">
         <input type=\"hidden\" name=\"id\" value=\"".$row["id_music"]."\">
         <input type=\"hidden\" name=\"cat\" value=\"music\">
         <label>Image</label>
         <div class=\"custom-file\">
             <input type=\"file\" class=\"custom-file-input\" name=\"path\" id=\"path\">
             <label class=\"custom-file-label\" for=\"validatedCustomFile\">Choix de l'image...</label>
             <div class=\"invalid-feedback\">Example invalid custom file feedback</div>
        </div>
            <div class=\"form-group\">
               <label>Nom</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"nom\" placeholder=\"Nom\" value=\"".$row["nom"]."\" required>
            </div>
            <div class=\"form-group\">
               <label>Auteur</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"auteur\" placeholder=\"Auteur\" value=\"".$row["auteur"]."\">
            </div>
            <div class=\"form-group\">
               <label>Genre</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"genre\" placeholder=\"Genre\" value=\"".$row["genre"]."\">
            </div>
            <div class=\"form-group\">
               <label>Tours</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"tours\" placeholder=\"Tours\" value=\"".$row["taille"]."\">
            </div>
            <div class=\"form-group\">
               <label>Date de Sortie</label>
               <input class=\"form-control form-control-sm\" type=\"date\" name=\"date\" placeholder=\"Date\" value=\"".$row["datesortie"]."\">
            </div>
            <div class=\"form-group\">
               <label>Description</label>
               <textarea class=\"form-control\" name=\"description\" id=\"exampleFormControlTextarea1\" rows=\"3\">".$row["description"]."</textarea>
            </div>
            <div class=\"form-group\">
               <label>Prix</label>
               <input class=\"form-control form-control-sm\" name=\"prix\" type=\"text\" placeholder=\"Prix\" value=\"".$row["prix"]."\" required>
            </div>
            <div class=\"form-group\">
               <label>Nombre d'unité</label>
               <input class=\"form-control form-control-sm\" name=\"quantite\" type=\"text\" placeholder=\"Nombre d'unité\" value=\"".$row["nombre"]."\" required>
            </div>
               <input type=\"submit\" class=\"btn btn-primary\" name=\"action\" value=\"modifier\">
               <input type=\"submit\" class=\"btn btn-danger\" name=\"action\" value=\"supprimer\">
         </div>
         </form>
      </div>
   </div>";
        $cpt++;
        $idCarousel++;
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
  FROM book
  INNER JOIN seller ON book.id_seller = seller.id_seller
  WHERE book.id_seller = '" . $_SESSION['id'] . "';";

$result = mysqli_query($conn, $sql); // send the query
if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
   //$cpt=0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($cpt==0) {
            echo "<div class=\"row\">";
        }
        //<img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["title"]."\">
        echo "<div class=\"col-3 my-2\">
      <div class=\"card\" style=\"width: 17rem;\">


         <div id=\"carouselExampleIndicators".$idCarousel."\" class=\"carousel slide\" data-ride=\"carousel\">
            <ol class=\"carousel-indicators\">
               <li data-target=\"#carouselExampleIndicators".$idCarousel."\" data-slide-to=\"0\" class=\"active\"></li>";

                  for ($i=1; $i < $row["nbPhoto"] ; $i++) {
                     echo "<li data-target=\"#carouselExampleIndicators".$idCarousel."\" data-slide-to=\"".$i."\"></li>\"";
                  }
               echo"
            </ol>
            <div class=\"carousel-inner\">
               <div class=\"carousel-item active\">
                  <img src=\"".$row["photo"]."\" class=\"card-img-top d-block w-100\" alt=\"".$row["title"]."\">
               </div>";
                  for ($i=1; $i < $row["nbPhoto"] ; $i++) {
                     echo "<div class=\"carousel-item\">
                        <img src=\"".substr($row["photo"], 0, -4).$i.".jpg"."\" class=\"card-img-top d-block w-100\" alt=\"". $row["photo"] ."\">
                     </div>";

                  }
               echo"
            </div>
            <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators".$idCarousel."\" role=\"button\" data-slide=\"prev\">
               <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\" ></span>
               <span class=\"sr-only\">Previous</span>
            </a>
            <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators".$idCarousel."\" role=\"button\" data-slide=\"next\">
               <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
               <span class=\"sr-only\">Next</span>
            </a>
         </div>


         <div class=\"card-body\">
         <form action=\"src/seller_manage_product.php\" method=\"post\" enctype=\"multipart/form-data\">
         <input type=\"hidden\" name=\"id\" value=\"".$row["id_book"]."\">
         <input type=\"hidden\" name=\"cat\" value=\"book\">
         <label>Image</label>
         <div class=\"custom-file\">
             <input type=\"file\" class=\"custom-file-input\" name=\"path\" id=\"path\">
             <label class=\"custom-file-label\" for=\"validatedCustomFile\">Choix de l'image...</label>
             <div class=\"invalid-feedback\">Example invalid custom file feedback</div>
        </div>
            <div class=\"form-group\">
               <label>Nom</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"nom\" placeholder=\"Nom\" value=\"".$row["title"]."\" required>
            </div>
            <div class=\"form-group\">
               <label>Auteur</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"auteur\" placeholder=\"Auteur\" value=\"".$row["auteur"]."\">
            </div>
            <div class=\"form-group\">
               <label>Editeur</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"editeur\" placeholder=\"Editeur\" value=\"".$row["editeur"]."\">
            </div>
            <div class=\"form-group\">
               <label>Date de Parution</label>
               <input class=\"form-control form-control-sm\" type=\"date\" name=\"date\" placeholder=\"Genre\" value=\"".$row["date"]."\">
            </div>
            <div class=\"form-group\">
               <label>Genre</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"genre\" placeholder=\"Genre\" value=\"".$row["genre"]."\">
            </div>
            <div class=\"form-group\">
               <label>Description</label>
               <textarea class=\"form-control\" name=\"description\" id=\"exampleFormControlTextarea1\" rows=\"3\">".$row["description"]."</textarea>
            </div>
            <div class=\"form-group\">
               <label>Prix</label>
               <input class=\"form-control form-control-sm\" name=\"prix\" type=\"text\" placeholder=\"Prix\" value=\"".$row["prix"]."\" required>
            </div>
            <div class=\"form-group\">
               <label>Nombre d'unité</label>
               <input class=\"form-control form-control-sm\" name=\"quantite\" type=\"text\" placeholder=\"Nombre d'unité\" value=\"".$row["nombre"]."\" required>
            </div>
               <input type=\"submit\" class=\"btn btn-primary\" name=\"action\" value=\"modifier\">
               <input type=\"submit\" class=\"btn btn-danger\" name=\"action\" value=\"supprimer\">
         </div>
         </form>
      </div>
   </div>";
        $cpt++;
        $idCarousel++;
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
  FROM vetements
  INNER JOIN seller ON vetements.id_seller = seller.id_seller
  WHERE vetements.id_seller = '" . $_SESSION['id'] . "';";

$result = mysqli_query($conn, $sql); // send the query
if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
   //$cpt=0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($cpt==0) {
            echo "<div class=\"row\">";
        }
        //<img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\">
        echo "<div class=\"col-3 my-2\">
      <div class=\"card\" style=\"width: 17rem;\">

         <div id=\"carouselExampleIndicators".$idCarousel."\" class=\"carousel slide\" data-ride=\"carousel\">
            <ol class=\"carousel-indicators\">
               <li data-target=\"#carouselExampleIndicators".$idCarousel."\" data-slide-to=\"0\" class=\"active\"></li>";

                  for ($i=1; $i < $row["nbPhoto"] ; $i++) {
                     echo "<li data-target=\"#carouselExampleIndicators".$idCarousel."\" data-slide-to=\"".$i."\"></li>\"";
                  }
                echo"
            </ol>
            <div class=\"carousel-inner\">
               <div class=\"carousel-item active\">
                  <img src=\"".$row["photo"]."\" class=\"card-img-top d-block w-100\" alt=\"".$row["nom"]."\">
               </div>";
                  for ($i=1; $i < $row["nbPhoto"] ; $i++) {
                     echo "<div class=\"carousel-item\">
                        <img src=\"".substr($row["photo"], 0, -4).$i.".jpg"."\" class=\"card-img-top d-block w-100\" alt=\"". $row["photo"] ."\">
                     </div>";

                  }
                echo"
            </div>
            <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators".$idCarousel."\" role=\"button\" data-slide=\"prev\">
               <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\" ></span>
               <span class=\"sr-only\">Previous</span>
            </a>
            <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators".$idCarousel."\" role=\"button\" data-slide=\"next\">
               <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
               <span class=\"sr-only\">Next</span>
            </a>
         </div>

         <div class=\"card-body\">
         <form action=\"src/seller_manage_product.php\" method=\"post\" enctype=\"multipart/form-data\">
         <input type=\"hidden\" name=\"id\" value=\"".$row["id_vetement"]."\">
         <input type=\"hidden\" name=\"cat\" value=\"cloth\">
         <label>Image</label>
         <div class=\"custom-file\">
             <input type=\"file\" class=\"custom-file-input\" name=\"path\" id=\"path\">
             <label class=\"custom-file-label\" for=\"validatedCustomFile\">Choix de l'image...</label>
             <div class=\"invalid-feedback\">Example invalid custom file feedback</div>
        </div>
            <div class=\"form-group\">
               <label>Nom</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"nom\" placeholder=\"Nom\" value=\"".$row["nom"]."\" required>
            </div>
            <div class=\"form-group\">
               <label>Marque</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"marque\" placeholder=\"Marque\" value=\"".$row["marque"]."\">
            </div>
            <div class=\"form-group\">
               <label>Couleur</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"couleur\" placeholder=\"Couleur\" value=\"".$row["couleur"]."\">
            </div>
            <div class=\"form-group\">
               <label>Taille</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"taille\" placeholder=\"Taille (XS/S/M/L/XL...)\" value=\"".$row["taille"]."\">
            </div>
            <div class=\"form-group\">
               <label>Sexe</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"sexe\" placeholder=\"Sexe\" value=\"".$row["sexe"]."\">
            </div>
            <div class=\"form-group\">
               <label>Description</label>
               <textarea class=\"form-control\" name=\"description\" id=\"exampleFormControlTextarea1\" rows=\"3\">".$row["description"]."</textarea>
            </div>
            <div class=\"form-group\">
               <label>Prix</label>
               <input class=\"form-control form-control-sm\" name=\"prix\" type=\"text\" placeholder=\"Prix\" value=\"".$row["prix"]."\" required>
            </div>
            <div class=\"form-group\">
               <label>Nombre d'unité</label>
               <input class=\"form-control form-control-sm\" name=\"quantite\" type=\"text\" placeholder=\"Nombre d'unité\" value=\"".$row["nombre"]."\" required>
            </div>
               <input type=\"submit\" class=\"btn btn-primary\" name=\"action\" value=\"modifier\">
               <input type=\"submit\" class=\"btn btn-danger\" name=\"action\" value=\"supprimer\">
         </div>
         </form>
      </div>
   </div>";
        $cpt++;
        $idCarousel++;
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
  FROM sportsloisirs
  INNER JOIN seller ON sportsloisirs.id_seller = seller.id_seller
  WHERE sportsloisirs.id_seller = '" . $_SESSION['id'] . "';";

$result = mysqli_query($conn, $sql); // send the query
if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
   //$cpt=0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($cpt==0) {
            echo "<div class=\"row\">";
        }
        //<img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\">
        echo "<div class=\"col-3 my-2\">
      <div class=\"card\" style=\"width: 17rem;\">



         <div id=\"carouselExampleIndicators".$idCarousel."\" class=\"carousel slide\" data-ride=\"carousel\">
            <ol class=\"carousel-indicators\">
               <li data-target=\"#carouselExampleIndicators".$idCarousel."\" data-slide-to=\"0\" class=\"active\"></li>";

                  for ($i=1; $i < $row["nbPhoto"] ; $i++) {
                     echo "<li data-target=\"#carouselExampleIndicators".$idCarousel."\" data-slide-to=\"".$i."\"></li>\"";
                  }
               echo"
            </ol>
            <div class=\"carousel-inner\">
               <div class=\"carousel-item active\">
                  <img src=\"".$row["photo"]."\" class=\"card-img-top d-block w-100\" alt=\"".$row["nom"]."\">
               </div>";
                  for ($i=1; $i < $row["nbPhoto"] ; $i++) {
                     echo "<div class=\"carousel-item\">
                        <img src=\"".substr($row["photo"], 0, -4).$i.".jpg"."\" class=\"card-img-top d-block w-100\" alt=\"". $row["photo"] ."\">
                     </div>";

                  }
               echo"
            </div>
            <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators".$idCarousel."\" role=\"button\" data-slide=\"prev\">
               <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\" ></span>
               <span class=\"sr-only\">Previous</span>
            </a>
            <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators".$idCarousel."\" role=\"button\" data-slide=\"next\">
               <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
               <span class=\"sr-only\">Next</span>
            </a>
         </div>

         <div class=\"card-body\">
         <form action=\"src/seller_manage_product.php\" method=\"post\" enctype=\"multipart/form-data\">
         <input type=\"hidden\" name=\"id\" value=\"".$row["id_sl"]."\">
         <input type=\"hidden\" name=\"cat\" value=\"sports\">
         <label>Image</label>
         <div class=\"custom-file\">
             <input type=\"file\" class=\"custom-file-input\" name=\"path\" id=\"path\">
             <label class=\"custom-file-label\" for=\"validatedCustomFile\">Choix de l'image...</label>
             <div class=\"invalid-feedback\">Example invalid custom file feedback</div>
        </div>
            <div class=\"form-group\">
               <label>Nom</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"nom\" placeholder=\"Nom\" value=\"".$row["nom"]."\" required>
            </div>
            <div class=\"form-group\">
               <label>Marque</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"marque\" placeholder=\"Marque\" value=\"".$row["marque"]."\">
            </div>
            <div class=\"form-group\">
               <label>Genre</label>
               <input class=\"form-control form-control-sm\" type=\"text\" name=\"genre\" placeholder=\"Genre\" value=\"".$row["genre"]."\">
            </div>
            <div class=\"form-group\">
               <label>Description</label>
               <textarea class=\"form-control\" name=\"description\" id=\"exampleFormControlTextarea1\" rows=\"3\">".$row["description"]."</textarea>
            </div>
            <div class=\"form-group\">
               <label>Prix</label>
               <input class=\"form-control form-control-sm\" name=\"prix\" type=\"text\" placeholder=\"Prix\" value=\"".$row["prix"]."\" required>
            </div>
            <div class=\"form-group\">
               <label>Nombre d'unité</label>
               <input class=\"form-control form-control-sm\" name=\"quantite\" type=\"text\" placeholder=\"Nombre d'unité\" value=\"".$row["nombre"]."\" required>
            </div>
               <input type=\"submit\" class=\"btn btn-primary\" name=\"action\" value=\"modifier\">
               <input type=\"submit\" class=\"btn btn-danger\" name=\"action\" value=\"supprimer\">
         </div>
         </form>
      </div>
   </div>";
        $cpt++;
        $idCarousel++;
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

<!--div class="container m-5">
   <div class="row">

      <div class="col-3">
         <div class="card" style="width: 17rem;">
            <img src="/amazonece/img/AM.jpg" class="card-img-top" alt="...">
            <div class="card-body">
               <div class="form-group">
                  <label>Nom</label>
                  <input class="form-control form-control-sm" type="text" placeholder="Nom" value="AM">
               </div>
               <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
               </div>
               <div class="form-group">
                  <label>Prix</label>
                  <input class="form-control form-control-sm" type="text" placeholder="Prix" value="30,00€">
               </div>
               <div class="form-group">
                  <label>Nombre d'unité</label>
                  <input class="form-control form-control-sm" type="text" placeholder="Nombre d'unité" value="2">
               </div>
                  <a href="#" class="btn btn-primary">Modifier</a>
                  <a href="#" class="btn btn-danger">Supprimer</a>
            </div>
         </div>
      </div>

   </div>
</div-->
