<!--BEST SELL-->
<?php // include the configs / constants for the database connection
  require_once("config/db.php");

   ?>


<div class="container my-5 shadow" id="best-sell">
   <h2>Ventes Flash</h2>
   <div class="row">
      <div class="col-3 col-best-sell">
         <img src="img/who.jpg" alt="who">
         <div id="comment-in-img">The Who</div>
      </div>
      <div class="col-3 col-best-sell">
         <img src="img/rhcp.jpg" alt="rhcp">
         <div id="comment-in-img">Red Hot Chili Peppers</div>
      </div>
      <div class="col-3 col-best-sell">
         <img src="img/tp.jpg" alt="tp">
         <div id="comment-in-img">The Police</div>
      </div>
      <div class="col-3 col-best-sell">
         <img src="img/am.jpg" alt="am">
         <div id="comment-in-img">Arctic Monkeys</div>
      </div>
   </div>
</div>

<div class="container my-5 shadow " id="categorie">
   <h2>Catégories</h2>
   <div class="row">
      <div class="col-3 my-3 shadow-sm" style="text-align:center">
         <a href="#books" id="show-books">
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
         <a href="#clothing" id="show-clothing">
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

<div class="container" id="books" style="display:none">
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
                <a href=\"#\" class=\"btn btn-primary\">Aperçu</a>
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

<div class="container" id="music" style="display:none">
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
                <a href=\"#\" class=\"btn btn-primary\">Aperçu</a>
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

<div class="container" id="clothing" style="display:none">
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
                <a href=\"#\" class=\"btn btn-primary\">Aperçu</a>
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

<div class="container" id="sports" style="display:none">
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
                <a href=\"#\" class=\"btn btn-primary\">Aperçu</a>
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
         $("#books").show();
         $("#music").hide();
         $("#clothing").hide();
         $("#sports").hide();
      });
      $("#show-music").click(function() {
         $("#books").hide();
         $("#music").show();
         $("#clothing").hide();
         $("#sports").hide();
      });
      $("#show-clothing").click(function() {
         $("#books").hide();
         $("#music").hide();
         $("#clothing").show();
         $("#sports").hide();
      });
      $("#show-sports").click(function() {
         $("#books").hide();
         $("#music").hide();
         $("#clothing").hide();
         $("#sports").show();
      });
   });
</script>
