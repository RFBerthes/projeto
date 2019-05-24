<!doctype html>
<html lang="pt-br">
  <head>
    <?php require_once "header-atendente.php" ?>
  </head>
  <body class="bg-dark text-white">
      <div class="container-fluid">
          <div class="row">
            <div class="col-sm-3 bg-secondary" >
              <p>Lorem ipsum...</p>
            </div>
            <div class="col-sm-7 bg-white text-dark" >
            <?php
session_start();
define("DIR", dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);

include_once DIR.DS.'App'.DS.'Loader.php';

$loader = new App\Loader();
$loader->register();

$pdo               = new \PDO("mysql:host=localhost;dbname=shop", "root", "");
$productRepository = new App\Model\Product\ProductRepositoryPDO($pdo);


$page   = isset($_GET['page']) ? $_GET['page'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';




switch ($page) {
    case 'cart':
        $sessionCart = new App\Model\Shopping\CartSession();
        $cart = new App\Controller\Cart($productRepository, $sessionCart);
        call_user_func_array(array($cart, $action), array());
    break;

    default:
        $home = new App\Controller\Home($productRepository);
        call_user_func_array(array($home, $action), array());
}
?>
            </div>
            <div class="col-sm-2" style="background-color:pink;">
                <p>Sed ut perspiciatis...</p>
              
          </div>
        </div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>