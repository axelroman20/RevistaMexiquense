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
    public function search() {
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


    /**
     * Metodo para agregar un usuario
     * @return integer
     */
    public function add() {
        $sql = 'INSERT INTO tests (name, username, email, created_at) VALUES (:name, :username, :email, :created_at)';
        $params = [
            'name'       => $this->name,
            'username'   => $this->username,
            'email'      => $this->email,
            'created_at' => $this->created_at
        ];

        try {
            return ($this->id = parent::query($sql, $params)) ? $this->id : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para actualizar un usuario
     * @return integer
     */
    public function update() {
        $sql = 'UPDATE tests SET name=:name, username=:username, email=:email WHERE id=:id';
        $params = [
            'id'         => $this->id,
            'name'       => $this->name,
            'username'   => $this->username,
            'email'      => $this->email
        ];

        try {
            return ($this->id = parent::query($sql, $params)) ? $this->id : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

}