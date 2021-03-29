<?php

class userManager {
    private $_co;

    public function __construct($co) {$this->setDb($co);}

    public function get($par, $val) {
        $user = [];
        $request = "SELECT * FROM utilisateur WHERE '{$par}' = '{$val}'";
        $query = $this->_co->query($request);
        
        while ($data = $query->fetch(PDO::FETCH_ASSOC))
            $user[]= new user($data);

        return $user;
    }

    public function getList() {
        $user = [];

        $query = $this->_co->$query("SELECT * FROM utilisateur");

        while ($data = $query->fetch(PDO::FETCH_ASSOC))
            $user = new user($data);
        
        return $user;
    }

    public function delete(user $user){
        $this->_co->exec('DELETE FROM utilisateur WHERE id ='.$perso->id());
    }

    public function add(user $user) {
        $query = $this->_co->prepare('INSERT INTO utilisateur(user_utilisateur, mdp_utilisateur, nom_utilisateur, prenom_utilisateur, id_role, id_promotion, id_centre) VALUES (:user_utilisateur, :mdp_utilisateur, :nom_utilisateur, :prenom_utilisateur, :id_role, :id_promotion, :id_centre)');
        $query->execute([
            'user_utilisateur'=> $user->username_user();
            'mdp_utilisateur'=> $user->password_user();
            'mdp_utilisateur'=> $user->fname_user();
            'mdp_utilisateur'=> $user->lname_user();
            'mdp_utilisateur'=> $user->id_role();
            'mdp_utilisateur'=> $user->id_promo();
            'mdp_utilisateur'=> $user->id_center()
        ]);
    }


    public function update(user $user) {
        $query = $this->_co->prepare('UPDATE utilisateur SET user_utilisateur = :user_utilisateur, mdp_utilisateur = :mdp_utilisateur, nom_utilisateur = :nom_utilisateur, prenom_utilisateur = :prenom_utilisateur, id_role = :id_role, id_promotion = :id_promotion, id_centre = :id_centre ');
        $query->execute([
            'user_utilisateur'=> $user->username_user();
            'mdp_utilisateur'=> $user->password_user();
            'mdp_utilisateur'=> $user->fname_user();
            'mdp_utilisateur'=> $user->lname_user();
            'mdp_utilisateur'=> $user->id_role();
            'mdp_utilisateur'=> $user->id_promo();
            'mdp_utilisateur'=> $user->id_center()
        ]);
    }

    public function setCo(PDO $co){
        $this->_co = $co;
    }

}

?>