<?php

include_once('ConnectionMysqliDao.php');
require_once('../Exception/PDOException.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

error_reporting(E_ALL);
ini_set("display_errors", 1);

class UserConnectMysqliDAO extends ConnectionMysqliDao {


 public function addUser(User $user)
    {   
        try {
            $newConnect = new ConnexionMysqliDAO();
            $db = $newConnect->connect(); 

            $getId = $User->getId();
            $getPseudo = $User->getPseudo();
            $getEmail = $User->getEmail();
            $getPrenom = $User->getPrenom();
            $getPhoto = $User->getPhoto();
            $getMdp = $User->getMdp();
            $getProfil = $User->getProfil();

            $query = "INSERT INTO user VALUES (NULL,:pseudo,:email,:pseudo,:photo,:mdp,:profil)";           
            $stmt = $db->prepare($query); 
            
            $stmt->bindParam(':pseudo', $getPseudo);           
            $stmt->bindParam(':email', $getEmail);
            $stmt->bindParam(':prenom', $getPrenom);
            $stmt->bindParam(':photo', $getPhoto);
            $stmt->bindParam(':mdp', $getMdp);
            $stmt->bindParam(':profil', $getProfil);

            $stmt->execute();

            $db = null;
            $stmt = null;           
        } 
        catch (PDOException $e){
            echo 'Echec de la connexion : '.$e->getMessage();
        }         
    }

    function researchUserByMail(User $user) 
    {
        try {
            $newConnect = new ConnexionMysqliDAO();
            $db = $newConnect->connect(); 

            $query = "SELECT * FROM user WHERE :email = ?";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email);

            $stmt->execute();
            $data= $rs->fetchAll();
 
            $db = null;
            $stmt = null; 
            return $data;
        } 
        catch (mysqli_sql_exception $e) {
            throw new DaoSqlException($e->getMessage(), $e->getCode());
        }
    }
}

