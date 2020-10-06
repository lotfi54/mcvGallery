
<?php

class Posts extends Controller
{

    public function __construct() {
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
            $this->view('dashboards/errors');
        }
    }



}
