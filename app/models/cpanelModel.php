<?php

class cpanelModel extends Model { 

    //Data teacher
    public $teacher;

    // Data user
    public $id;
    public $rol;
    public $name;
    public $lastname;
    public $user;
    public $pass;
    public $pass_noencrypt;
    public $email;
    public $carrer;
    public $token;
    public $requestPassword;
    public $active;

    public $data;


    /**
     * Metodo para buscar todos los post article
     * @return array
     */
    public function getlinksUsers() {
        $sql = "SELECT 
            l.user, l.teacher, 
            u.id, u.name, u.lastname, u.user, u.carrer FROM link l INNER JOIN users u ON l.user = u.user WHERE teacher = :teacher";
        $params = [
            ':teacher' => $this->teacher
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar todos los usuarios
     * @return array
     */
    public function getUsers() {
        $sql = "SELECT* FROM users ORDER BY created_at DESC";
        $params = [
            ':data' => $this->data
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para el usuario
     * @return array
     */
    public function getUserId() {
        $sql = "SELECT* FROM users WHERE id=:id";
        $params = [
            ':id' => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar si existe el usuario
     * @return array
     */
    public function searchUser() {
        $sql = "SELECT* FROM users WHERE user=:user";
        $params = [
            ':user' => $this->user
        ];
        try {
            return ($this->data = parent::query($sql, $params)? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar si existe el correo
     * @return array
     */
    public function searchEmail() {
        $sql = "SELECT* FROM users WHERE email=:email";
        $params = [
            ':email' => $this->email
        ];
        try {
            return ($this->data = parent::query($sql, $params)? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para agregar una cuenta de usuario
     * @return array
     */
    public function addUsers() {
        $sql = 'INSERT INTO users (id, rol, name, lastname, user, pass, pass_noencrypt, email, carrer, token, password_request, active) 
                VALUES (:id, :rol, :name, :lastname, :user, :pass, :pass_noencrypt, :email, :carrer, :token, :password_request, :active)';
        $registro = [
            'id'               => $this->id,
            'rol'              => $this->rol,
            'name'             => $this->name,
            'lastname'         => $this->lastname,
            'user'             => $this->user,
            'pass'             => $this->pass,
            'pass_noencrypt'   => $this->pass_noencrypt,
            'email'            => $this->email,
            'carrer'           => $this->carrer,
            'token'            => $this->token,
            'password_request' => $this->requestPassword,
            'active'           => $this->active
        ];

        try {
            return ($this->data = parent::query($sql, $registro)? false : true);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para eliminar usuario
     * @return bool
     */
    public function deleteUser() {
        $sql = 'DELETE FROM users WHERE id = :id';
        $params = [
            'id' => $this->id
        ];

        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para eliminar los articulos
     * @return bool
     */
    public function deleteArticles() {
        $sql = 'DELETE FROM article WHERE user = :user';
        $params = [
            'user' => $this->user
        ];

        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
 } 