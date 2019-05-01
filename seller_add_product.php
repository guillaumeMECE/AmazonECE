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
   <?php
   session_start();
   require_once("config/db.php");
   include("views/navbar.php"); ?>

   <div class="container my-5">
      <div class="row justify-content-md-center">
         <div class="col-md-auto">

            <div class="card" style="width: 20rem;">
               <!--img src="/amazonece/img/AM.jpg" class="card-img-top" alt="..."-->
               <i class="material-icons md-48">add</i>
               <div class="card-body">
                  <form class="form" action="seller_add_product.php" method="post" enctype="multipart/form-data">

                        <label>Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="path" id="path" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choix de l'image...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                       </div>

                     <div class="form-group">
                        <label for="FormControlSelectType">Catégorie</label>
                        <select class="form-control" id="FormControlSelectType" name="type">
                           <option>Musique</option>
                           <option>Livre</option>
                           <option>Sports & Loisirs</option>
                           <option>Vetement</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Nom</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Nom" name="nom">
                     </div>
                     <div class="form-group" id="auteur" style="display:none;">
                        <label>Auteur</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Auteur" name="auteur">
                     </div>
                     <div class="form-group" id="editeur" style="display:none;">
                        <label>Editeur</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Editeur" name="editeur">
                     </div>
                     <div class="form-group" id="marque" style="display:none;">
                        <label>Marque</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Marque" name="marque">
                     </div>
                     <div class="form-group" id="genre" style="display:none;">
                        <label>Genre</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Genre" name="genre">
                     </div>
                     <div class="form-group" id="sexe" style="display:none;">
                        <label>Sexe</label>
                        <select class="form-control" id="FormControlSelectTour" name="sexe">
                           <option>Homme</option>
                           <option>Femme</option>
                           <option>Mixte</option>
                        </select>
                     </div>
                     <div class="form-group" id="couleur" style="display:none;">
                        <label>Couleur</label>
                        <select class="form-control" id="FormControlSelectTour" name="couleur">
                           <option>Blanc</option>
                           <option>Rouge</option>
                           <option>Noir</option>
                           <option>Vert</option>
                           <option>Gris</option>
                           <option>Marron</option>
                        </select>
                     </div>
                     <div class="form-group" id="date" style="display:none;">
                        <label>Date de Sortie</label>
                        <input class="form-control form-control-sm" type="date" name="date">
                     </div>
                     <div class="form-group" id="tours" style="display:none;">
                        <label>Tours</label>
                        <select class="form-control" id="FormControlSelectTour" name="tours">
                           <option>45</option>
                           <option>33</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description"></textarea>
                     </div>
                     <div class="form-group">
                        <label>Prix</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Prix" name="prix">
                     </div>
                     <div class="form-group">
                        <label>Nombre d'unité</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Nombre d'unité" name="quantite">
                     </div>
                     <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                     <input type="submit" class="btn btn-success" name="submit" value="Ajouter">
                  </form>
               </div>
            </div>

         </div>
      </div>
   </div>

   <?php

   function add_pic()
   {
       // Create connection

       $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

       // Check connection

       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

       extract($_POST);
if (isset($_FILES['path'])) {
   $UploadedFileName = $_FILES["path"]["name"];
}


       if ($UploadedFileName != '') {
           $upload_directory = "img/"; //This is the folder which img will be stored

           $filename=$_POST['nom'];
           if (file_exists($filename)) {
               if ($filename != "res/user-img.jpg") {
                   unlink($filename);
               }
           }
           $TargetPath = time().$_POST['nom'].".jpg";
           echo $upload_directory.$TargetPath;
           $temp_file = $_FILES['path']['tmp_name'];
           $max_size = 4000000;
           $size = filesize($temp_file);
           echo "size : " . $size . " ";
           if ($size < $max_size) {
               if (move_uploaded_file($_FILES['path']['tmp_name'], $upload_directory.$TargetPath)) {
                  switch ($_POST['type']) {
                   case 'Musique':
                   $query="SELECT id_music FROM music WHERE id_seller='" . $_POST["id"] . "' AND nom ='" . $_POST["nom"] . "' AND description ='" . $_POST["description"] . "'AND nombre ='" . $_POST["quantite"] . "';";
                   echo $query;
                   $result = mysqli_query($conn, $query); // send the query
                  $row = mysqli_fetch_assoc($result);
                  //echo "ATTTTTENNNNTION:".$row['id_music'];

                   // make the request to the DATABASE
                   $sql = "UPDATE music SET photo = '" . $upload_directory.$TargetPath . "' WHERE id_music='" .$row["id_music"] . "' ";

                     break;
                   case 'Livre':
                     // code...
                     break;
                    case 'Vetement':
                    // code...
                       break;
                   case 'Sports & Loisirs':
                      // code...
                      break;
                   default:
                      // code...
                      break;
                }

                   if ($conn->query($sql) === true) {
                       $_POST['submit'] = null;
                       //header("Refresh:0");
                   } else {
                       echo "Error updating path: ".$conn->error;
                   }
               } else {
                   echo "Error move upload";
               }
           } else {
               echo "Error move upload : Your picture is too Big";
           }

           $conn->close();
       }
   }
   function create_product()
   {

      // Create connection
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }

       switch ($_POST['type']) {
        case 'Musique':
        // make the request to the DATABASE
      $sql = "INSERT INTO music(nom, auteur, datesortie, taille,description, prix, genre, nombre, id_seller) VALUES ('" . $_POST["nom"] . "','" . $_POST["auteur"] . "','" . $_POST["date"] . "','" . $_POST["tours"] . "','" . $_POST["description"] . "','" . $_POST["prix"] . "','" . $_POST["genre"] . "','" . $_POST["quantite"] . "','" . $_POST["id"] . "')";
           break;
        case 'Livre':
          // code...
          break;
         case 'Vetement':
         // code...
            break;
        case 'Sports & Loisirs':
           // code...
           break;
        default:
           // code...
           break;
     }
       if (mysqli_query($conn, $sql)) {
           echo "New record created successfully UPDATE";
       } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
       mysqli_close($conn);
    }
   if (isset($_POST['submit'])) {
       create_product();
       add_pic();
   } ?>

   <script type="text/javascript">
      $(document).ready(function() {
         $("#auteur").show();
         $("#date").show();
         $("#tours").show();
         $("#genre").show();
         $("#editeur").hide();
         $("#couleur").hide();
         $("#sexe").hide();
         $("#marque").hide();
         $("#FormControlSelectType").change(function() {
            if ($("#FormControlSelectType").val() == "Musique") {
               $("#auteur").show();
               $("#date").show();
               $("#tours").show();
               $("#genre").show();
               $("#editeur").hide();
               $("#couleur").hide();
               $("#sexe").hide();
               $("#marque").hide();
            } else if ($("#FormControlSelectType").val() == "Livre") {
               $("#auteur").show();
               $("#date").show();
               $("#tours").hide();
               $("#genre").show();
               $("#editeur").show();
               $("#couleur").hide();
               $("#sexe").hide();
               $("#marque").hide();
            } else if ($("#FormControlSelectType").val() == "Vetement") {
               $("#auteur").hide();
               $("#date").hide();
               $("#tours").hide();
               $("#genre").show();
               $("#editeur").hide();
               $("#couleur").show();
               $("#sexe").show();
               $("#marque").show();
            } else {
               $("#auteur").hide();
               $("#date").hide();
               $("#tours").hide();
               $("#genre").show();
               $("#editeur").hide();
               $("#couleur").hide();
               $("#sexe").hide();
               $("#marque").show();
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
