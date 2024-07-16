<?php
    namespace app\models;
    use \PDO;
    #Confirmación del archivo server.php
    if(file_exists(__DIR__."/../../config/server.php")){
        require_once __DIR__."/../../config/server.php";
    }
    #Modelo principal para la conexión a la base de datos.
    class mainModel{ 
        private $server = DB_SERVER;
        private $db_name = DB_NAME;
        private $db_user = DB_USER;
        private $db_pass = DB_PASS;
        #Función para conectar la base de datos.
        protected function conect(){
            $conn = new PDO("mysql:host=".$this->server.";dbname=".$this->db_name, $this->db_user, $this->db_pass);
            $conn->exec("SET CHARACTER SET utf8");
            return $conn;
        }
        #Función para hacer consultas a la base de datos.
        protected function ejecutar($consulta){
            $sql =$this->conect()->prepare($consulta);
            $sql->execute();
            return $sql;
        }
        #(1mer filtro) Función para evitar inyecciones SQL - Listando palabras que no son permitidas.
        public function cleanString($cadena){
            $palabras=["<script>","</script>", "<script src","<script type=","<style>", "</style>","<form>", "<input>", "<button>", '<meta http-equiv="refresh"',"<img src=x onerror=alert(",
                        "<iframe src=x onload=alert(", "<object type=application/x-shockwave-flash>", "<embed src=x onerror=alert(",'<img src="','<img onerror="','<link href="','onload="',
                        'onmouseover="','onfocus="','onblur="','onclick="', "SELECT * FROM", "DELETE FROM", "INSERT INTO", "DROP TABLE", "DROP DATABASE", "TRUNCATE TABLE","SHOW TABLES",
                        "SHOW DATABASES", "<?php", "?>", "==", "--", "^", ",", "=", ";", "::", "<", ">"];
            $cadena=trim($cadena);
            $cadena=stripslashes($cadena);
            foreach($palabras as $pa){ 
                $cadena=str_ireplace($pa,"",$cadena);
            }
            $cadena=trim($cadena);
            $cadena=stripslashes($cadena);
            return $cadena;     
        }
        #(2do filtro) Funcion para filtrar la cadena de texto sobre una expresión regular donde se limita la entrada de datos.
        protected function verificarData($filtro, $cadena){
            if(preg_match("/^".$filtro."$/",$cadena)){
                return false;
            }else{
                return true;
            }
        }

        
    }
?>