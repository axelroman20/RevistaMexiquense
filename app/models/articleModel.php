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
        $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM article LIMIT '.$this->post_start.', '.$this->post_page.'';
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
    
 }