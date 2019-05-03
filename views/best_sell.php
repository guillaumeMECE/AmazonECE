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

require_once("../config/db.php");
// Create connection

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection

if (!$conn) {

   die("Connection failed: " . mysqli_connect_error());

}
//$sql = "SELECT *, MAX(nbvente) FROM music;";
$sql = "SELECT *
FROM music
WHERE nbvente=(
    SELECT max(nbvente) FROM music);";

$sql1 = "SELECT *
FROM book
WHERE nbvente=(
    SELECT max(nbvente) FROM book);";

$sql2 = "SELECT *
FROM sportsloisirs
WHERE nbvente=(
    SELECT max(nbvente) FROM sportsloisirs);";

$sql3 = "SELECT *
FROM vetements
WHERE nbvente=(
    SELECT max(nbvente) FROM vetements);";

$result1=mysqli_query($conn, $sql); // send the query
$result2=mysqli_query($conn, $sql1);
$result3 =mysqli_query($conn, $sql2);
$result4 =mysqli_query($conn, $sql3);

 $row = mysqli_fetch_assoc($result1);
 $row1 = mysqli_fetch_assoc($result2);
 $row2 = mysqli_fetch_assoc($result3);
 $row3 = mysqli_fetch_assoc($result4);

echo"
<div class=\"container my-5 py-3 shadow\" id=\"best-sell\" style=\"background:#ffcdd2 \">
   <h2 style=\"color:#af4448\">Ventes Flash</h2>
   <div class=\"row\">
      <div class=\"col-3 col-best-sell\">
         <img src=\"/amazonece/".$row["photo"]."\" class=\"img-thumbnail\"alt=\"".$row["nom"]."\">
         <div id=\"comment-in-img\">".$row["auteur"]."</div>
         <div id=\"comment-in-img\">".$row["nom"]."</div>
      </div>
      <div class=\"col-3 col-best-sell\">
      <img src=\"/amazonece/".$row1["photo"]."\" class=\"img-thumbnail\" alt=\"".$row1["title"]."\">
      <div id=\"comment-in-img\">".$row1["auteur"]."</div>
      <div id=\"comment-in-img\">".$row1["title"]."</div>
      </div>
      <div class=\"col-3 col-best-sell\">
         <img src=\"/amazonece/".$row2["photo"]."\" class=\"img-thumbnail\"alt=\"".$row2["nom"]."\">
      <div id=\"comment-in-img\">".$row2["marque"]."</div>
        <div id=\"comment-in-img\">".$row2["nom"]."</div>
      </div>
      <div class=\"col-3 col-best-sell\">
         <img src=\"/amazonece/".$row3["photo"]."\" class=\"img-thumbnail\"alt=\"".$row3["nom"]."\">
      <div id=\"comment-in-img\">".$row3["marque"]."</div>
      <div id=\"comment-in-img\">".$row3["nom"]."</div>
      </div>
   </div>
</div>";
mysqli_close($conn);

 ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </html>
