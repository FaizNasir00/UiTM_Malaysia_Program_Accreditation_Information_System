<?php
  // Start a session
  session_start();

  // Redirect user to login page if not logged in
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    header("Location: ./login.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="/img/icon.png">
	<title>Jenis Panel</title>
	<link rel="stylesheet" href="css/paneltype.css">
</head>
<body>
	<header>
		<h1>Jenis Panel</h1>
	</header>
	<main>
		<div class="button-container">
			<a href="panel2.php" class="button dalaman">
				<span>Panel Dalam</span>
			</a>
			<a href="panel1.php" class="button luaran">
				<span>Panel Luar</span>
			</a>
			<a href="editpanel.php" class="button editpanel">
				<span>Edit Panel</span>
			</a>
			
			<a href="index.php" class="button new" style="background-color: #f44336;
				border-radius: 50%;
				bottom: 20px;
				color: #11111;
				font-size: 12px;
				height: 50px;
				line-height: 30px;
				position: fixed;
				right: 20px;
				text-align: center;
				width: 50px;	">
				 	
			</a>
		</div>
	</main>
</body>
</html>
