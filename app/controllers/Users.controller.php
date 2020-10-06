<?php 

/**
 * 
 */
class Users extends Controller
{
	
	public function __construct() {
		$this->userModel = $this->model('User');
	}
    
   

    // on crée la fonction qui enregistre un utilisateur 
	public function register() {
        
        // on vérifie que les données sont bien passer dans la method post 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => $_POST['userName'],
                'email' => $_POST['userEmail'],
                'password' => $_POST['userPassword'],
                'confirm-password' => $_POST['userConfirmPassword'],
                'name_err' => '',
                'email_err' => '', 
                'password_err' => '', 
                'confirm-password_err' => '', 
            ];

             // on vérifie que les variables ne sont pas vide et si c'est le cas on renvoi un message d'erreur
            if(empty($data['name'])) $data['name_err'] = 'Veuillez  entré votre nom'; 
            if(empty($data['email'])) $data['email_err'] = 'Veuillez  entré votre email'; 
            if(empty($data['password'])) $data['password_err'] = 'Veuillez  entré votre mot de passe'; 
            //on vérifie que les deux mots de passe correspond 
            if($data['password'] !== $data['confirm-password']) $data['confirm-password_err'] = "Les mots de passe ne sont pas identique";
            
            if(empty($data['confirm-password'])) $data['confirm-password_err'] = 'Veuillez  confirmer votre mot de passe'; 
            
            //on vérifier que l'email exite grace à la fonction getUserEmail

            if($this->userModel->getUserEmail($data['email'])){
                $data['email_err'] = 'Cet email exite deja'; 
            }

            // plus haut on vérifie si les variables son vide puis ici on vérifie si les variable sont pas vide si elle sont pas vide on dit a l'utilisateur qu'il y a des erreur l'enregistrement c'est fait avec succè

            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err']) ){
           
                
                // si il y a pas d'erreur on peut enregistrer les données
                // on crypte le mot de passe 
                
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

            // on vérifie si les données sont bien enregistrer 
            if(  $this->userModel->register(
                $data['name'],
                $data['email'],
                $data['password']
            )){

                
                    redirect('users/login');

            }else {
                die('Le formulaire est inccorecte'); 
            }
               
            }else {
                    // echec de l'enregistrement 
                $this->view('users/register',$data); 
            }
            
            
            // sinion on affiche les erreurs

        }else {
            $data = [
                'name' => '', 
                'email' => '', 
                'password' => '', 
                'confirm-password' => '', 
                'name_err' => '', 
                'email_err' => '', 
                'password_err' => '', 
                'confirm-password_err' => '', 
            ];

            $this->view('users/register',$data); 
        }
        

    }
    
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => $_POST['userEmail'],
                'password' => $_POST['userPassword'],
                'email_err' => '',
                'password_err' => ''
            ];

            //on vérifie si l'email existe
            if (!$this->userModel->getUserEmail($data['email'])) {
                $data['email_err'] = "Cet identifiant n'existe pas";
            }

            if (empty($data['email'])) $data['email_err'] = "L'identifiant est obligatoire";
            if (empty($data['password'])) $data['password_err'] = "Le mot de passe est obligatoir";


            if (empty($data['email_err']) && empty($data['password_err'])) {
                $user = $this->userModel->login($data['email'], $data['password']);

                if ($user) {
                    //on recupere les sessions 
                    $_SESSION['user_id'] = $user->userId;
                    $_SESSION['user_name'] = $user->userName;

                    redirect('dashboards/index');
                } else {
                    //on renvoi l'erreur si le mdp est mauvais 
                    $data['password_err'] = 'Mot de passe inccorect';
                    $this->view('users/login', $data);
                }
            } else {
                //mauvais mdp on renvoi la page login
                $this->view("users/login", $data);
            }
        } else {

            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

           
            $this->view("users/login", $data);
        }
    }


    // deconnexion 
    public function logout() {
        $_SESSION['user_id'] = null;
        $_SESSION['user_name'] = null;

        session_destroy(); 

        redirect('users/login'); 
    }

}

?>