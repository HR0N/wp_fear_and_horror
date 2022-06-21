<?php


class ConnectDB{
    private $mysql_host = "pr435071.mysql.tools";
    private $mysql_user  = "pr435071_wp";
    private $mysql_password = "T^ni4P4^7t";
    private $mysql_database = "pr435071_wp";

    public function query($sql){
        $connect=mysqli_connect(
            $this->mysql_host,
            $this->mysql_user,
            $this->mysql_password,
            $this->mysql_database);
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        $result = $connect->query($sql);
        return mysqli_fetch_array($result);
    }
}





