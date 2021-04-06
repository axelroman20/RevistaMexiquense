<?php

class usersModel extends Model {
    public $id;
    public $rol;
    public $lastname;
    public $user;
    public $pass;
    public $email;
    public $carrer;
    public $data;
    
    /**
     * Metodo para buscar un usuario
     * @return integer
     */
    public function validate() {
        $sql = 'SELECT * FROM users WHERE user=:user AND pass=:pass';
        $params = [
            'user' => $this->user,
            'pass' => $this->pass
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function loadSetting() {
        $sql = 'SELECT * FROM users WHERE user=:user';
        $params = [
            'user' => $this->user
        ];
        
        try {
            return ($res = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }

        /*
        $sql = 'SELECT * FROM tests WHERE id=:id';
        $res = Database::query($sql, ['id' => 1]);
        print_r($res); 
        */
    }


}