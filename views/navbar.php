
<nav class="navbar navbar-light navbar-expand-lg bg-light shadow">
   <a class="navbar-brand" href="#">
      <img src="img/logo_ece.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Amazon ECE
   </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" id="nav-icons">
         <div class="container">
            <div class="row justify-content-md-center">
               <div class="col-md-auto col-nav">
                  <a class="nav-item nav-link" href="/amazonece/" id="nav-home"><i class="material-icons md-36">
                        home
                     </i><br>Accueil</a>
               </div>
               <div class="col-md-auto col-nav">
                  <?php
                  $url="#";
                  $icon="shopping_basket";
                  $label="Panier";
                  $class_panier="loginToggle";
                  if (isset($_SESSION["name"]) and isset($_SESSION["type"])) {
                      switch ($_SESSION["type"]) {
                        case 'seller':
                        $icon="add_circle";
                       $label="Ajout produit";
                       $url="/amazonece/seller_add_product";
                       $class_panier="";
                           break;
                        case 'buyer':
                        $icon="shopping_basket";
                     $label="Panier";
                     $url="/amazonece/panier";
                     $class_panier="";
                           break;
                        case 'admin':
                           $url="/AmazonECE/seller_account.php";
                           $class_panier="";
                           break;
                     }
                  }  ?>
                  <a class="nav-item nav-link <?php echo $class_panier; ?>" href="<?php echo $url; ?>" id="nav-panier"><i class="material-icons md-36">
                        <?php echo $icon; ?>
                     </i><br><?php echo $label; ?></a>
               </div>
               <div class="col-md-auto col-nav">
                  <?php
                  $url_account="#";
                  $class_account="loginToggle";
                  //$id_panier="nav-panier-collapse-login";
                   if (isset($_SESSION["name"]) and isset($_SESSION["type"])) {
                       switch ($_SESSION["type"]) {
                        case 'admin':
                           $url_account="/AmazonECE/admin_account.php";
                           $class_account="";
                           break;
                        case 'buyer':
                           $url_account="/AmazonECE/client_account.php";
                           $class_account="";
                           break;
                        case 'seller':
                           $url_account="/AmazonECE/seller_account.php";
                           $class_account="";
                           break;
                     }
                   } ?>
                  <a class="nav-item nav-link <?php echo $class_account; ?>" href="<?php echo $url_account; ?>" id="nav-compte"><i class="material-icons md-36">
                        account_circle
                     </i><br>Compte</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <ul class="nav navbar-nav navbar-right">
      <!--li><p class="navbar-text">Déjà un compte ?</p></li-->
      <li class="dropdown">
         <a href="#" class="dropdown-toggle loginToggle" data-toggle="dropdown"><b>
               <?php if (isset($_SESSION["name"])) {
                       echo "Connecté en tant que <br>".$_SESSION["type"]." (".$_SESSION["name"].")";
                   } else {
                       echo "Login";
                   } ?></b></a>
         <ul id="login-dp" class="dropdown-menu dropdown-menu-right">
            <li>
               <div class="row">
                  <div class="col-md-12">
                     <?php
                        //session_start();
                        if (isset($_SESSION["email"]) and isset($_SESSION["name"])) {

                              //echo "<div class=\"alert alert-success\" role=\"alert\">
                            //Connecté !
                            //</div>
                            //</div>";
                            echo "<p class=\"m-3\">Connecté en tant que ".$_SESSION["name"]."
                              <br><a href=\"src/logout.php\">Déconnexion</a></p>";
                        } else {
                            echo "<form class=\"form\" role=\"form\" method=\"post\" action=\"/amazonece/index.php\" accept-charset=\"UTF-8\" id=\"login-nav\">
                                <div class=\"form-group\">
                                    <label class=\"sr-only\" for=\"InputEmail\">Email</label>
                                    <input type=\"email\" class=\"form-control\" name=\"email\" id=\"InputEmail\" placeholder=\"Email\" required>
                                </div>
                                <div class=\"form-group\">
                                    <label class=\"sr-only\" for=\"InputPassword\">Mot de passe</label>
                                    <input type=\"password\" class=\"form-control\" name=\"mdp\" id=\"InputPassword\" placeholder=\"Mot de passse\" required>
                                               <!--div class=\"help-block text-right\"><a href=\"\" disabled>Oublie du mot de passe ?</a></div-->
                                </div>
                                <div class=\"form-group\">
                                    <button type=\"submit\" class=\"btn btn-primary btn-block\">Connection</button>
                                </div>
                           </form>
                       </div>
                       <div class=\"bottom text-center\">
                          Nouveau ? <a href=\"/amazonece/inscription.php\"><b>Inscription</b></a>
                       </div>";
                        }
                         ?>
                  </div>
            </li>
         </ul>
      </li>
   </ul>

</nav>

<script type="text/javascript">
   $(document).ready(function() {
      $(".loginToggle").click(function() {
         $("#login-dp").toggle();
      });
   });
</script>
