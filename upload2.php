<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    import_csv($target_file);
} else {
    echo "Sorry, there was an error uploading your file.";
}

function import_csv($filename) {
    // your database connection
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // your table fields mapping
    $fields_mapping = [
        'jenis_akreditasi' => 'jenis_permohonan',
        'lokasi' => 'kampus',
        // continue with your fields mapping
    ];

    if (($handle = fopen($filename, "r")) !== FALSE) {
        $header = fgetcsv($handle, 1000, "\t"); // assuming tab-separated values
        while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
            $num = count($data);
            $sql = "INSERT INTO permohonan (";
            foreach ($header as $i => $column) {
                if (isset($fields_mapping[$column])) {
                    $sql .= $fields_mapping[$column];
                    if ($i < $num - 1) {
                        $sql .= ', ';
                    }
                }
            }
            $sql .= ") VALUES (";
            for ($c=0; $c < $num; $c++) {
                $sql .= "'" . $data[$c] . "'";
                if ($c < $num - 1) {
                    $sql .= ', ';
                }
            }
            $sql .= ")";
            $conn->query($sql);
        }
        fclose($handle);
    }
    $conn->close();
}
?>
