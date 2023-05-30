<?php
define("DB_SERVER", "");
define("DB_USERNAME", "");
define("DB_PASSWORD", "");
define("DB_NAME", "");

# Connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

# Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
