
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="View/entreprises.css">
</head>

<body>
<div class="choose">
      <select name="sort" id="sort-by">
        <option value=""><p>Sort by</p></option>
        <option value="alph">A-Z</option>
        <option value="-alph">Z-A</option>
        <option value="age">Age</option>
    </select>   
    </div>

    
    <div>
    <table id='empTable' class='dataTable'><tr>
      <tr>
      <th><h2>Compagny Name</h2></th>
      <th><h2>Compagny Location</h2></th>
      <th><h2>Evaluation</h2></th>
      <th><h2>Trainee Number</h2></th>
      <th><h2>Description</h2></th>
      <th><h2>Id Secteur</h2></th>
      </tr>

      <?php $this->_t= 'Industries';
      foreach($industries as $industries): ?>
      <tr><td><h2><?= $industries->id_entreprise() ?></h2></td>
      <td><h2><?= $industries->nom_secteur() ?></h2></td>
      <td><h2><?= $industries->lieu_entreprise() ?></h2></td>
      <td><h2><?= $industries->evalMoy_entreprise() ?></h2></td>
      <td><h2><?= $industries->nbStagiaire_entreprise() ?></h2></td>
      <td><h2><?= $industries->description_entreprise() ?></h2></td>
      
      <?php endforeach; ?>
      </tr></table>
    </div>
  
    <div class="button_a">
      <button id="adder">Add</button>
      <form action="./?url=industries/formupdate" method="POST">
      <input type="text" class="getbyid" id="id_entreprise" name="id_entreprise" placeholder="Enter Industrie ID to Update">
      <button id="updater" class="update">Update</button>
      </form>

      <form action="./?url=industries/delete" method="POST">
      <input type="text" class="getbyid" id="id_entreprise" name="id_entreprise" placeholder="Enter Industrie ID to Delete">
      <button id="deleter" class="delete">Delete</button>
      </form>
    </div>

<script src="View/ViewIndustries.js">
</body>