<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #fafafa;
            }

            h2 {
                text-align: center;
                padding-top: 20px;
                color: #3f51b5;
            }

            .form-container {
                width: 100%;
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .form-container label {
                display: block;
                margin-bottom: 5px;
                font-size: 1.2rem;
                color: #3f51b5;
            }

            .form-container input[type="text"] {
                display: block;
                width: 90%;
                padding: 20px;
                margin-bottom: 20px;
                border: 2px solid #3f51b5;
                border-radius: 5px;
                font-size: 1.5rem;
            }

            .form-container input[type="submit"] {
                display: block;
                width: 100%;
                padding: 15px;
                color: #fff;
                background-color: #3f51b5;
                border: none;
                border-radius: 5px;
                font-size: 1rem;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .form-container input[type="submit"]:hover {
                background-color: #303f9f;
            }

            #existing-catatan {
                opacity: 0.5;
            }

            .preview-title {
                font-size: 1.5rem;
                color: #3f51b5;
                margin-top: 20px;
            }
            
            .kembali-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3f51b5;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            position: fixed;
            right: 20px;
            bottom: 20px;
            transition: background-color 0.3s ease;
            }
            
            .kembali-button:hover {
                background-color: #303f9f;
            }

        </style>
    </head>

    <body>
        <?php
        ob_start();
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        $permohonan_id = isset($_GET['permohonan_id']) ? $_GET['permohonan_id'] : ''; 
        $catatan = '';
        $success = false;
        
        $conn = mysqli_connect("", "", "", "");
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $stmt = $conn->prepare("SELECT catatan FROM permohonan WHERE permohonan_id = ?");
        $stmt->bind_param("i", $permohonan_id);
        $stmt->execute();
        $stmt->bind_result($existing_catatan);
        $stmt->fetch();
        $stmt->close();
        
        // Assign existing catatan to catatan variable
        $catatan = $existing_catatan;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $catatan = $_POST['catatan']; 
        
            $stmt = $conn->prepare("UPDATE permohonan SET catatan = ? WHERE permohonan_id = ?");
        
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }
        
            $bind_result = $stmt->bind_param("si", $catatan, $permohonan_id);
        
            if ($bind_result === false) {
                die("Error binding parameters: " . $stmt->error);
            }
        
            $execute_result = $stmt->execute();
        
            if ($execute_result === false) {
                die("Error executing statement: " . $stmt->error);
            } else {
                $success = true;
            }
        
            $stmt->close();
        }
        
        mysqli_close($conn);
        ob_end_flush();
        ?>
        <h2>Tambah/Ubah Catatan : <?php echo $permohonan_id; ?></h2>

        <div class="form-container">
            <form method="post" action="">
                <label for="catatan">Catatan:</label>
                <input type="text" id="catatan" name="catatan" value="<?php echo $catatan; ?>" placeholder="Write your catatan here">
                <h3 class="preview-title">Pratonton Data :</h3>
                <input type="text" id="existing-catatan" value="<?php echo $existing_catatan; ?>" readonly>
                <input type="submit" value="Hantar">
            </form> 

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo "<p>Catatan anda berjaya ditambah/dikemaskini!</p>";
            }
            ?>
        </div>
        
        <?php if($success) : ?>
            <script>
                alert("Catatan anda berjaya ditambah/dikemaskini!");
                window.location.href = 'mqrpsa_b.php';
            </script>
            <?php endif; 
        ?>
        
        <a href="mqrpsa_b.php" class="kembali-button">Kembali</a>

    </body>
</html>
