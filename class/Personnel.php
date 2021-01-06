<?php 
    class Personnel {
        private $nom;
        private $prenom;
        private $emploi;
        private $description;
        private $fbLink;
        private $twLink;
        private $liLink;

        public function getNom() :String {
            return $this->nom;
        }
        public function setNom($nom) :Self {
            $this->nom = $nom;
            return $this;
        }

        public function getPrenom() :String {
            return $this->prenom;
        }
        public function setPrenom($prenom) :Self {
            $this->prenom = $prenom;
            return $this;
        }

        public function getEmploi() :String {
            return $this->emploi;
        }
        public function setEmploi($emploi) :Self {
            $this->emploi = $emploi;
            return $this;
        }

        public function getDescription() :String {
            return $this->description;
        }
        public function setDescription($description) :Self {
            $this->description = $description;
            return $this;
        }

        public function getFbLink() :String {
            return $this->fbLink;
        }
        public function setFbLink($fbLink) :Self {
            $this->fbLink = $fbLink;
            return $this;
        }

        public function getTwLink() :String {
            return $this->twLink;
        }
        public function setTwLink($twLink) :Self {
            $this->twLink = $twLink;
            return $this;
        }

        public function getLiLink() :String {
            return $this->liLink;
        }
        public function setLiLink($liLink) :Self {
            $this->liLink = $liLink;
            return $this;
        }
    }
?> 