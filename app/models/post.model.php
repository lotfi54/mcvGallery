<?php
    class Post {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

      public function getPostsIndex() {
        $this->db->query("SELECT * FROM gallery ORDER BY id DESC");
        $posts = $this->db->fetchAll();
        if ($posts) return $posts;
        else return false;
      }

      public function getPostSingle($id)
      {
          $this->db->query("SELECT * FROM gallery where id=:id");
          $this->db->bind(":id", $id);
          $post = $this->db->fetch();
          if ($post) return $post;
          else return false;
      }




    }