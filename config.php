<?php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "inqkacom_faiz123");
define("DB_PASSWORD", "faiznasir123");
define("DB_NAME", "inqkacom_pais");

# Connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

# Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
