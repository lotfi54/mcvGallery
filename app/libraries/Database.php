<?php 

class Database{

	// on crée les propriètées 
	private $dbHost = DB_HOST;
	private $dbUser = DB_USER;
	private $dbPass = DB_PASS;
	private $dbName = DB_NAME;


	// propriétés qui sert à déclarer 
	private $statement;
	// propriété de gestion de la base de donnée 
	private $dbHandler;

	private $error;

	

	public function __construct() {
            $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try {
                $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
}
            // fonction qui va nous permettre décrire des requette 
           public function query($sql) {
            $this->statement = $this->dbHandler->prepare($sql);
        }


            // on crée une fonction qui recupere les valeurs de chaque ligne dans la base de donné avec leur type

			public function bind($param, $value, $type = null)
			{
		
				if (is_null($type)) {
					switch (true) {
						case is_int($value):
							$type = pdo::PARAM_INT;
							break;
						case is_bool($value):
							$type = pdo::PARAM_BOOL;
							break;
						case is_null($value):
							$type = pdo::PARAM_NULL;
							break;
						default:
							$type = pdo::PARAM_STR;
					}
				}
		
				$this->statement->bindValue($param, $value, $type);
			}
            	public function execute() {
            		return $this->statement->execute(); 
            	}


            	// on retourne le resultat de la requete dans un tableau 

				public function fetchAll()
				{
					$this->statement->execute();
					$results = $this->statement->fetchAll(PDO::FETCH_OBJ);
					return $results;
				}

            	// on retourne une line spécifique pour chaque objet 
				public function fetch()
				{
					$this->statement->execute();
					$result = $this->statement->fetch(PDO::FETCH_OBJ);
			
					return $result;
				}


            	// on récupere le nombre de line dans le cas d'un foreach 

            	public function rowCount() {
            		
            		return $this->statement->rowCount(); 
            	}

            }













?>