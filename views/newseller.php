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
<div class="p-3 mb-2 bg-secondary text-white">Inscription nouveau vendeur</div>
<form name ="formulaire_vendeur" method = "post" action = "saisie_newseller.php">
  <div class="container">
    <div class="row">
      <div class="col">
              <label for="nom">Nom</label>
              <input type="Nom" class="form-control"name="nom">
      </div>
      <div class="col">
        <label for="prenom">Prenom</label>
        <input type="prenom" class="form-control" name="prenom">
      </div>
    </div>
    <div class="row">
    <div class="col">
      <label for="mail">Mail</label>
      <input type="email" class="form-control"name="mail" placeholder ="ex : juliette.dubois@edu.ece.fr">
    </div>
    <div class="col">
      <label for="password">Mot de Passe</label>
      <input type="password" class="form-control"name="password">
    </div>
  </div>
  <div class="row">
  <div class="col">
    <br> <br>
  <div class="custom-file">
  <label class="custom-file-label" for="photo">Photo de Profil</label><br />
    <input type="file" class="custom-file-input" name="photo" id="photo" /><br />
</div>
</div>
  <div class="col">
    <br><br>
    <div class="custom-file">
    <label class="custom-file-label" for="image">Image de fond</label>
    <input type="file" class="custom-file-input" name = "image" id="customFile">
  </div>
  </div>
</div>
<br><br>
<button type="submit" class="btn btn-primary">M'inscrire</button>
</div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
