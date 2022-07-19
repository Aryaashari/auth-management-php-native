<?php 

namespace Login\Management\Controller;

use Login\Management\App\View;

class HomeController {

    public function index() {
        View::render('home.php');
    }

}