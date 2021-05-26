<?php 

/** Connection file to the database
 * @category Connections
 * @package  meditech
 * @author   Display Name <cephasmarquis2000@gmail.com>
 * @license  none
 * @link     http://localhost/meditech
 */

 class Connection
 {

    protected $db = null;

    public function Open(){
        try{
            //defining the database variables
            if (!defined('DB_SERVER')) define('DB_SERVER','localhost');
            if (!defined('DB_ADMIN')) define('DB_ADMIN', 'hospital_admin');
            if (!defined('DB_NAME')) define('DB_NAME', 'meditech');
       
            //the different users and their credentials
            //using separate users with different security levels for database security.
            if (!defined('ADMIN_PASSWORD')) define('ADMIN_PASSWORD', 'HosiAdmin1_');
       
            //data source name for connecting to the database
            $dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8mb4";
       
           //setting the pdo error mode to exception for debugging connection errors
           $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
           PDO::MYSQL_ATTR_FOUND_ROWS => true);
       
            $this->db = new PDO($dsn, DB_ADMIN, ADMIN_PASSWORD, $options);

            return $this->db;
        }
        catch(PDOException $e){
            //Remember to remove debugging code during deployment stage.
            echo 'Connection failed: '. $e->getMessage();
        }

    }

    public function Close(){
        $this->db = null;
        return true;
    }
     
 }