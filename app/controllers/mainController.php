<?php
    namespace app\controllers;
    use app\models\mainModel;
    require_once './config/server.php';

    class mainController extends mainModel{
        
        public function registerUser() {
          $datos = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'pass' => $_POST['pass'],
            'pass2' => $_POST['pass2'],
            'pet' => $_POST['pet'],
          ];

          $nombre = $this->cleanString($datos['name']);
          $email = $this->cleanString($datos['email']);
          $pass = $this->cleanString($datos['pass']);
          $pass2 = $this->cleanString($datos['pass2']);
          $mascota = $this->cleanString($datos['pet']);


          $conect = new \mysqli(DB_SERVER, DB_USER, DB_PASS, DB_PORT);
          $conect->set_charset('utf8'); 
          

          if(!empty($_POST["registro"])){
            if(!empty($datos)){
            
            }

          };
        }
    };
    
?>