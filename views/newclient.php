<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>

<form name ="formulaire_acheteur" method = "post" action = "saisie_newclient.php">
<div class="container">
  <div class="row">
      <div class="col">

  <div class="p-3 mb-2 bg-secondary text-white">Donnees Client</div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputnom">Nom</label>
      <input type="Nom" class="form-control" id="input_name" placeholder="Nom">
    </div>

      <div class="form-group col-md-6">
        <label for="inputprenom">Prenom</label>
        <input type="Prenom" class="form-control" name = "name" id ="name" placeholder="Prenom">
      </div>


  <div class="form-group">
    <label for="inputAddress">Addresse Ligne 1</label>
    <input type="text" class="form-control" name ="input_Address1" placeholder="Ex : 6 rue de Paris">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Addresse Ligne 2</label>
    <input type="text" class="form-control" name ="input_Address2" placeholder="Appartment, studio, etage ...">
  </div>
    <div class="form-group">
      <label for="inputCity">Ville</label>
      <input type="text" class="form-control" name ="input_City" placeholder = "ex: Nice">
    </div>
    <div class="form-group">
      <label for="inputCodepostal">Code Postal</label>
      <input type="text" class="form-control" name ="input_codepostal" placeholder = "ex: 75015">
    </div>

<div class="form-group">
  <div class="form-group col-md-8">
      <label for="inputState">Pays</label>
      <select id="input_State" class="form-control">
        <option selected>Choisir...</option>
        <option>France</option>
        <option>Belgique</option>
        <option>Suisse</option>
        <option>Allemagne</option>
        <option>Espagne</option>
        <option>Portugal</option>
        <option>Angleterre</option>
        <option>Irlande</option>
      </select>
        </div>
        </div>

      <div class="form-group col-md-6">
        <label for="input_tel">Telephone</label>
        <input type="Telephone" class="form-control" name="input_tel" placeholder="ex : 0662452331">
      </div>


      <div class="form-group col-md-6">
        <label for="input_mail">Mail</label>
        <input type="Mail" class="form-control" name="mail" placeholder="ex : Lea@edu.ece.fr">
      </div>

      <div class="form-group col-md-6">
        <label for="input_password">Mot de passe</label>
        <input type="password" class="form-control" name = "password" id="password" >
      </div>
</div>
</div>
    <div class="col">

    <div class="p-3 mb-2 bg-secondary text-white">Donnees Bancaires</div>

  <div class = "form-group col-md-6">
      Type de Carte <select type="text" name= type_carte class = "form-control">
<option value="" ></option>
<option value="MasterCard" >MasterCard</option>
<option value="Visa">Visa</option>
<option value="AmericanExpress">AmericanExpress</option>
<option value="Paypal">Paypal</option>
</select><br>
  </div>

  <div class = "form-group col-md-6">
  <label for ="inputnumerocartebleue">Numero carte bancaire</label>
   <input  class = "form-control" name="numero_carte" placeholder="ex : 1234..."/>
   </div>

  <div class="form-group col-md-6">
      <label for="inputcartebleue">Nom sur la carte bleue</label>
      <input  class="form-control" name="input_nomcb" placeholder="Nom sur la carte bancaire">
    </div>

    <div class="form-group col-md-6">
        <label for="inputdateexpiration">Date d'expiration</label>
        <input type="date" class="form-control" name="input_dateexpiration" placeholder="19/03/2021">
      </div>

    <div class = "form-group col-md-6">
  <label for = "iputcodesecurite">Code de Securite</label>
  <input class = "form-control" type = "password" name ="input_codesecurite"  maxlength = "3" placeholder="Cryptogramme" />
  <br>
  </div>

  <button type="submit" class="btn btn-primary">Valider</button>
  </div>
</form>

  </body>
  </html>
