<?php
    class Page {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function index()
    {
        $this->view('pages/index');
    }




    }