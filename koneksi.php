<?php

class Database {

  private $host;
  private $username;
  private $password;
  private $database;
  private $table;
  private $connection;

  public function __construct(
    $host = "localhost",
    $username = "root", 
    $password = "", 
    $database = "pbo_db",
    $table = "pbo_tb"
  ) {
      $this->host = $host;
      $this->username = $username;
      $this->password = $password;
      $this->database = $database;
      $this->table = $table;
      $this->connection = mysqli_connect($host, $username, $password, $database);

      if (!$this->connection) {
        die("Connection failed : " . mysqli_connect_error());
      }
  }
  public function query($sql) {
    $sql = "SELECT * FROM $this->table";

    $result = mysqli_query($this->connection, $sql);
    if (!$result) {
      die("Query failed : " . mysqli_error($this->connection));
    }
    return $result;
  }
}

$db = new Database();
$row = $db->query("SELECT * FROM tugastb");

foreach($row as $rows): ?>
  <?php echo "Nama : " . $rows['nama']?> <br>
  <?php echo "Fakultas : " . $rows['fakultas']?> <br>
  <?php echo "Prodi : " . $rows['prodi']?> <p>
<?php endforeach; ?>
