<?php function htmlUser(){
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/connexionStyle.css">
    <link rel="stylesheet" href="../css/inscriptionStyle.css">
    <title>Formulaire</title>
</head>
<body>
<?php 
}
function inscription($errorCode=null){
    if($errorCode && $errorCode == 1062){
        echo "<center><div class='alert alert-danger'> Cet utilisateur existe déjà ! !</div></center>";
    }
    elseif($errorCode && $errorCode == 23005){
        echo "<center><div class='alert alert-danger'> Erreur lors de l'affichage de la page d'inscription ! !</div></center>";
    }
?>
    <form class="tableau text-center m-2" action="../controller/controllerUserConnect.php?action=inscription" method="post">
        <h3 class="col titre mt-5 mb-5">Formulaire d'inscription</h3>
        <div class="mail col col-sm-5">
            <input required class="col col-4 text-center form-control-plaintext" type="text" name="pseudo"  placeholder="Saisir votre pseudo"> <br/>
        </div>
        <div class="mail col col-sm-5">
            <input required class="col col-4 text-center form-control-plaintext" type="email" name="email"  placeholder="Saisir votre email"> <br/>
        </div>
        <div class="mail col col-sm-5">
            <input required class="col col-4 text-center form-control-plaintext" type="text" name="nom"  placeholder="Saisir votre nom"> <br/>
        </div>
        <div class="mail col col-sm-5">
            <input required class="col col-4 text-center form-control-plaintext" type="text" name="prenom"  placeholder="Saisir votre prenom"> <br/>
        </div>   
        <div class="mail col align-items-center text-center col-sm-5">
            <input requided class="col col-4 text-center form-control-plaintext" type="password" name="password" placeholder="Saisir votre mot de passe"> <br/>
            <hr>
        </div>
        <div class="fichier col col-sm-5">
            <input requided class="col col-4 text-center form-control-plaintext" type="file" name="photo" placeholder="Selectionner votre photo ci dessous"> <br/>
            <hr>
        </div>    
            <button class="btnConnexion col col-lg-2 text-center btn btn-primary mt-3" type="submit" name="inscrire">S'inscrire</button>    
    </form>
    <div class="row text-center">
        <a href='../controller/controllerUserConnect.php?action=connexion'>
            <button class='btnConnexion col col-lg-2 text-center btn btn-primary mb-4'>Se connecter</button>
        </a>
        <a href='../main.php'>
            <button type="submit" class="retour col col-lg-4 text-center m-2 ">Retour à la page d'accueil</button>           
        </a>
    </div>
<?php
}

function connection(){
    ?>
        <form class="tableau text-center m-5" action="../controller/controllerUserConnect.php?action=connect" method="post">
            <h3 class="titre m-3">Connexion</h3>
            <div class="mail col-sm-5">
                <input required class="col-4 text-center form-control-plaintext" type="email" name="email"  placeholder="Saisir votre email"> <br/>
                <hr class="m-0">
            </div>
            <div class="mail col-sm-5 mt-2">
                <input requided class="col-4 col-lg-2 text-center form-control-plaintext" type="password" name="password" placeholder="Saisir votre mdp"> <br/>
            </div>
            <button class="btnInscription col-4 col-lg-3 text-center btn btn-primary " type="submit" name="connecter" >Connexion</button>    
        </form>
        <div class="text-center">
            <a href='../navbar.php'>
                <button type="submit" class="retour col-4 text-center btn btn-dark m-2 ">Retour à la page d'accueil</button>
            </a>
        </div>
<?php
}
?>   

</body>
</html>