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
    public $token;
    public $requestPassword;
    public $active;
    public $data;
    
    /**
     * Metodo para buscar un usuario
     * @return bool
     */
    public function loginValidate() {
        $sql = 'SELECT * FROM users WHERE user = :user LIMIT 1';
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
        $sql = 'INSERT INTO users (id, rol, name, lastname, user, pass, pass_noencrypt, email, carrer, token, active) 
                VALUES (:id, :rol, :name, :lastname, :user, :pass, :pass_noencrypt, :email, :carrer, :token, :active)';
        $registro = [
            'id'             => $this->id,
            'rol'            => $this->rol,
            'name'           => $this->name,
            'lastname'       => $this->lastname,
            'user'           => $this->user,
            'pass'           => $this->pass,
            'pass_noencrypt' => $this->pass_noencrypt,
            'email'          => $this->email,
            'carrer'         => $this->carrer,
            'token'          => $this->token,
            'active'         => 0
        ];

        try {
            return ($this->data = parent::query($sql, $registro)? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar un usuario existente
     * @return void
     */
    public function searchUser() {
        $sql = 'SELECT * FROM users WHERE user=:user LIMIT 1';
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
        $sql = 'SELECT * FROM users WHERE email=:email LIMIT 1';
        $params = [
            'email' => $this->email,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar una contraseña existente
     * @return void
     */
    public function searchPassword() {
        $sql = 'SELECT * FROM users WHERE pass=:pass LIMIT 1';
        $params = [
            'pass' => $this->pass,
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para datos un usuario existente
     * @return void
     */
    public function settings() {
        $sql = 'SELECT * FROM users WHERE id=:id LIMIT 1';
        $params = [
            'id' => $this->id,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para actualizar los nombre y apellido del usuario 
     * @return void
     */
    public function updateNames() {
        $sql = 'UPDATE users SET name = :name, lastname = :lastname WHERE id=:id';
        $params = [
            'name'     => $this->name,
            'lastname' => $this->lastname,
            'id'       => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Metodo para actualizar username del usuario 
     * @return void
     */
    public function updateUsers() {
        $sql = 'UPDATE users SET user = :user WHERE id=:id';
        $params = [
            'user' => $this->user,
            'id'   => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para actualizar la contraseña del usuario 
     * @return void
     */
    public function updatePasswords() {
        $sql = 'UPDATE users SET pass = :pass, pass_noencrypt = :pass_noencrypt WHERE id = :id';
        $params = [
            'pass'           => $this->pass,
            'pass_noencrypt' => $this->pass_noencrypt,
            'id'             => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para actualizar el correo electronico del usuario 
     * @return void
     */
    public function updateEmails() {
        $sql = 'UPDATE users SET email = :email WHERE id=:id';
        $params = [
            'email' => $this->email,
            'id'   => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para actualizar la carrera del usuario 
     * @return void
     */
    public function updateCarrers() {
        $sql = 'UPDATE users SET carrer = :carrer WHERE id=:id';
        $params = [
            'carrer' => $this->carrer,
            'id'   => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

     /**
     * Metodo para actualizar el estado de cuenta 
     * @return void
     */
    public function updateActive() {
        $sql = 'UPDATE users SET active = :active WHERE id = :id';
        $params = [
            'active' => $this->active,
            'id'   => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para actualizar el password_request de cuenta 
     * @return void
     */
    public function requestPassword() {
        $sql = 'UPDATE users SET password_request = :password_request WHERE id = :id';
        $params = [
            'password_request' => $this->password_request,
            'id'   => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }


    

}