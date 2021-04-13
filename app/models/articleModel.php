<?php

class articleModel extends Model { 
    public $id;
    public $user;
    public $carrer;
    public $title;
    public $description;
    public $thumb;
    public $file;
    public $views;
    public $likes;
    public $post_page;
    public $post_start;
    public $data;


    /**
     * Metodo para buscar todos los post article
     * @return bool
     */
    public function getPosts() {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM article ORDER BY created_at DESC LIMIT ".$this->post_start.", ".$this->post_page."";
        $params = [
            ':data' => $this->data,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar todos los post article por id
     * @return bool
     */
    public function getPostsId() {
        $sql = 'SELECT * FROM article WHERE id = :id ORDER BY created_at DESC ';
        $params = [
            ':id' => $this->id,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

     /**
     * Metodo para buscar todos los post article por id
     * @return bool
     */
    public function getPostsUser() {
        $sql = 'SELECT * FROM article WHERE user = :user ORDER BY created_at DESC ';
        $params = [
            ':user' => $this->user,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }


    /**
     * Metodo para buscar el numero de pagina
     * @return bool
     */
    public function getNumPages() {
        $sql = 'SELECT count(*) FROM article';
        $params = [
            ':data' => $this->data,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para crear un nuevo aritculo
     * @return bool
     */
    public function add() {
        $sql = 'INSERT INTO article (id, user, carrer, title, description, thumb, file) 
                VALUES (:id, :user, :carrer, :title, :description, :thumb, :file)';
        $data = [
            'id'          => $this->id,
            'user'        => $this->user,
            'carrer'      => $this->carrer,
            'title'       => $this->title,
            'description' => $this->description,
            'thumb'       => $this->thumb,
            'file'        => $this->file
        ];

        try {
            return ($this->data = parent::query($sql, $data));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para editar un aritculo
     * @return bool
     */
    public function edit() {
        $sql = 'UPDATE article SET title = :title, description = :description, thumb = :thumb, file = :file  WHERE id = :id';
        $params = [
            'title'       => $this->title,
            'description' => $this->description,
            'thumb'       => $this->thumb,
            'file'        => $this->file,
            'id'          => $this->id
        ];

        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para eliminar un aritculo
     * @return bool
     */
    public function delete() {
        $sql = 'DELETE FROM article WHERE id = :id';
        $params = [
            'id' => $this->id
        ];

        try {
            return ($this->data = parent::query($sql, $params) ? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }



    

    
    
 }