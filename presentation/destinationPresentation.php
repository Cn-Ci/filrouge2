<?php



function html($title){ ?>
    <!DOCTYPE html>
        <html lang="fr">
        <head>
            <title><?php echo $title  ?></title>
            <meta charset="utf-8">
            <!-- BOOTSTRAP -->
            <link 
                rel="stylesheet" 
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
                integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" 
                crossorigin="anonymous" />
            <link 
                rel="stylesheet" 
                href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
                crossorigin="anonymous">
            
            <!-- CSS -->
            <link 
                rel="stylesheet" 
                type="text/css" 
                href="../mainStyle.css">
            <link 
                rel="stylesheet" 
                type="text/css" 
                href="../destinations.css">
            <link 
                rel="stylesheet" 
                type="text/css" 
                href="../footerStyle.css">
            <!-- TYPO -->
            <link 
                href="//db.onlinewebfonts.com/c/7a8bc7c29b5bcadb9510cca51210ac46?family=Sitka+Banner" 
                rel="stylesheet"
                type="text/css"/>
            <link 
                href="https://fonts.cdnfonts.com/css/caviar-dreams" 
                rel="stylesheet">
            <link 
                href="https://fonts.googleapis.com/css?family=Cinzel" 
                rel="stylesheet">
            <link 
                href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" 
                rel="stylesheet">
        </head>
        <body>
<?php }

function navbar(){ ?>
    <!-- Navbar -->
    <div class="container-fluid">
        <?php include '../navbar.php';?>
    </div>
    
    <div class="principale">
<?php }

function footer(){ ?>
<!-- fin de la d.iv destination $region -->
</div>
    <!-- fin de la d.iv class="principale" -->
    </div>
            <!-- ligne de séparation -->
            <hr class="hrsep">
                <?php include '../footer.php';?>
            </footer>

            <!-- JQUERY -->
            <script
                src         ="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity   ="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin ="anonymous">
            </script>

            <!-- JAVASCRIPT -->
            <script 
                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
                crossorigin="anonymous">
            </script>
            <script 
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
                crossorigin="anonymous">
            </script>
            <script 
                type="text/javascript" 
                src="../script.js">
            </script>
        </body>
    </html>
<?php }

function boutonFrance(){ ?>
        
            <!-- Image de la France -->
            <div id="les4img" class="col-6 offset-3 mb-2">
                <center>
                    <script src="../presentation/cmap/France-map.js"></script>
                    <script>francefree()</script>
                </center>
            </div>   
<?php }

function affichageDestination($destination, $region)
{ 
    $i=1; ?>

    <div id="<?php  echo $region ?>" class="align-items-center m-3">
        <?php foreach($destination as $dest){
            if($dest->getRegion() == $region){ ?>

                <!-- affichage de la destination -->
                <div class="<?php  echo $region.$i ?> row d-flex justify-content-center m-2 mb-4">
                    <div class="">
                        <div class="row">
                            <!-- image  -->
                            <div class="col-12 col-lg-4 mb-2">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode( $dest->getImage() ); ?>" class="img-fluid w-100" alt="Image descriptive de la region"/>
                            </div>
                            <!-- desription + atouts -->
                            <div class="col-12  col-lg-7 align-item-rigth text-justify">
                                <!-- titre en majuscule -->
                                <h4 class="mb-3 row d-flex justify-content-between">
                                    <div><?php echo strtoupper($dest->getLieu()) ?></div>
                                </h4>
                                <!-- intro et description -->
                                <p style="text-indent: 20px"><?php echo $dest->getPetiteDescription() ?></p>
                                </br> <p style="text-indent: 20px" class="font-weight-bold color-228b22" > <?php echo $dest->getDescription() ?></p>
                                <!-- en lire plus = les atouts -->
                                <div class="collapse multi-collapse" id="fermeture1">
                                    <div>
                                        <p id="fermeture1" style="text-indent: 20px"><?php echo $dest->getAtout1() ?></p>
                                        <p id="fermeture1" style="text-indent: 20px"><?php echo $dest->getAtout2() ?></p>
                                        <p id="fermeture1" style="text-indent: 20px"><?php echo $dest->getAtout3() ?></p>
                                    </div>
                                    <!-- les boutons -->
                                    <div class="row d-flex justify-content-around ">
                                    <?php 
                                         if(isset($_SESSION) && isset($_SESSION['id']) && $_SESSION['id']==$dest->getIdUser())
                                        {  
                                                    $maj=true;
                                                    buttonAjout($maj, $dest);
                                                ?>
                                            <div>
                                                <a href='../controller/controllerDestination.php?action=suppDestination&amp;id=<?php echo $dest->getIdDestination()?>'>
                                                    <button class='btn btn-outline-danger' value='Remove'>Supprimer</button>
                                                </a>
                                            </div> 
                                        <?php 
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plus text-right col-10 offset-1 mb-2">
                            <a  class="text-success" data-toggle="collapse" href="#fermeture1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">En lire plus</a>
                        </div>
                    </div>

                    <!-- lien forum + lien exploration -->
                    <div class="forumLien row col-12">
                        <div class="forum text-center col-10">
                            <a href ="<?php echo $dest->getExtraitForum() ?>"><button type="button" class="btn btn-outline-success color-228B22" target="_blank">Accéder au Forum</button> </a>
                        </div>
                        <div class="bouton text-center col-2"> 
                            <a href ="<?php echo $dest->getLien() ?>"><button type="button" class="btn btn-outline-success color-228B22" target="_blank">M'y rendre</button> </a>
                        </div>
                    </div>
                            
                    <?php $i++;
                // fermeture de la d.iv d'une destination
                echo "</div>";
            }
        }
}

function buttonAjout($maj=null, $dest=null)
{ ?>
        <div> 
            <?php $ajout= !$maj || $maj==null ?>
            <button id="<?php if($ajout){echo "AjoutDestination";}elseif($maj){echo "ModifDestination". $dest->getIdDestination();} ?>" class='<?php if($ajout){ echo "btn btn-outline-success";}elseif($maj==true){echo "btn btn-outline-danger";}else{}?>'> 
                <?php if($ajout){ echo "+ Ajouter un article ";}elseif($maj){echo "Modifier l'article";}else{};?>
            </button> 
        </div>
        
        <div id="<?php if($ajout){ echo "formAjoutDestination";}elseif($maj){echo "formModifDestination". $dest->getIdDestination();}else{};?>" class="container" style="display:none">
        
        <div class="globalConnexion text-center p-2 col-10 offset-1">
                <form action="../controller/controllerDestination.php?action=<?php if($ajout){echo "ajoutDestination";}elseif($maj){echo "modifDestination&id=".$dest->getIdDestination();} ?>" method="POST">
                    <!-- Region -->
                    <div class="form-group">
                        <div class="form-row align-items-center">
                            <div class="col-6">
                                <!-- lieu -->
                                <div class="form-group ">
                                    <label for="lieuDestination">Lieu </label>
                                    <input type="text" class="form-control" id="lieuDestination" name="lieu" value="<?php if($maj){echo $dest->getLieu() ;}?>" placeholder="Ville ou zone" alt="Saisissez le nom du lieu que vous souhaitez faire découvrir">
                                </div>
                            
                                <div class="form-group ">
                                    <label for="selectRegion"><?php if($ajout){ echo "Choisissez une région de France";}elseif($maj==true){echo $dest->getRegion();}else{};?></label>
                                    <select class="form-control" id="selectRegion" name="region">
                                        <option>Auvergne-Rhône-Alpes</option>
                                        <option>Bourgogne-Franche-Comté</option>
                                        <option>Bretagne</option>
                                        <option>Centre</option>
                                        <option>Corse</option>
                                        <option>Grand-Est</option>
                                        <option>Hauts-de-France</option>
                                        <option>Ile-de-France</option>
                                        <option>Normandie</option>
                                        <option>Nouvelle-Aquitaine</option>
                                        <option>Occitanie</option>
                                        <option>Pays-de-Loire</option>
                                        <option>Provence-Alpes-Côte-d-Azur</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="col-6 form-group  ">
                                <div class="col-10 offset-1 mb-3">
                                    <?php if($maj==true){ ?>
                                         <img id='imageDestinationModif' src='data:image/jpeg;base64,<?php echo base64_encode( $dest->getImage()) ?>' />
                                    <?php } ?>
                                </div>
                                <div class="col-10 offset-1">
                                <?php if(!$maj){ ?>
                                    <label for="photoDestination">Photo
                                        <span><input type="file" name="image" placeholder="bla" class="form-control h-100 " id="photoDestination" alt="Veillez téléverser une photo illustrant le lieu proposé" ><span>
                                    </label>
                                <?php }elseif($maj==true){ ?>
                                    <!-- bouton pour le modal -->
                                    <div class="col-2 offset-10">
                                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#formulaireModifPhoto">
                                            <img id="penUpdateDestination" src="../img/penUpdate.png">
                                        </button>
                                    </div>
                                    <!-- modal pour modifier l'image de destination -->
                                    <div class="modal fade" id="formulaireModifPhoto" tabindex="-1" role="dialog" aria-labelledby="ModificationdelaPhoto" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="TitreModificationdelaPhoto">Modification de l'image qui illustre la destination</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo '../controller/controllerDestination.php?action=modifDestinationPhoto?id=id='.$dest->getIdDestination() ?>" method="POST">
                                                    <label for="majPhotoDestination" > Nouvelle photo :</label>
                                                        <span><input type="file" name="image" placeholder="bla" class="form-control h-100 " id="majPhotoDestination" alt="Veillez téléverser une photo illustrant le lieu proposé" /><span>
                                                    
                                                    <button type="submit" class="btn btn-outline-primary mt-5">Enregistrer</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer align-items-center">
                                                <img id="logoModifDestination" src="../img/logoMobiliT.png">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>               
                    
                    <!-- Petite description -->
                    <div class="form-group">
                        <label for="introDestination">Description introductive</label>
                        <input type="text" class="form-control" name="petiteDescription" minlength="10" maxlength="255" id="introDestination" value="<?php if($maj){echo $dest->getPetiteDescription() ;}?>" placeholder="Veillez saisir un texte court d'introduction au lieu" alt="Veillez saisir une petite introduction du lieu présenté" >
                    </div>
                    <div class="form-group">
                        <label for="descriptionDestination">Description du lieu</label>
                        <input type="text" class="form-control" name="description" minlength="100" maxlength="500" id="descriptionDestination" value="<?php if($maj){echo $dest->getDescription() ;}?>" placeholder="Veillez décrire plus précisémment le lieu a visiter" alt="Veillez saisir description précise et détaillée du lieu à visiter" required>
                    </div>
                    <div class="form-group">
                        <label for="atout1Destination">Premier atout</label>
                        <input type="text" class="form-control" name="atout1" minlength="100" maxlength="300" id="atout1Destination" value="<?php if($maj){echo $dest->getAtout1() ;}?>" placeholder="Premier atout du lieu proposé" alt="Présenter le premier atout du lieu proposé en visite" required>
                    </div>
                    <div class="form-group">
                        <label for="atout2Destination">Deuxième atout</label>
                        <input type="text" class="form-control" name="atout2" minlength="100" maxlength="300" id="atout2Destination" value="<?php if($maj){echo $dest->getAtout2() ;}?>" placeholder="Deuxième atout du lieu proposé" alt="Présenter le deuxième atout du lieu proposé en visite" required>
                    </div>
                    <div class="form-group">
                        <label for="atout3Destination">Deuxième atout</label>
                        <input type="text" class="form-control" name="atout3" minlength="100" maxlength="300" id="atout3Destination" value="<?php if($maj){echo $dest->getAtout3() ;}?>" placeholder="Troisième atout du lieu proposé" alt="Présenter le troisième atout du lieu proposé en visite" >
                    </div>
                    <div class="form-group">
                        <label for="lienSiteWeb">Lien vers un site web </label>
                        <input type="text" class="form-control" name="lien" maxlength="300" id="lienSiteWeb" value="<?php if($maj){echo $dest->getLien() ;}?>" placeholder="ex : www.handitourisme-champagne.org" alt="Veuillez saisir un lien pour accéder à plus d'informations pour cette destination">
                    </div>
                    <div class="form-group">
                        <label for="lienExtraitForum">Lien vers un extrait du forum </label>
                        <input type="text" class="form-control" name="extraitForum" maxlength="300" id="lienExtraitForum" value="<?php if($maj){echo $dest->getExtraitForum() ;}?>" placeholder="ex : www.handitourisme-champagne.org" alt="Veuillez saisir un lien pour accéder à un sujet du forum pertinent">
                    </div>
                    <button type="submit" class="btn btn-primary col-2 offset-5" style="background-color: #228b22;border: black;"><?php if($ajout){ echo 'Ajouter" ';}elseif($maj){echo 'Modifier';}else{};?></button>
                </form>
            </div>
        </div>
    
<?php } ?>
