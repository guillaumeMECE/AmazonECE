<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>
<div class="p-3 mb-2 bg-secondary text-white">Nouvel Administrateur</div>
<form name ="formulaire_admin" method = "post" action = "saisie_newadmin.php">
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
  <input type="file" class="custom-file-input" name = "photo" id="customFile">
  <label class="custom-file-label" for="photo">Photo de profil</label>
</div>
</div>
  <div class="col">
    <br><br>
    <div class="custom-file">
    <input type="file" class="custom-file-input" name = "image" id="customFile">
    <label class="custom-file-label" for="image">Image de fond</label>
  </div>
  </div>
</div>
<br><br>
<button type="submit" class="btn btn-primary">M'inscrire</button>
</div>
</form>
