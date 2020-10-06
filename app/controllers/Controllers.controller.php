
<?php

class Controllers extends Controller
{

    public function __construct() {
		$this->pageModel = $this->model('Page');
		$this->postModel = $this->model('Post');
	}

    public function index()
    {
        //get the posts
        $posts = $this->postModel->getPostsIndex();
        if ($posts) {
            $data = [
                'posts' => $posts
            ];
            $this->view('posts/index', $data);
        } else {
            $this->view('dashboards/errors');
        }
    }




}
