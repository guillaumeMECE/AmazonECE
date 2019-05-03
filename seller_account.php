<?php session_start();
require_once("config/db.php");
?>

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
   <?php
     include("views/navbar.php");
     // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // make the request to the DATABASE
    $sql = "SELECT *
           FROM seller
           WHERE id_seller = '".$_SESSION["id"]."';";

          // echo $_SESSION['id'];
           $result = mysqli_query($conn, $sql); // send the query
           //$row = mysqli_fetch_assoc($result); // fetch keys with values
           $row = mysqli_fetch_assoc($result);
           if (mysqli_num_rows($result) > 0) { // if we get back some values so the request was good


               $nom = $row['name'];
               $prenom = $row['firstname'];
               $mdp = $row['password'];
               $mail = $row['mail'];
               $photoProfil = $row['photoProfil'];
               $photoBg = $row['photoBg'];
           }
       mysqli_close($conn);
          ?>

   <div class="container m-5 p-5 shadow " id="Infogéné" style="background-image:url(<?php echo $photoBg ?>)">
      <h2>Informations générales</h2>
      <form>

         <div class="form-group">
            <!--label for="picture">Photo</label-->
            <img src="<?php echo $photoProfil;?>" class="img-thumbnail" width="200px" alt="<?php echo $nom;?>">
            <!--input type="text" class="form-control" id="picture" value="<!?php echo $photoProfil;?>"-->
         </div>

         <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" value="<?php echo $nom;?>">
         </div>

         <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" value="<?php echo $prenom;?>">
         </div>

         <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" value="<?php echo $mdp;?>">
         </div>

         <div class="form-group">
            <label for="mail">Adresse mail</label>
            <input type="mail" class="form-control" id="mail" value="<?php echo $mail;?>">
         </div>


      </form>
   </div>
   <script type="text/javascript">
      var element = document.getElementById("nav-home");
      element.classList.remove("active");
      element = document.getElementById("nav-panier");
      element.classList.remove("active");
      element = document.getElementById("nav-compte");
      element.classList.add("active");
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
