<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;
        


        // class constructor
    public function __construct(
        $dbname = "samady",
        $tablename = "produse",
        $username = "azure",
        $password = "6#vWHD_$"
    )
    {
        $port= $_SERVER['WEBSITE_MYSQL_PORT'];
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        
        $servername = "localhost:$port";
        $this->username = $username;
        $this->password = $password;
  
        // create connection
        $this->con = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
    public function search($name){
        $sql = "SELECT * FROM $this->tablename WHERE product_name LIKE '%$name%' ";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}
