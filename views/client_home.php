<!--BEST SELL-->
<?php // include the configs / constants for the database connection
  require_once("config/db.php");
include("best_sell.html");
$iscloth=false;
$isbook=false;
$issports=false;
$ismusic=false;
if (isset($_GET["cat"])) {

   switch ($_GET["cat"]) {
      case 'book':
         $isbook=true;
         break;
      case 'music':
         $ismusic=true;
         break;
      case 'sports':
         $issports=true;
         break;
      case 'cloth':
         $iscloth=true;
         break;
   }
}
   ?>



<div class="container my-5 shadow " id="categorie">
   <h2>Catégories</h2>
   <div class="row">
      <div class="col-3 my-3 shadow-sm" style="text-align:center">
         <a href="#book" id="show-books">
            <h3>Livres</h3>
            <div class="row">
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM book
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM book
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM book
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM book
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
            </div>
         </a>
      </div>
      <div class="col-3 my-3 shadow-sm" style="text-align:center">
         <a href="#music" id="show-music">
            <h3>Musique</h3>
            <div class="row">
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM music
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM music
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM music
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM music
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
            </div>
         </a>
      </div>
      <div class="col-3 my-3 shadow-sm" style="text-align:center">
         <a href="#cloth" id="show-clothing">
            <h3>Vêtements</h3>
            <div class="row">
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM vetements
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM vetements
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM vetements
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM vetements
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
            </div>
         </a>
      </div>
      <div class="col-3 my-3 shadow-sm" style="text-align:center">
         <a href="#sports" id="show-sports">
            <h3>Sports & Loisir</h3>
            <div class="row">
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM sportsloisirs
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM sportsloisirs
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM sportsloisirs
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
               <div class="col-6">
                  <?php
                  // Create connection
                 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                 // Check connection
                 if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                 }

                 // make the request to the DATABASE
                 $sql = "SELECT photo
                        FROM sportsloisirs
                        ORDER BY RAND()
                        LIMIT 1;";
                 $result = mysqli_query($conn, $sql); // send the query
                 //$row = mysqli_fetch_assoc($result); // fetch keys with values
                 if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
                    $row = mysqli_fetch_assoc($result);
                    echo "<img src=\"".$row["photo"]."\" alt=\"".$row["photo"]."\">";
                 }
                 mysqli_close($conn);  ?>
               </div>
            </div>
         </a>
      </div>
   </div>
</div>

<div class="container" id="book" <?php if (!$isbook) {echo "style=\"display:none\"";} ?>>
   <div class="row">
      <div class="col">
         <h3>Livres</h3>
         <?php
         // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // make the request to the DATABASE
        $sql = "SELECT *
              FROM book;";
        $result = mysqli_query($conn, $sql); // send the query
        //$row = mysqli_fetch_assoc($result); // fetch keys with values
        if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<div class=\"card my-3\" style=\"width: 18rem;\">
             <img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["title"]."\">
             <div class=\"card-body\">
                <h5 class=\"card-title\">".$row["title"]."</h5>
                <p class=\"card-text\">".$row["prix"]." €</p>
                <a href=\"article.php?cat=book&id=".$row["id_book"]."\" class=\"btn btn-primary\">Aperçu</a>
             </div>
          </div>";
           }
        }else {
           echo "<p>Il n'y a pas encore d'articles en ventes</p>";
        }
        mysqli_close($conn);
         ?>
      </div>
   </div>
</div>

<div class="container" id="music"  <?php if (!$ismusic) {echo "style=\"display:none\"";} ?>>
   <div class="row">
      <div class="col">
         <h3>Musique</h3>
         <div class="card-deck">
         <?php
         // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // make the request to the DATABASE
        $sql = "SELECT *
              FROM music;";
        $result = mysqli_query($conn, $sql); // send the query
        //$row = mysqli_fetch_assoc($result); // fetch keys with values
        if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<div class=\"card my-3\" style=\"width: 18rem;\">
             <img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\">
             <div class=\"card-body\">
                <h5 class=\"card-title\">".$row["nom"]."</h5>
                <p class=\"card-text\">".$row["prix"]." €</p>
                <a href=\"article.php?cat=music&id=".$row["id_music"]."\" class=\"btn btn-primary\">Aperçu</a>
             </div>
          </div>";
           }
        }else {
           echo "<p>Il n'y a pas encore d'articles en ventes</p>";
        }
        mysqli_close($conn);
         ?>
      </div>
      </div>
   </div>
</div>

<div class="container" id="cloth"  <?php if (!$iscloth) {echo "style=\"display:none\"";} ?>>
   <div class="row">
      <div class="col">
         <h3>Vêtements</h3>
         <?php
         // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // make the request to the DATABASE
        $sql = "SELECT *
              FROM vetements;";
        $result = mysqli_query($conn, $sql); // send the query
        //$row = mysqli_fetch_assoc($result); // fetch keys with values
        if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<div class=\"card my-3\" style=\"width: 18rem;\">
             <img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\">
             <div class=\"card-body\">
                <h5 class=\"card-title\">".$row["nom"]."</h5>
                <p class=\"card-text\">".$row["prix"]." €</p>
                <a href=\"article.php?cat=cloth&id=".$row["id_vetement"]."\" class=\"btn btn-primary\">Aperçu</a>
             </div>
          </div>";
           }
        }else {
           echo "<p>Il n'y a pas encore d'articles en ventes</p>";
        }
        mysqli_close($conn);
         ?>
      </div>
   </div>
</div>

<div class="container" id="sports"  <?php if (!$issports) {echo "style=\"display:none\"";} ?>>
   <div class="row">
      <div class="col">
         <h3>Sports</h3>
         <?php
         // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // make the request to the DATABASE
        $sql = "SELECT *
              FROM sportsloisirs;";
        $result = mysqli_query($conn, $sql); // send the query
        //$row = mysqli_fetch_assoc($result); // fetch keys with values
        if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<div class=\"card my-3\" style=\"width: 18rem;\">
             <img src=\"".$row["photo"]."\" class=\"card-img-top\" alt=\"".$row["nom"]."\">
             <div class=\"card-body\">
                <h5 class=\"card-title\">".$row["nom"]."</h5>
                <p class=\"card-text\">".$row["prix"]." €</p>
                <a href=\"article.php?cat=sports&id=".$row["id_sl"]."\" class=\"btn btn-primary\">Aperçu</a>
             </div>
          </div>";
           }
        }else {
           echo "<p>Il n'y a pas encore d'articles en ventes</p>";
        }
        mysqli_close($conn);
         ?>
      </div>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@14/dist/smooth-scroll.polyfills.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
      var scroll = new SmoothScroll('a[href*="#"]');
      $("#show-books").click(function() {
         $("#book").show();
         $("#music").hide();
         $("#cloth").hide();
         $("#sports").hide();
      });
      $("#show-music").click(function() {
         $("#book").hide();
         $("#music").show();
         $("#cloth").hide();
         $("#sports").hide();
      });
      $("#show-clothing").click(function() {
         $("#book").hide();
         $("#music").hide();
         $("#cloth").show();
         $("#sports").hide();
      });
      $("#show-sports").click(function() {
         $("#book").hide();
         $("#music").hide();
         $("#cloth").hide();
         $("#sports").show();
      });
   });
</script>
