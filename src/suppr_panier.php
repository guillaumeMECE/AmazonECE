<?php
session_start();
require_once("../config/db.php");
function suppr_product()
{
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo $_POST['supprAll'];
    //if ($_POST['supprAll']) {
    // SQL request
    // $query="DELETE FROM cart
    //      WHERE id_user='".$_SESSION['id']."'";
    /* if (mysqli_query($conn, $query)) {
         echo "New record created successfully UPDATE";
     } else {
         echo "Error: " . $query . "<br>" . mysqli_error($query);
     }*/
    // } else {
    // SQL request
    $sql = "SELECT id_cart
         FROM cart
         WHERE user_id = '" . $_SESSION['id'] . "';";

    $result = mysqli_query($conn, $sql); // send the query
    while ($row = mysqli_fetch_assoc($result)) {
        if (isset($_POST[$row["id_cart"]])) {
            if ($_POST[$row["id_cart"]]) { // if product check
                $query="DELETE FROM cart
                WHERE id_cart='".$row["id_cart"]."'";
                if (mysqli_query($conn, $query)) {
                    echo "New record created successfully UPDATE";
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($query);
                }
            }
        }
    }
    // }
}
if (isset($_POST['submit'])) {
    suppr_product();
    header("location:/amazonece/panier");
}
