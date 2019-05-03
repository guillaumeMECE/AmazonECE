<!DOCTYPE html>
<html lang="en">
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

require_once("./config/db.php");
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
         <img src=\"/amazonece/".$row["photo"]."\" style=\"width: 16rem;\"class=\"img-thumbnail\" alt=>
         <div style=\"color:#af4448 \">".$row["auteur"]."</div>
         <div style=\"color:#af4448 \">".$row["nom"]."</div>

         <br>
          <a href=\"./article.php?cat=music&id=".$row["id_music"]."\"class=\"btn btn-primary\">Aperçu</a>
      </div>
      <div class=\"col-3 col-best-sell\">
      <img src=\"/amazonece/".$row1["photo"]."\"style=\"width: 16rem;\" class=\"img-thumbnail\">
      <div style=\"color:#af4448\">".$row1["auteur"]."</div>
      <div  style=\"color:#af4448\">".$row1["title"]."</div>
      <br>
        <a href=\"./article.php?cat=book&id=".$row1["id_book"]."\"class=\"btn btn-primary\">Aperçu</a>
      </div>
      <div class=\"col-3 col-best-sell\">
         <img src=\"/amazonece/".$row2["photo"]."\" style=\"width: 16rem;\" class=\"img-thumbnail\">
      <div style=\"color:#af4448\">\"".$row2["marque"]."\"</div>
        <div style=\"color:#af4448\">\"".$row2["nom"]."</div>
        <br>
          <a href=\"./article.php?cat=sports&id=".$row2["id_sl"]."\"class=\"btn btn-primary\">Aperçu</a>
      </div>
      <div class=\"col-3 col-best-sell\">
         <img src=\"/amazonece/".$row3["photo"]."\" class=\"img-thumbnail\" style=\"width: 16rem;\">
      <div style=\"color:#af4448\">".$row3["marque"]."</div>
      <div style=\"color:#af4448\">".$row3["nom"]."</div>
      <br>
        <a href=\"./article.php?cat=cloth&id=".$row3["id_vetement"]."\"class=\"btn btn-primary\">Aperçu</a>
      </div>
   </div>
</div>";
mysqli_close($conn);

 ?>
 <body>
   </html>
