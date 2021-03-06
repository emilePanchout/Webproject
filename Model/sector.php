<?php

class sector extends Model{
    private $_id_sector;
    private $_name_sector;
    

    public function __construct($data) {
        $this->hydrate( $data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
                $this->$method($value);
        }
    }


    public function id_sector() {return $this->_id_sector;}
    public function name_sector() {return $this->_name_sector;}

    public function setId_secteur($id) {
        $id_sector = (int) $id;
        if ($id_sector > 0)
            $this->_id_sector = $id;
    }

    public function setNom_secteur($name) {
        if (is_string($name) && strlen($name) <= 30)
            $this->_name_sector = $name;
    }
    

}


?>