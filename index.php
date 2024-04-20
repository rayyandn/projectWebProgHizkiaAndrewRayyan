<?php
$Perubahan = array();
if(isset($_COOKIE['HAHAHA'])){
    $datatersimpan = json_decode($_COOKIE['HAHAHA'], true);
    
    foreach($datatersimpan as $tersimpan){
        $Perubahan[] = $tersimpan;
    }
}
if(isset($_POST['simpan'])) {
    $updateData = array(
        'namaPerubah' => $_POST['namaTema'],
        'warnaBackground' => $_POST['warnaBackground'],
        'warnaHalam1' => $_POST['warnaH1'],
        'posisiText' => $_POST['penempatanHuruf'],
        'warnaText' => $_POST['warnaHuruf'],
        'sizeText' => $_POST['sizeHuruf']
    );
    $Perubahan[] = $updateData;
      
    $encodedData = json_encode($Perubahan);
      
    setcookie('HAHAHA', $encodedData, time() + (86400 * 1), "/"); 
      
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok HAHAHA </title>
</head>
<body>
    
        
    <form method="post" action="">
        <label>Theme : </label> 
        <select name = pemilihanTema> 
            <option value = disabled selected > --Choose Themes-- </option>
        <?php
            foreach($Perubahan as $key => $value){
                $judul = $value["namaPerubah"];
                echo "<option value=\"$judul\">$judul</option>";
            }
        
        ?>
        </select>
        <a href = "TambahTema.php"> ~~Create Theme~~</a>
        <br>
        <br>
        <input type="submit" name="memilihTema"value = "Choose The Theme">
    </form>
    <br>
    
  <?php if(isset($_POST['memilihTema']) && isset($_POST['pemilihanTema'])) { ?>
  <form method="post" action="Ubah.php">
    <input type="hidden" name="temaTerpilih" value="<?=$_POST['pemilihanTema']; ?>">
    <input type="submit" name="Ubah" value="Edit The Theme">
  </form>
  <?php } ?>
  
  <?php
    if(isset($_POST['memilihTema']) && isset($_POST['pemilihanTema'])) {
      $pilihNama = $_POST['pemilihanTema'];
      $temaTerpilih = null;
  
      foreach($Perubahan as $tersimpan) {
          if($tersimpan['namaPerubah'] === $pilihNama) {
              $temaTerpilih = $tersimpan;
              break;
          }
      }
      if($temaTerpilih !== null) {
          echo "
              <style>
                  body {
                      background-color: {$temaTerpilih['warnaBackground']};
                  }
                  h1 {
                      color: {$temaTerpilih['warnaHalam1']};
                      text-align: {$temaTerpilih['posisiText']};
                  }
                  p {
                      color: {$temaTerpilih['warnaText']};
                      font-size: {$temaTerpilih['sizeText']}px;
                  }
              </style>
          ";
      }
    }
  ?>
  

    <br>
    <br>
    <div style="width: 100%;
    height: 1px;
    background-color: black;"></div>
    <h1 style ="text-align: center">Heading 1</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</body>
</html>