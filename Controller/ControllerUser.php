<?php
require_once('View/View.php');

class ControllerUser extends Model
{
    private $_userManager;
    private $_view;

    public function __construct($url) {
        /*if (isset($url) && count($url) > 1){
            throw new Exception('Page introuvable');
        }*/

        switch ($url[1]) {
            case 'view' : 
                $this->userview();
                break;
            case 'pageadd' : 
                $this->pageadd(); 
                break;
            case 'add' : 
                $this->useradd(); 
                break;
            case 'pageupdate' : pageupdate(); break;
            case 'update' : userupdate(); break;
            case 'delete' : userdelete(); break;
        }
    }

    private function userview() {
        $yo = $this->getBdd();
        $this->_userManager = new userManager($yo);
        $user= $this->_userManager->getList();

        

        /*foreach  ($user as $row) {
            $temps = $row[$i]->id_user();
            print  'Pseudo :' . $temp ;
            $temps = '';
            $i++;
        }*/

        $this->_view = new Views('User');
        $this->_view->generate(array('user' => $user));
    }

    private function pageadd(){
        $yo = $this->getBdd();

        $temp = new roleManager($yo);
        $role = $temp->getList();

        $temp1 = new promoManager($yo);
        $promo = $temp1->getList();

        $temp2 = new centerManager($yo);
        $center = $temp2->getList();

        $test[0] = $role;
        $test[1] = $promo;
        $test[2] = $center;

        $yes= $test[1];
        $jp= $yes[1];

        $hey= $test[0];
        $jpp= $hey[1];

        print_r($jpp->name_role());
        print_r($jp->name_promo());
    }

    private function useradd(user $user) {
        $yo = $this->getBdd();
        $this->_userManager = new userManager($yo);
        $user= $this->_userManager->add();
    }

    /*function saveUser($_POST){

    }*/
    private function userupdate(user $user){
        $this->_userManager = new userManager($_bdd);
        $user= $this->_userManager->update();
    }

}