<?php
class DB {
    public $tablename;
    private $_dbName;
    private $_dbHost;
    private $_dbUser;
    private $_dbPass;
    private $_pdo;
    private $_stmt;

    public function __construct($moduleName, $dbName, $dbHost, $dbUser, $dbPass) {
        $this->tablename = lcfirst($moduleName);
        $this->_dbName = $dbName;
        $this->_dbHost = $dbHost;
        $this->_dbUser = $dbUser;
        $this->_dbPass = $dbPass;

        $this->_pdo = new PDO("mysql:dbname=$this->_dbName;host=$this->_dbHost", $this->_dbUser, $this->_dbPass);

    }

    public function query($q) {
       $this->_stmt = $this->_pdo->prepare($q);
       $this->_stmt->execute();
    }

    public function fetchALL() {
        return $this->_stmt->fetchall(PDO::FETCH_OBJ);
    }

    public function getFieldInfo() {
        $this->query("DESCRIBE $this->tablename");
        $res = $this->fetchAll();

        $nodeColumns = [];    

        foreach($res as $r) {
            $temp = $r->Type;
            $type = '';
            $i = 0;
            
            // extract type
            while ($temp[$i] != '(') {
                $type.=$temp[$i];
                $i++;
            }
            $i++;

            // extract size
            $sizeAsStr = '';
            $n = strlen($temp);
            while ($i < $n && $temp[$i] != ',' && $temp[$i] != ')') {
                $sizeAsStr .= $temp[$i];
                $i++;
            }

            switch($type) {
                case "int":
                case "decimal":
                case "smallint":
                case "tinyint":
                case "mediumint":
                case "bigint":
                case "float":
                case "double":
                case "decimal":
                case "numeric":
                case "bit":
                    $nodeColumns[] = new Node($r->Field,'number', (int) $sizeAsStr);
                break;
                case "varchar":
                case "text":
                    $nodeColumns[] = new Node($r->Field,'text', (int) $sizeAsStr);
                break;
                default:
                    $nodeColumns[] = new Node($r->Field,'text', (int) $sizeAsStr);
            }
        }

        return $nodeColumns;
    }

}
/**
 * Execute this php script by running and passing 5 arguments:
 * php ZendFormCreator.php {Module Name} {db name} {db host} {db user} {db pass}  >> path/to/file
 * 
 * Example:
 * php ZendFormCreator.php Product emvc localhost root password >> module/Product/src/Model/ProductForm.php
*/

class Node {
    public $field;
    public $type;
    public $size; // for strings only ignore this for numbers

    public function __construct($field, $type, $size = null) {
        $this->field = $field;
        $this->type = $type;
        $this->size = $size;
    }
}


