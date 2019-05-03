<?php session_start();

echo $_SESSION["type"];

   if (isset($_GET["cat"]) and isset($_GET["id"]) and isset($_GET["add"])=="true") {

       require_once("../config/db.php");

       // Create connection

       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

       // Check connection

       if (!$conn) {

           die("Connection failed: " . mysqli_connect_error());

       }

       switch ($_GET["cat"]) {

         case 'music':

         // make the request to the DATABASE

         $sql = "SELECT *

                FROM music

                WHERE id_music = '".$_GET["id"]."' ;";

         $result = mysqli_query($conn, $sql); // send the query

         $row = mysqli_fetch_assoc($result);

          if (mysqli_num_rows($result) > 0) {

              $sql2 = "SELECT nombre_cart

                   FROM cart

                   WHERE id_produit = '".$row["id_music"]."'

                   AND type = 'music'

                   AND user_id = '".$_SESSION["id"]."';";

              $result2 = mysqli_query($conn, $sql2); // send the query

              $row2 = mysqli_fetch_assoc($result2);



              if (mysqli_num_rows($result2) > 0) {
                if($row["nombre"]>0)
                 {
                  $newNombre=$row2["nombre_cart"]+1;

                  $sql3 = "UPDATE cart SET nombre_cart='".$newNombre."' WHERE  id_produit = '".$row["id_music"]."' AND type = 'music';";

                  if (mysqli_query($conn, $sql3)) {

                      echo "New record created successfully UPDATE";

                  } else {

                      echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);

                  }
                }
                else
                {
                $rupture = false ;
                }

              } else {

                  if($row["nombre"]>0)
                  {
                  $sql2 = "INSERT INTO cart(id_produit, user_id,type,nombre_cart,prix_unit,type_user) VALUES ('".$_GET["id"]."','".$_SESSION["id"]."','music','1','".$row["prix"]."','".$_SESSION["type"]."');";

                  if (mysqli_query($conn, $sql2)) {

                      echo "New record created successfully INSERT";

                  } else {

                      echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);

                  }
                }

              }

          } else {

              echo "<div class=\"alert alert-danger\" role=\"alert\">

            Article Introuvable

            </div>";

          }

            break;

         case 'book':

         // make the request to the DATABASE

         $sql = "SELECT *

                FROM book

                WHERE id_book = '".$_GET["id"]."' ;";

         $result = mysqli_query($conn, $sql); // send the query

         $row = mysqli_fetch_assoc($result);

          if (mysqli_num_rows($result) > 0) {

              $sql2 = "SELECT nombre_cart

                   FROM cart

                   WHERE id_produit = '".$row["id_book"]."'

                   AND type = 'book'

                   AND user_id = '".$_SESSION["id"]."';";

              $result2 = mysqli_query($conn, $sql2); // send the query

              $row2 = mysqli_fetch_assoc($result2);



              if (mysqli_num_rows($result2) > 0) {
                if($row["nombre"]>0)
                {
                  $newNombre=$row2["nombre_cart"]+1;

                  $sql3 = "UPDATE cart SET nombre_cart='".$newNombre."' WHERE  id_produit = '".$row["id_book"]."' AND type = 'book';";

                  if (mysqli_query($conn, $sql3)) {

                      echo "New record created successfully UPDATE";

                  } else {

                      echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);

                  }
                }
                else
                {
                  $rupture =false;
                }

              } else {

                if($row["nombre"]>0)
                {
                  $sql2 = "INSERT INTO cart(id_produit, user_id,type,nombre_cart,prix_unit,type_user) VALUES ('".$_GET["id"]."','".$_SESSION["id"]."','book','1','".$row["prix"]."','".$_SESSION["type"]."');";

                  if (mysqli_query($conn, $sql2)) {

                      echo "New record created successfully INSERT";

                  } else {

                      echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                  }

              }
            }

          } else {

              echo "<div class=\"alert alert-danger\" role=\"alert\">

            Article Introuvable

            </div>";

          }

            break;



            case 'cloth':

            // make the request to the DATABASE

            $sql = "SELECT *

                   FROM vetements

                   WHERE id_vetement = '".$_GET["id"]."' ;";

            $result = mysqli_query($conn, $sql); // send the query

            $row = mysqli_fetch_assoc($result);

             if (mysqli_num_rows($result) > 0) {

                 $sql2 = "SELECT nombre_cart

                      FROM cart

                      WHERE id_produit = '".$row["id_vetement"]."'

                      AND type = 'cloth'

                      AND user_id = '".$_SESSION["id"]."';";

                 $result2 = mysqli_query($conn, $sql2); // send the query

                 $row2 = mysqli_fetch_assoc($result2);



                 if (mysqli_num_rows($result2) > 0) {
                   if($row["nombre"]>0)
                   {

                     $newNombre=$row2["nombre_cart"]+1;

                     $sql3 = "UPDATE cart SET nombre_cart='".$newNombre."' WHERE  id_produit = '".$row["id_vetement"]."' AND type = 'cloth';";

                     if (mysqli_query($conn, $sql3)) {

                         echo "New record created successfully UPDATE";

                     } else {

                         echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);

                     }
                   }
                   else
                   {
                     $rupture =false;
                   }

                 } else {
                   if($row["nombre"]>0)
                   {
                     $sql2 = "INSERT INTO cart(id_produit, user_id,type,nombre_cart,prix_unit,type_user) VALUES ('".$_GET["id"]."','".$_SESSION["id"]."','cloth','1','".$row["prix"]."','".$_SESSION["type"]."');";

                     if (mysqli_query($conn, $sql2)) {

                         echo "New record created successfully INSERT";

                     } else {

                         echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);

                     }

                 }
               }

             } else {

                 echo "<div class=\"alert alert-danger\" role=\"alert\">

               Article Introuvable

               </div>";

             }

               break;



               case 'sports':

               // make the request to the DATABASE

               $sql = "SELECT *

                      FROM sportsloisirs

                      WHERE id_sl = '".$_GET["id"]."' ;";

               $result = mysqli_query($conn, $sql); // send the query

               $row = mysqli_fetch_assoc($result);

                if (mysqli_num_rows($result) > 0) {

                    $sql2 = "SELECT nombre_cart

                         FROM cart

                         WHERE id_produit = '".$row["id_sl"]."'

                         AND type = 'sports'

                         AND user_id = '".$_SESSION["id"]."';";

                    $result2 = mysqli_query($conn, $sql2); // send the query

                    $row2 = mysqli_fetch_assoc($result2);



                    if (mysqli_num_rows($result2) > 0) {
                      if($row["nombre"]>0)
                      {


                        $newNombre=$row2["nombre_cart"]+1;

                        $sql3 = "UPDATE cart SET nombre_cart='".$newNombre."' WHERE  id_produit = '".$row["id_sl"]."' AND type = 'sports';";

                        if (mysqli_query($conn, $sql3)) {

                            echo "New record created successfully UPDATE";

                        } else {

                            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);

                        }
                      }
                      else
                      {
                        $rupture =false;

                      }

                    } else {
                      if($row["nombre"]>0)
                      {
                        $sql2 = "INSERT INTO cart(id_produit, user_id,type,nombre_cart,prix_unit,type_user) VALUES ('".$_GET["id"]."','".$_SESSION["id"]."','sports','1','".$row["prix"]."','".$_SESSION["type"]."');";

                        if (mysqli_query($conn, $sql2)) {

                            echo "New record created successfully INSERT";

                        } else {

                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);

                        }

                    }
                  }

                } else {

                    echo "<div class=\"alert alert-danger\" role=\"alert\">

                  Article Introuvable

                  </div>";

                }

                  break;

         default:

            header("location:../index.php");

            break;

    }

   } else {

       header("location:../index.php");

   }

   if($row["nombre"]<=0)
{

  header("location:../panier.php?rupture=true");

}
else
{
  header("location:../panier.php");
}
