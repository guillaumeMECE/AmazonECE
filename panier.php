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
include("views/navbar.php") ?>
   <div class="container my-5">
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Produit</th>
               <th scope="col">Nom</th>
               <th scope="col">Description</th>
               <th scope="col">Prix</th>
               <th scope="col">Nombre d'unités</th>
            </tr>
         </thead>
         <tbody>
            <?php

            require_once("config/db.php");
            // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //MUSIC
        // SQL request
             $sql = "SELECT *
               FROM cart
               INNER JOIN music ON cart.id_produit = music.id_music
               WHERE cart.user_id = '" . $_SESSION['id'] . "'
               AND cart.type = 'music';";
               $result = mysqli_query($conn, $sql); // send the query
         while ($row = mysqli_fetch_assoc($result)) {
             $photo=$row['photo'];
             $nom=$row["nom"];
             $description=$row["description"];
             $prix=$row["prix"];
             $nbre=$row["nombre_cart"];

             echo "<tr>

                  <td><img src=\"$photo\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\" style=\"max-width:100px\"></th>
                   <td>$nom</td>
                   <td>$description</td>
                   <td>$prix €</td>
                   <td>$nbre</td>
                   </tr>
                   ";
         }
         //BOOKS
         // SQL request
             $sql = "SELECT *
               FROM cart
               INNER JOIN book ON cart.id_produit = book.id_book
               WHERE cart.user_id = '" . $_SESSION['id'] . "'
               AND cart.type = 'book';";
               $result = mysqli_query($conn, $sql); // send the query
         while ($row = mysqli_fetch_assoc($result)) {
             $photo=$row['photo'];
             $nom=$row["title"];
             $description=$row["description"];
             $prix=$row["prix"];
             $nbre=$row["nombre_cart"];

             echo "<tr>

                  <td><img src=\"$photo\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\" style=\"max-width:100px\"></th>
                   <td>$nom</td>
                   <td>$description</td>
                   <td>$prix €</td>
                   <td>$nbre</td>
                   </tr>
                   ";
         }

         //CLOTH
         // SQL request
             $sql = "SELECT *
               FROM cart
               INNER JOIN vetements ON cart.id_produit = vetements.id_vetement
               WHERE cart.user_id = '" . $_SESSION['id'] . "'
               AND cart.type = 'cloth';";
               $result = mysqli_query($conn, $sql); // send the query
         while ($row = mysqli_fetch_assoc($result)) {
             $photo=$row['photo'];
             $nom=$row["nom"];
             $description=$row["description"];
             $prix=$row["prix"];
             $nbre=$row["nombre_cart"];

             echo "<tr>

                  <td><img src=\"$photo\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\" style=\"max-width:100px\"></th>
                   <td>$nom</td>
                   <td>$description</td>
                   <td>$prix €</td>
                   <td>$nbre</td>
                   </tr>
                   ";
         }

         //SPORTS
         // SQL request
             $sql = "SELECT *
               FROM cart
               INNER JOIN sportsloisirs ON cart.id_produit = sportsloisirs.id_sl
               WHERE cart.user_id = '" . $_SESSION['id'] . "'
               AND cart.type = 'sports';";
               $result = mysqli_query($conn, $sql); // send the query
         while ($row = mysqli_fetch_assoc($result)) {
             $photo=$row['photo'];
             $nom=$row["nom"];
             $description=$row["description"];
             $prix=$row["prix"];
             $nbre=$row["nombre_cart"];

             echo "<tr>

                  <td><img src=\"$photo\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\" style=\"max-width:100px\"></th>
                   <td>$nom</td>
                   <td>$description</td>
                   <td>$prix €</td>
                   <td>$nbre</td>
                   </tr>
                   ";
         }
         ?>
         </tbody>
      </table>
   </div>

   <script type="text/javascript">
      var element = document.getElementById("nav-home");
      element.classList.remove("active");
      element = document.getElementById("nav-panier");
      element.classList.add("active");
      element = document.getElementById("nav-compte");
      element.classList.remove("active");
   </script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
