<?php
    namespace app\models;
    use \PDO;
    use PDOException;

    #Confirmación del archivo server.php
    if(file_exists(__DIR__."/../../config/server.php")){
        require_once __DIR__."/../../config/server.php";
    }
    #Modelo principal para la conexión a la base de datos.
    class mainModel{ 
        const db_server = DB_SERVER;
        const db_name = DB_NAME;
        const db_user = DB_USER;
        const db_pass = DB_PASS;
        private static $datos = [];
        #Función para conectar la base de datos.
        public static function connect(){
            try{
                $conn = new PDO("mysql:host=".self::db_server.";dbname=".self::db_name, self::db_user, self::db_pass);
                $conn->exec("SET CHARACTER SET utf8");
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conn;
            }catch(PDOException $e){
                return "fallo ".$e->getMessage();
            }
        }
        #(1mer filtro) Función para evitar inyecciones SQL - Listando palabras que no son permitidas.
        public static function cleanString($cadena){
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
        protected static function verificarData($filtro, $cadena){
            if(preg_match("/^".$filtro."$/",$cadena)){
                return false;
            }else{
                return true;
            }
        }

        /* ------------------------------------------------------------------------------------- */
        public static function insertar($tabla, $data){
            try {
                $conn = self::connect();
                $columns = implode(',', array_keys($data));
                $values = implode(',', array_map(function($value) use ($conn) {
                    return $conn->quote($value);
                    }, $data));
                    $consul = "INSERT INTO ". $tabla ." (".$columns.") VALUES (".$values.")";
                    $result = $conn->query($consul);
                     if($result){
                    return true;
                    } else {
                     return false;
                     }
                    } catch (PDOException $e) {
                    return "fallo ".$e->getMessage();
                    }
        }
        public static function mostrar($tabla){
            $conn = mainModel::connect();
            $consulta = "SELECT * FROM ".$tabla.";";
            $resultado = $conn->query($consulta);
            while($filas =$resultado->fetchAll(PDO::FETCH_ASSOC)){
                self::$datos[] = $filas;
            }
            return self::$datos;
        }
        public static function actualizar($tabla, $data, $condicion){
            $conn = mainModel::connect();
            $consult ="UPDATE ". $tabla." SET ". $data ." WHERE ".$condicion;
            $result= $conn->query($consult);
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public static function eliminar($tabla, $condicion){
            $conn = mainModel::connect();
            $eli="DELETE FROM ".$tabla." WHERE ".$condicion;
            $res=$conn->query($eli);
            if($res){
                return true;
            }else{
                return false;
            }
        }
        public static function getHashedPasswordByEmail($email) {
            $conn = self::connect();
            $stmt = $conn->prepare("SELECT * FROM person WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $data = [
                    'name' => $row['name'],
                    'pass' => $row['password']
                ];
                return $data; // Devuelve la contraseña encriptada
            } else {
                return null; // No se encontró el usuario
            }
        }
    }
?>