<?php 
    require_once(__DIR__.'/DaoSqlException.php');
    require_once(__DIR__.'/ConnectionMysqliDao.php');
    require_once(__DIR__.'/interfaceDao.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class PersonnelSqliDAO  {
        public function add(Object $personnel) :Void {
            $nom    = $personnel->getNom();
            $prenom = $personnel->getPrenom();
            $emp    = $personnel->getEmploi();
            $desc   = $personnel->getDescription();
            $photo  = $personnel->getPhoto();
            $fb     = $personnel->getFbLink();
            $tw     = $personnel->getTwLink();
            $li     = $personnel->getLiLink();

            //* CONNECT DB
            $db = ConnectionMysqliDao::connect();   

            //* ADD   
            try {
                $addRequest = $db->prepare("INSERT INTO personnel (id, nom, prenom, emploi, description, photo, facebookLink, twitterLink, linkedinLink) VALUES (NULL, :nom, :prenom, :emp, :description, :photo, :fb, :tw, :li");
                $addRequest->execute(array(
                    ":nom"         => $nom,
                    ":prenom"      => $prenom,
                    ":emp"         => $emp,
                    ":description" => $desc,
                    ":photo"       => $photo,
                    ":fb"          => $fb,
                    ":tw"          => $tw,
                    ":li"          => $li));
            } catch (PDOException $DaoException) {
                throw new DaoSqlException($DaoException->getMessage(), $DaoException->getCode());
            } finally {
                
            }
        }
         
        public function searchBy(String $id) :?Array {
            //* CONNECT DB
            $db = ConnectionMysqliDao::connect();
            //* REQUETE SQL SEARCH BY ID
            try {
                $searchByRequest = $db->prepare("SELECT * FROM personnel WHERE id= :id");
                $searchByRequest->execute(array(
                    ":id" => $id));
                $result   = $searchByRequest->get_result();
                $data     = $result->fetch_array(MYSQLI_ASSOC);
            } catch (PDOException $DaoException) {
                throw new DaoSqlException($DaoException->getMessage(), $DaoException->getCode());
            } finally {
                $result->free();
                $db->close();
    
                return $data;
            }
        }
    }
?> 