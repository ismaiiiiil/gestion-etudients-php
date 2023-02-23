<?php
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';

$home = new HomeController();

$pages = ['home', 'add', 'update', 'delete', 'logout'];

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true) // ila kan connecter User
{
    // ?page=add
    if(isset($_GET['page'])){
        if(in_array($_GET['page'], $pages)){
            $page = $_GET['page'];
            $home->index($page);
        } else {
            include('views/includes/404.php'); // page introuvable
        }
    } else{
        $home->index('home');
    }

    require_once './views/includes/footer.php';
} else{
    if(isset($_GET['page']) && $_GET['page'] === 'register'){ 
        $home->index('register');
    } else { //nom connecter
        $home->index('login');
    }
}

?>