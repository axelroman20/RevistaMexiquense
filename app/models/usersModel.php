<?php

class usersModel extends Model {
    public $id;
    public $rol;
    public $lastname;
    public $user;
    public $pass;
    public $pass_noencrypt;
    public $email;
    public $carrer;
    public $data;
    
    /**
     * Metodo para buscar un usuario
     * @return bool
     */
    public function loginValidate() {
        $sql = 'SELECT * FROM users WHERE user=:user';
        $params = [
            'user' => $this->user
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para agregar un usuario
     * @return void
     */
    public function add() {
        $sql = 'INSERT INTO users (id, rol, name, lastname, user, pass, pass_noencrypt, email, carrer) VALUES (:id, :rol, :name, :lastname, :user, :pass, :pass_noencrypt, :email, :carrer)';
        $registro = [
            'id'             => $this->id,
            'rol'            => $this->rol,
            'name'           => $this->name,
            'lastname'       => $this->lastname,
            'user'           => $this->user,
            'pass'           => $this->pass,
            'pass_noencrypt' => $this->pass_noencrypt,
            'email'          => $this->email,
            'carrer'         => $this->carrer
        ];

        try {
            return (parent::query($sql, $registro));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar un usuario existente
     * @return void
     */
    public function searchUser() {
        $sql = 'SELECT * FROM users WHERE user=:user';
        $params = [
            'user' => $this->user,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar un email existente
     * @return void
     */
    public function searchEmail() {
        $sql = 'SELECT * FROM users WHERE email=:email';
        $params = [
            'email' => $this->email,
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar un usuario existente
     * @return void
     */
    public function settings() {
        $sql = 'SELECT * FROM users WHERE id=:id';
        $params = [
            'id' => $this->id,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }
    

}