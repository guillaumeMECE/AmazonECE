<?php
// include the configs / constants for the database connection
require_once("../config/db.php");


function delete_product()
{
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    switch ($_POST["cat"]) {
    case 'book':
    $sql ="DELETE FROM book
    WHERE id_book = '" . $_POST["id"] . "';";
       break;

    case 'music':
    $sql ="DELETE FROM music
  WHERE id_music = '" . $_POST["id"] . "';";
       break;

    case 'cloth':
    $sql ="DELETE FROM vetements
  WHERE id_vetement = '" . $_POST["id"] . "';";
       break;

    case 'sports':
       $sql ="DELETE FROM sportsloisirs
        WHERE id_sl = '" . $_POST["id"] . "';";
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
    if ($_POST['submit']="supprimer") {
        delete_product();
    } elseif ($_POST['submit']="ajouter") {
        delete_product(); //to remove
    }
    header("location:/amazonece/admin_manage_product");
}
