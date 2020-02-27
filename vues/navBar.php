<?php 
require_once("ressources/header.php");
?>

<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="./index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><img style='height : 23px; width:auto;' src='images/logoCesi.jpg' /></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
  <div class="w3-dropdown-hover w3-right">
  <button class="w3-button w3-padding-large" title="Gestion du compte">
  <i class="fa fa-user"></i>
    </button>  
  <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
  <a href="./gestionProfil.php" class="w3-bar-item w3-button">Modifier mon profil</a>
  <form action='../controleurs/EleveControlleur.php' method='POST'>
      <input type='hidden' name='fonctionValeur' value='deconnexion' />
        <input type='submit'  value='Se déconnecter' class="w3-bar-item w3-button"> 
  </form>
  
  </div>
</div>
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Mon profil</a>
</div>