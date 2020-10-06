<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        
        public function getUsers() {
            $this->db->query("SELECT * FROM users");
            $result = $this->db->resultSet();
            return $result;
            
        }

        // on crée la fonction qui vérfie que l'email existe 

        public function getUserEmail($email)
        {
            $this->db->query("SELECT * from users WHERE userEmail=:email");
            $this->db->bind(":email", $email);
            $this->db->execute();
            if ($this->db->rowCount()) return true;
            else return false;
        }


        public function register ($name,$email,$password){
            $this->db->query(
            "INSERT INTO users (userName, userEmail ,userPassword) 
            VALUES(:name, :email, :password)
            ");

            $this->db->bind(":name", $name);
            $this->db->bind(":email", $email);
            $this->db->bind(":password", $password);
            if($this->db->execute()) return true;
            else return false; 
        }

    

        public function login($email, $password)
        {
            $this->db->query("SELECT * FROM users WHERE userEmail=:email");
            $this->db->bind(":email", $email);
            $row = $this->db->fetch();
            $hashed_password = $row->userPassword;
            // password_verify — Vérifie qu'un mot de passe correspond à un hachage
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

        
        public function logout()
        {
    
            $_SESSION['user_id'] = null;
            $_SESSION['name'] = null;
            session_destroy();
    
            redirect('users/login');
        }
    
    

   
        
    }