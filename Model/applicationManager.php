<?php

class applicationManager {
    private $_co;

    public function __construct($co) {$this->setCo($co);}

    public function get($par, $val) {
        $application = [];
        $request = "SELECT * FROM candidature WHERE '{$par}' = '{$val}'";
        $query = $this->_co->prepare($request);
        $query->execute();

        while ($data = $query->fetch(PDO::FETCH_ASSOC))
            $application[]= new application($data);

        return $application;
    }

    public function getbyid($val) {
        $query = $this->_co->prepare("SELECT * FROM candidature WHERE id_candidature = '{$val}'");
        $query->execute();
        
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $application= new application($data);

        return $application;
    }


    public function getList() {
        $application = [];
        $query = $this->_co->query("SELECT * FROM candidature");

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $application[] = new application($data);
        }
        
        return $application;
    }

    public function delete(application $application){
        $this->_co->exec('DELETE FROM candidature WHERE id ='.$application->id());
    }
//add à modifer
    public function add(application $application) {
        $query = $this->_co->prepare('INSERT INTO candidature(nom_entreprise, lieu_entreprise, evalMoy_entreprise, nbStagiaire_entreprise, description_entreprise, id_secteur) VALUES (:nom_entreprise, :lieu_entreprise, :evalMoy_entreprise, :nbStagiaire_entreprise, :description_entreprise, :id_secteur)');
        $query->execute([
            'nom_entreprise'=> $user->name_entreprise(),
            'lieu_entreprise'=> $user->lieu_entreprise(),
            'evalMoy_entreprise'=> $user->evalMoy_entreprise(),
            'nbStagiaire_entreprise'=> $user->nbStagiaire_entreprise(),
            'description_entreprise'=> $user->description_entreprise(),
            'id_secteur'=> $user->id_secteur(),
        ]);
    }


    public function update(user $user) {
       /* $query = $this->_co->prepare('UPDATE utilisateur SET user_utilisateur = :user_utilisateur, mdp_utilisateur = :mdp_utilisateur, nom_utilisateur = :nom_utilisateur, prenom_utilisateur = :prenom_utilisateur, id_role = :id_role, id_promotion = :id_promotion, id_centre = :id_centre ');
        $query->execute([
            'user_utilisateur'=> $user->username_user(),
            'mdp_utilisateur'=> $user->password_user(),
            'nom_utilisateur'=> $user->fname_user(),
            'prenom_utilisateur'=> $user->lname_user(),
            'id_role'=> $user->id_role(),
            'id_promotion'=> $user->id_promo(),
            'id_centre'=> $user->id_center()
        ]);*/
    }

    public function setCo(PDO $co){
        $this->_co = $co;
    }

}

?>