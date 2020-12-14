<?php


//session_start();

include_once("../inscription.php");
include_once("../connexion.php");
include_once('../service/ServiceException.php');  
include_once('../service/UserConnectService.php');  

if (isset($_GET['action']) && !empty($_GET['action']))
{    
    echo "test 1";
    if ($_GET['action']=="afficherInscription")   
    {
        try {
            echo "test 2";
            htmlInscription();
            inscription();
        } 
        catch (ServiceException $se) {
            echo "test 3";
            html();
            inscription(10000);
        } 
    } 
    elseif ($_GET['action']=="inscription")   
    { 
        echo "test 4";
        //var_dump ($_POST['username']);
        if (isset($_POST['inscrire']) &&
        isset($_POST['email'] ))
        {  
            echo "test 5.0";
            try {
            echo "test 5.1";
            $user = new User;
            $user->setPseudo($_POST['pseudo'])
                ->setEmail($_POST['email'])
                ->setNom($_POST['nom'])
                ->setPrenom($_POST['prenom'])
                ->setPhoto($_POST['photo'])
                ->setMdp($_POST['password']);

            UserConnectService::UserVerif($user,($_POST['email']));
            echo "test 5.2";
            html();
            inscription();
            }
            catch (ServiceException $se){
            echo "test 6";
            html();
            inscription($se->getMessage(), $se->getCode());
            }   
        }
    }   
    elseif ($_GET['action'] == "connexion" )
    {
        try {
            echo "test 7";
            htmlConnection();
            connection();
        } 
        catch (ServiceException $se) {
            echo "test 8";
            htmlConnection();
            connection();
        }  
    }
    elseif (($_GET['action'] == "connect"))
    {
        echo "test 9";
        if (isset($_POST['connecter']) &&
        isset($_POST['username'] ))
        {
            try {
                $user = new User;
                $user->setEmail($_POST['username'])
                    ->setMdp($_POST['password']);
                        
                    UserConnectService::userConnect($_GET['username']);

                if (UserConnectService::userConnect($user))
                {
                    echo "test 10";
                    html();
                    inscription();
                }
                else 
                {
                    echo "test 11";
                    html();
                    inscription();
                }  
            }
            catch (ServiceException $se) {
                echo "test 12";
                html();
                inscription();
            }  
        }
    }     
}
else   
{
    try {
        echo "test 13";
        html();
        inscription();
    } 
    catch (ServiceException $se) {
        echo "test 14";
        html();
        inscription();
    } 
} 

?>