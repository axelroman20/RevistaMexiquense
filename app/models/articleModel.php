<?php

class articleModel extends Model { 
    public $id;
    public $id_article;
    public $id_user;
    public $user;
    public $carrer;
    public $title;
    public $description;
    public $thumb;
    public $file;
    public $views;
    public $likes;
    public $comment;
    public $post_page;
    public $post_start;
    public $search;
    public $ip;
    public $data;


    /**
     * Metodo para buscar todos los post article
     * @return array
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
     * @return array
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
     * Metodo para buscar todos los post article por usuario
     * @return array
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
     * Metodo para buscar todos los post article por likes
     * @return array
     */
    public function getPostsLikes() {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM article ORDER BY likes DESC LIMIT ".$this->post_start.", ".$this->post_page."";
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
     * Metodo para buscar todos los post article por views
     * @return array
     */
    public function getPostsViews() {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM article ORDER BY views DESC LIMIT ".$this->post_start.", ".$this->post_page."";
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
     * Metodo para buscar el numero de pagina
     * @return array
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
     * Metodo para buscar todos los comentarios del articulo
     * @return array
     */
    public function getPostsComments() {
        $sql = 'SELECT * FROM comments WHERE id_article = :id_article ORDER BY created_at DESC';
        $params = [
            ':id_article' => $this->id_article,
        ];
        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para crear comentarios de los articulos
     * @return array
     */
    public function setPostsComments() {
        $sql = 'INSERT INTO comments (id, id_article, id_user, username, comment) 
                VALUES (:id, :id_article, :id_user, :username, :comment)';
        $params = [
            ':id'         => $this->id,
            ':id_article' => $this->id_article,
            ':id_user'    => $this->id_user,
            ':username'   => $this->user,
            ':comment'    => $this->comment,
        ];
        try {
            return ($this->data = parent::query($sql, $params)? "error" : "enviado");
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para eliminar un aritculo
     * @return bool
     */
    public function deleteComments() {
        $sql = 'DELETE FROM comments WHERE id = :id';
        $params = [
            'id' => $this->id
        ];
        try {
            return ($this->data = parent::query($sql, $params) ? "eliminado" : "error");
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para buscar likes del articulo
     * @return array
     */
    public function existsLike() {
        $sql = 'SELECT * FROM likes WHERE id_article = :id_article AND id_user = :id_user';
        $params = [
            ':id_article' => $this->id_article,
            ':id_user' => $this->id_user
        ];
        try {
            return ($this->data = parent::query($sql, $params)? false : true);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para agregar likes al articulo
     * @return array
     */
    public function addLikes() {
        $sql = 'UPDATE article SET likes = :likes WHERE id = :id_article';
        $params = [
            ':likes'      => $this->likes,
            ':id_article' => $this->id_article
        ];
        try {
            return ($this->data = parent::query($sql, $params)? false : true);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para agregar log de likes del articulo
     * @return array
     */
    public function addLikesLog() {
        $sql = 'INSERT INTO likes (id_like, id_article, id_user, user) 
        VALUES (:id_like, :id_article, :id_user, :user)';
        $params = [
            ':id_like' => $this->id,
            ':id_article' => $this->id_article,
            ':id_user' => $this->id_user,
            ':user' => $this->user
        ];
        try {
            return ($this->data = parent::query($sql, $params)? false : true);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para quitar likes al articulo
     * @return array
     */
    public function subLikes() {
        $sql = 'UPDATE article SET likes = :likes WHERE id = :id_article';
        $params = [
            ':likes'      => $this->likes,
            ':id_article' => $this->id_article
        ];
        try {
            return ($this->data = parent::query($sql, $params)? false : true);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para quitar log de likes del articulo
     * @return array
     */
    public function subLikesLog() {
        $sql = 'DELETE FROM likes WHERE id_article = :id_article AND id_user = :id_user';
        $params = [
            ':id_article' => $this->id_article,
            ':id_user' => $this->id_user
        ];
        try {
            return ($this->data = parent::query($sql, $params)? false : true);
        } catch (Exception $e) {
            throw $e;
        }
    }

    

    /**
     * Metodo para crear un nuevo aritculo
     * @return array
     */
    public function add() {
        $sql = 'INSERT INTO article (id, id_user, user, carrer, title, description, thumb, file) 
                VALUES (:id, :id_user, :user, :carrer, :title, :description, :thumb, :file)';
        $data = [
            'id'          => $this->id,
            'id_user'     => $this->id_user,
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

    /**
     * Metodo para buscar un aritculo
     * @return array
     */
    public function search() {
        $sql = 'SELECT * FROM article WHERE title LIKE :search or description LIKE :search ORDER BY created_at DESC';
        $params = [
            'search' => $this->search
        ];

        try {
            return ($this->data = parent::query($sql, $params));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Metodo para agregar views a un aritculo
     * @return bool
     */
    public function setViews() {
        $sql = "UPDATE article SET views=:views WHERE id=:id";
        $params = [
            ':views' => $this->views,
            ':id' => $this->id_article
        ];

        try {
            return ($this->data = parent::query($sql, $params)? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function validateViews() {
        $sql = "SELECT * FROM views WHERE ip=:ip";
        $params = [
            ':ip' => $this->ip
        ];
        try {
            return ($this->data = parent::query($sql, $params)? true : false);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function addViewsLog(){
        $sql = 'INSERT INTO views (id_view, id_article, ip) 
        VALUES (:id_view, :id_article, :ip)';
        $params = [
            ':id_view' => $this->id,
            ':id_article' => $this->id_article,
            ':ip' => $this->ip
        ];
        try {
            return ($this->data = parent::query($sql, $params)? false : true);
        } catch (Exception $e) {
            throw $e;
        }
    }
    

    
    
 } 