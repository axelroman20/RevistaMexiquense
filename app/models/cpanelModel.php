<?php

class cpanelModel extends Model { 

    //Data teacher
    public $teacher;
    public $search;

    // Data user
    public $id;
    public $id_user;
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
     * Metodo para el usuario por id
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
     * Metodo para el usuario por busqueda
     * @return array
     */
    public function getUserSearch() {
        $sql = "SELECT * FROM users WHERE user LIKE :search or name LIKE :search ";
        $params = [
            ':search' => "%$this->search%"
        ];
        try {
            return ($this->data = parent::query($sql, $params)? : "false");
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
     * Metodo para editar una cuenta de usuario
     * @return array
     */
    public function editUsers() {
        $sql = 'UPDATE users SET 
                    rol=:rol, 
                    name=:name, 
                    lastname=:lastname, 
                    user=:user, 
                    pass=:pass, 
                    pass_noencrypt=:pass_noencrypt, 
                    email=:email,
                    carrer=:carrer,
                    active=:active
                WHERE id=:id';

        $params = [
            'rol'              => $this->rol,
            'name'             => $this->name,
            'lastname'         => $this->lastname,
            'user'             => $this->user,
            'pass'             => $this->pass,
            'pass_noencrypt'   => $this->pass_noencrypt,
            'email'            => $this->email,
            'carrer'           => $this->carrer,
            'active'           => $this->active,
            'id'               => $this->id,
        ];

        try {
            return ($this->data = parent::query($sql, $params)? true : false);
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
        $sql = 'DELETE FROM article WHERE id_user = :id_user';
        $params = [
            'id_user' => $this->id_user
        ];

        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para eliminar los likes
     * @return bool
     */
    public function deleteLikes() {
        $sql = 'DELETE FROM likes WHERE id_user = :id_user';
        $params = [
            'id_user' => $this->id_user
        ];

        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

     /**
     * Metodo para eliminar los comments
     * @return bool
     */
    public function deleteComments() {
        $sql = 'DELETE FROM comments WHERE id_user = :id_user';
        $params = [
            'id_user' => $this->id_user
        ];

        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    
 } 