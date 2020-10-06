<?php
    class Dashboard {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPostOne($id)
        {
            $this->db->query("SELECT * FROM gallery where id=:id");
            $this->db->bind(":id", $id);
            $post = $this->db->fetch();
            if ($post) return $post;
            else return false;
        }

        public function getPosts()
        {
    
            $this->db->query("SELECT * FROM gallery ORDER BY id DESC");
            $posts = $this->db->fetchAll();
            if ($posts) return $posts;
            else return false;
        }
    


        public function upload($post)
        {
            $this->db->query("INSERT INTO gallery (title, image,userId) values(:title, :image, :userId)");
            $this->db->bind(":title", $post['title']);
            $this->db->bind(":image", $post['image']);
            $this->db->bind(":userId", $post['userId']);
            if ($this->db->execute()) return true;
            else return false;
        }
        
        public function updatePost($post)
        {
    
            $this->db->query('UPDATE gallery set title=:title, image=:image where id=:id');
            $this->db->bind(":title", $post['title']);
            $this->db->bind(":image", $post['image']);
            $this->db->bind(":id", $post['id']);
    
            if ($this->db->execute()) return true;
            else return false;
        }
    
        public function deletePost($id)
        {
    
            $this->db->query("DELETE FROM  gallery where id=:id");
            $this->db->bind(":id", $id);
            if ($this->db->execute()) return true;
            else return false;
        }
   
        
    }