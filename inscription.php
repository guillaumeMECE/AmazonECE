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
      include("views/navbar.php");
      $alert="";
      if (isset($_GET['sign']) and $_GET['sign']=="false" ) {
         $alert="<div class=\"alert alert-danger mt-2 mx-5 mb-5\" role=\"alert\" style=\"text-align:center\">
         Email déjà utilisé par un autre utilisateur !
         </div>";
      }
      echo $alert; ?>
   <div class="container m-5">
      <div class="row justify-content-md-center">
         <div class="col-md-auto">
            <form class="form" action="" method="post">
               <select class="custom-select custom-select-lg mb-3" name="userType" onchange="this.form.submit()">
                  <option selected>Selection du type de compte</option>
                  <option value="buyer" <?php if (isset($_POST["userType"]) and $_POST["userType"]=="buyer") {echo "selected";} ?>>Client</option>
                  <option value="seller" <?php if (isset($_POST["userType"]) and $_POST["userType"]=="seller") {echo "selected";} ?>>Vendeur</option>
                  <option value="admin" <?php if (isset($_POST["userType"]) and $_POST["userType"]=="admin") {echo "selected";} ?> >Administrateur</option>
               </select>
            </form>
         </div>
      </div>
   </div>
   <?php if (isset($_POST['userType'])) {
          switch ($_POST['userType']) {
            case 'buyer':
               include("views/newclient.html");
               break;
            case 'seller':
               include("views/newseller.html");
               break;
            case 'admin':
               include("views/newadmin.html");
               break;
         }
      } ?>

      <script type="text/javascript">

      </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
