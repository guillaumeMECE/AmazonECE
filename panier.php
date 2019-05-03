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
<div class="floatBtn shadow-lg">
   <div class="floatBtnL">
      <a href="/amazonece" class="previous">
            <i class="material-icons md-36" style="margin-top:12px;">arrow_back_ios</i>
      </a>
   </div>
   <div class="floatBtnR">
      <?php if (isset($_SESSION["email"]) and isset($_SESSION["name"]) and isset($_SESSION["id"])) {
         $url= "/amazonece/order";
      }else{
         $url= "/amazonece/views/newclient";
      } ?>
      <a href="<?php echo $url; ?>" class="cart">
            <i class="material-icons md-36" style="margin-top:12px;">payment</i>
      </a>
   </div>
</div>
<?php
if(isset($_GET["rupture"]) == true)
{
  ?>
  <div class="alert alert-danger" role="alert">
  L'article est en rupture de stock il n'a pas été ajouté au panier
</div>
<?php
}
?>
   <div class="container my-5">
      <form class="" action="src/suppr_panier.php" method="post">


      <table class="table table-hover shadow border">
         <thead>
            <tr>
               <th scope="col"></th>
               <th scope="col">Produit</th>
               <th scope="col">Nom</th>
               <th scope="col">Description</th>
               <th scope="col">Prix</th>
               <th scope="col">Nombre d'unités</th>
               <th scope="col">PRIX TOTAL</th>
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
               AND cart.type = 'music'
               AND cart.type_user = '" . $_SESSION['type'] . "';";
               $result = mysqli_query($conn, $sql); // send the query
         while ($row = mysqli_fetch_assoc($result)) {
             $photo=$row['photo'];
             $nom=$row["nom"];
             $description=$row["description"];
             $prix=$row["prix"];
             $nbre=$row["nombre_cart"];
             $idCheckbox=$row["id_cart"];
             echo "<tr>
             <td><div class=\"custom-control custom-checkbox\"><input type=\"checkbox\" class=\"custom-control-input\" name=\"$idCheckbox\" id=\"$idCheckbox\"><label class=\"custom-control-label\" for=\"$idCheckbox\"></label></div></td>
                  <td><img src=\"$photo\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\" style=\"max-width:100px\"></td>
                   <td>$nom</td>
                   <td>$description</td>
                   <td>$prix €</td>
                   <td>$nbre</td>
                   <td></td>
                   </tr>
                   ";
         }
         //BOOKS
         // SQL request
             $sql = "SELECT *
               FROM cart
               INNER JOIN book ON cart.id_produit = book.id_book
               WHERE cart.user_id = '" . $_SESSION['id'] . "'
               AND cart.type = 'book'
               AND cart.type_user = '" . $_SESSION['type'] . "';";
               $result = mysqli_query($conn, $sql); // send the query
         while ($row = mysqli_fetch_assoc($result)) {
             $photo=$row['photo'];
             $nom=$row["title"];
             $description=$row["description"];
             $prix=$row["prix"];
             $nbre=$row["nombre_cart"];
             $idCheckbox=$row["id_cart"];
             echo "<tr>
            <td><div class=\"custom-control custom-checkbox\"><input type=\"checkbox\" class=\"custom-control-input\" name=\"$idCheckbox\" id=\"$idCheckbox\"><label class=\"custom-control-label\" for=\"$idCheckbox\"></label></div></td>
                  <td><img src=\"$photo\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\" style=\"max-width:100px\"></td>
                   <td>$nom</td>
                   <td>$description</td>
                   <td>$prix €</td>
                   <td>$nbre</td>
                   <td></td>
                   </tr>
                   ";
         }
         //CLOTH
         // SQL request
             $sql = "SELECT *
               FROM cart
               INNER JOIN vetements ON cart.id_produit = vetements.id_vetement
               WHERE cart.user_id = '" . $_SESSION['id'] . "'
               AND cart.type = 'cloth'
               AND cart.type_user = '" . $_SESSION['type'] . "';";
               $result = mysqli_query($conn, $sql); // send the query
         while ($row = mysqli_fetch_assoc($result)) {
             $photo=$row['photo'];
             $nom=$row["nom"];
             $description=$row["description"];
             $prix=$row["prix"];
             $nbre=$row["nombre_cart"];
             $idCheckbox=$row["id_cart"];
             echo "<tr>
             <td><div class=\"custom-control custom-checkbox\"><input type=\"checkbox\" class=\"custom-control-input\" name=\"$idCheckbox\" id=\"$idCheckbox\"><label class=\"custom-control-label\" for=\"$idCheckbox\"></label></div></td>
                  <td><img src=\"$photo\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\" style=\"max-width:100px\"></td>
                   <td>$nom</td>
                   <td>$description</td>
                   <td>$prix €</td>
                   <td>$nbre</td>
                   <td></td>
                   </tr>
                   ";
         }
         //SPORTS
         // SQL request
             $sql = "SELECT *
               FROM cart
               INNER JOIN sportsloisirs ON cart.id_produit = sportsloisirs.id_sl
               WHERE cart.user_id = '" . $_SESSION['id'] . "'
               AND cart.type = 'sports'
               AND cart.type_user = '" . $_SESSION['type'] . "';";
               $result = mysqli_query($conn, $sql); // send the query
         while ($row = mysqli_fetch_assoc($result)) {
             $photo=$row['photo'];
             $nom=$row["nom"];
             $description=$row["description"];
             $prix=$row["prix"];
             $nbre=$row["nombre_cart"];
            $idCheckbox=$row["id_cart"];
             echo "<tr>
               <td><div class=\"custom-control custom-checkbox\"><input type=\"checkbox\" class=\"custom-control-input\" name=\"$idCheckbox\" id=\"$idCheckbox\"><label class=\"custom-control-label\" for=\"$idCheckbox\"></label></div></td>
                  <td><img src=\"$photo\" alt=\"user pic\" class=\"img-thumbnail shadow-sm\" style=\"max-width:100px\"></td>
                   <td>$nom</td>
                   <td>$description</td>
                   <td>$prix €</td>
                   <td>$nbre</td>
                   <td></td>
                   </tr>
                   ";
         }
         ?>
         <tr>
            <td>  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" name="supprAll" id="supprAll">
    <label class="custom-control-label" for="supprAll"></label>
  </div></td>
             <td><input type="submit" class="btn btn-danger" name="submit" value="Supprimer"> </td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td><?php
               // SQL request
                  $sql = "SELECT prix_unit,nombre_cart FROM cart
                  WHERE user_id = '".$_SESSION["id"]."'
                  AND type_user = '".$_SESSION["type"]."';";
                     $result = mysqli_query($conn, $sql); // send the query
                     $prixTot=0;
               while ($row = mysqli_fetch_assoc($result)) {
                   $prixTot += $row["prix_unit"] * $row["nombre_cart"];
               }
               if (isset($prixTot)) {
                   echo $prixTot;
               } else {
                   echo "0";
               }
                ?> €</td>
               </tr>
         </tbody>
      </table>
      </form>
   </div>

   <script type="text/javascript">
   $(document).ready(function() {
      // Check or unCheck all box with the supprAll checkbox
      $("#supprAll").click(function() {
         if ($("#supprAll").prop('checked')) {
            $('.custom-control-input').prop('checked', true);
         }else {
            $('.custom-control-input').prop('checked', false);
         }
      });
   });
   </script>

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
