<!DOCTYPE html>
<html>
<head>
  <title>STATUS PERMOHONAN BY PROGRAM</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    
    h1 {
      text-align: center;
    }
    
    form {
      max-width: 800px;
      margin: 0 auto;
    }
    
    label {
      display: block;
      margin-bottom: 8px;
    }
    
    input[type=text], input[type=date] {
      padding: 8px;
      font-size: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
      width: 100%;
      max-width: 300px;
      box-sizing: border-box;
    }
    
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 16px;
    }
    
    th, td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }
    
    th {
      background-color: #4CAF50;
      color: white;
    }
    
    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>
<body>

  <h1>STATUS PERMOHONAN BY PROGRAM</h1>
  
  <form>
    <label for="nama_program">Nama Program:</label>
    <input type="text" id="nama_program" name="nama_program">
    <br><br>
    <label for="jenis_akreditasi">Jenis Akreditasi:</label>
    <input type="text" id="jenis_akreditasi" name="jenis_akreditasi">
    <br><br>    
    <label for="kod_program">Kod Program:</label>
    <input type="text" id="kod_program" name="kod_program">
    <br><br>
    <label for="kolej_pengajian">Kolej Pengajian/Fakulti/Kampus:</label>
    <input type="text" id="kolej_pengajian" name="kolej_pengajian">
    <br><br>
    <label for="alamat_program">Alamat Program Dijalankan:</label>
    <input type="text" id="alamat_program" name="alamat_program">
    <br><br>
    <label for="tarikh_penghantaran">Tarikh Penghantaran Dokumen:</label>
    <input type="date" id="tarikh_penghantaran" name="tarikh_penghantaran">
    <br><br>
    <input type="submit" value="Cari">
  </form>
  
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Tarikh</th>
        <th>Status</th>
        <th>Catatan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>01/01/2022</td>
        <td>Terima dokumen</td>
        <td>-</td>
      </tr>
      
      <tr>
        <td>2</td>
        <td>02/01/2022</td>
        <td>Lantik Panel</td>
        <td>-</td>
      </tr>
      <tr>
        <td>3</td>
        <td>03/01/2022</td>
        <td>Penilaian Pertama</td>
        <td>-</td>
      </tr>
      <tr>
        <td>4</td>
        <td>04/01/2022</td>
        <td>Maklumbalas</td>
        <td>-</td>
      </tr>
      <tr>
        <td>5</td>
        <td>05/01/2022</td>
        <td>Penilaian kedua</td>
        <td>-</td>
      </tr>
      <tr>
        <td>6</td>
        <td>06/01/2022</td>
        <td>JKPPP</td>
        <td>-</td>
      </tr>
      <tr>
        <td>7</td>
        <td>07/01/2022</td>
        <td>Senat</td>
        <td>-</td>
      </tr>
      <tr>
        <td>8</td>
        <td>08/01/2022</td>
        <td>Penghantaran ke MQA</td>
        <td>-</td>
      </tr>
      <tr>
        <td>9</td>
        <td>09/01/2022</td>
        <td>Tersenarai di MQR</td>
        <td>-</td>
      </tr>
      <tr>
        <td>10</td>
        <td>10/01/2022</td>
        <td>Selesai</td>
        <td>-</td>
      </tr>
    </tbody>
  </table>

</body>
</html>

