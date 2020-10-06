<?php
class Dashboards extends Controller
{

    public function __construct() {
        $this->dashboardModel = $this->model('Dashboard');   
        $this->postModel = $this->model('Post');   
    }

    public function show($id)
    {
        $post = $this->postModel->getPostSingle($id);

        if ($post) {
            $data = [
                'post' => $post
            ];
            $this->view('posts/show', $data);
        } else {
            die("Erreur 404");
        }
    }



    public function index()
    {
        
        $posts = $this->dashboardModel->getPosts();
        if ($posts) {
            $data = [
                'posts' => $posts
            ];
            $this->view('dashboards/index', $data);
        } else {
           
            $this->view('dashboards/errors');
        }
    }

    public function add() {
        if (isset($_SESSION['user_id'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => $_POST['title'],
                'image' => $_FILES['image']['name'],
                'userId' => $_SESSION['user_id'],
                'title_err' => '',
                'image_err' => ''
            ];

            if (empty($data['title'])) $data['title_err'] = 'Please fill your title';
            if (empty($data['image'])) $data['image_err'] = 'Please fill your post body';
                    
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["image"]["name"];
                    $filetype = $_FILES["image"]["type"];
                    $filesize = $_FILES["image"]["size"];

                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                    $maxsize = 5 * 1024 * 1024;
                    if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
        
                    if(in_array($filetype, $allowed)){
                        // Vérifie si le fichier existe avant de le télécharger.
                        if(file_exists(URLUPLOAD . $_FILES["image"]["name"])){
                            echo $_FILES["image"]["name"] . " existe déjà.";
                        } else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], URLUPLOAD . $_FILES["image"]["name"]);
                            echo "Votre fichier a été téléchargé avec succès.";
                        } 
                    } else{
                        echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
                    }
                

                if (!empty($data['title']) && !empty($data['image'])){

                   
                    if ($this->dashboardModel->upload($data)) {
                        
                        redirect('dashboards');
                    } else {
                        die("something went wrong!!");
                    }

            }else {
                $this->view("dashboards/add", $data);
                 
            }
          


        } else {

            $data = [
                'title' => '',
                'image' => '',
                'title_err' => '',
                'image_err' => '',
            ];
            $this->view("dashboards/add", $data);
            
        }
    }else {
        redirect("dashboards"); 
    }
}

public function update($id) {
    $post = $this->postModel->getPostSingle($id);
   
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'title' => $_POST['title'],
            'image' => $_FILES['image']['name'],
            'id' => $post->id,
            'title_err' => '',
            'image_err' => ''
        ];

        if (empty($data['title'])) $data['title_err'] = 'Please fill your title';
        if (empty($data['image'])) $data['image_err'] = 'Please fill your post body';
                
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["image"]["name"];
                $filetype = $_FILES["image"]["type"];
                $filesize = $_FILES["image"]["size"];

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
    
                if(in_array($filetype, $allowed)){
                    // Vérifie si le fichier existe avant de le télécharger.
                    if(file_exists(URLUPLOAD . $_FILES["image"]["name"])){
                        echo $_FILES["image"]["name"] . " existe déjà.";
                    } else{
                        move_uploaded_file($_FILES["image"]["tmp_name"], URLUPLOAD . $_FILES["image"]["name"]);
                        echo "Votre fichier a été téléchargé avec succès.";
                    } 
                } else{
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
                }
            

            if (!empty($data['title']) && !empty($data['image'])){

               
                if ($this->dashboardModel->updatePost($data)) {
                    
                    redirect('dashboards');
                } else {
                    die("erreur de fou");
                }

        }else {

            $this->view("dashboards/update".$data['post']->id,$data);
             
        }
      


    } else {

        $data = [
                    'title' => $post->title,
                    'image' => $post->image,
                    'id' => $post->id,
                    'title_err' => '',
                    'image_err' => ''

        ];
        $this->view("dashboards/update", $data);
        
    }
}


// suppression 

public function delete($id)
{
    $post = $this->dashboardModel->getPostOne($id);

    if ($_SESSION['user_id'] == $post->userId) {

        if ($this->dashboardModel->deletePost($id)) {
            //post deleted
            redirect('dashboards/index');
        } else {
            die("something went wrong!!");
        }
    }
}


}




?>