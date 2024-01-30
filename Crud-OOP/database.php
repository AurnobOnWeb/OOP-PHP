<?php

class Database
{
  private $db_host = "localhost";
  private $db_user = "root";
  private $db_pass = "";
  private $db_name = "oop";
  private $mysqli = null;
  private $result = [];

  private $conn = false;

  public function __construct()
  {
    $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    $this->conn = true;
    if ($this->mysqli->connect_error) {
      throw new Exception("Connection failed: " . $this->mysqli->connect_error);
    }
  }



  public function insert($table, $params = [])
  {
    if ($this->tableExists($table)) {
      $columns = implode(', ', array_keys($params));
      $values = "'" . implode("', '", array_values($params)) . "'";
      $sql = "INSERT INTO $table ($columns) VALUES ($values)";
      // $this->executeQuery($sql);

      if ($this->mysqli->query($sql)) {
        array_push($this->result, $this->mysqli->insert_id);
        return true;
      } else {
        array_push($this->result, $this->mysqli->error);
        return false;
      }
    } else {
      throw new Exception("$table does not exist in the database.");
    }
  }

  private function tableExists($table)
  {
    $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
    $tableInDb = $this->mysqli->query($sql);
    if ($tableInDb && $tableInDb->num_rows == 1) {
      return true;
    } else {
      throw new Exception("$table does not exist in the database.");
    }
  }

  public function getResult()
  {
    $val = $this->result;
    $this->result = array();
    return $val;
  }

  public function __destruct()
  {
    if ($this->conn) {
      $this->mysqli->close();
    }
  }
}

// Example usage:
// $db = new Database("localhost", "root", "", "oop");
// $db->insert("your_table", ["column1" => "value1", "column2" => "value2"]);
