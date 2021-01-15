<?php
    require_once(__DIR__.'/../dao/DestinationPDODao.php');
    require_once(__DIR__.'/../service/ServiceException.php');
    require_once(__DIR__.'/../service/interfaceDestinationService.php');
    require_once(__DIR__.'/../service/interfaceCommunService.php');


    

    class ServiceDestination implements interfaceDestinationService, communService {
        public function serviceAddDestination($id=null, string $region, string $lieu, string $image, string $petiteDescription, string $description,string $atout1, string $atout2, string $atout3,string $lien, string $extraitForum, string $idUser){
            $dest = new Destination();
            $dest->setRegion($region)->setLieu($lieu)->setImage($image)->setPetiteDescription($petiteDescription)->setDescription($description)->setAtout1($atout1)->setAtout2($atout2)->setAtout3($atout3)->setLien($lien)->setExtraitForum($extraitForum)->setIdUser($idUser);
            try {
                DestinationPDODao::add($dest);
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public  function serviceResearchBy(Int $idDestination) :?Destination {
            try {
                $data = DestinationPDODao::researchBy($idDestination);
                return $data;
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public  function serviceReseachAll() {
            try {
                $data = DestinationPDODao::research();
                return $data;
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public  function serviceResearchByRegion(string $nomRegion) : ?array {
            try {
                $data = DestinationPDODao::researchByRegion($nomRegion);
                return $data;
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }


        public  function serviceUpdateDestination(int $idDestination, string $region, string $lieu, ?string $image, string $petiteDescription, string $description,string $atout1, string $atout2, string $atout3,string $lien, string $extraitForum) {
            $destinationToModify = new Destination();
            if($image==null){
                $data= DestinationPDODao::researchBy($idDestination);
                $image= $data->getImage();
                echo"yapadimage";
  
            }
            
            
            $destinationToModify->setRegion($region)->setLieu($lieu)->setPetiteDescription($petiteDescription)->setDescription($description)->setAtout1($atout1)->setAtout2($atout2)->setAtout3($atout3)->setLien($lien)->setExtraitForum($extraitForum);
            var_dump($destinationToModify);
            echo'service';
            try {
                $rs=DestinationPDODao::update($destinationToModify, $idDestination);
                return $rs;
            } catch (DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }

        public  function serviceDelete(Int $idDestination) {
            try {    
                DestinationPDODao::delete($idDestination);
            } catch(DaoSqlException $ServiceException) {
                throw new ServiceException($ServiceException->getMessage(), $ServiceException->getCode());
            }
        }
    }
?>