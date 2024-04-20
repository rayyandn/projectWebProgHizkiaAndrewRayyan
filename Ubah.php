<?php
$perubahan = array();
if(isset($_COOKIE['HAHAHA'])) {
    $datatersimpan = json_decode($_COOKIE['HAHAHA'], true);

    foreach($datatersimpan as $tersimpan) {
        $perubahan[] = $tersimpan;
    }
}
if(isset($_POST['Ubah']) && isset($_POST['temaTerpilih']) ) {
    $tema =  $_POST['temaTerpilih'] ;
    $temaPilihan = null; 
    $indexTemaPilihan = null;
    foreach($perubahan as $index => $tersimpan) {
        if($tersimpan['namaPerubah'] === $tema) {
            $temaPilihan = $tersimpan;
            $indexTemaPilihan = $index;
            break;
        }
    }
    if($indexTemaPilihan !== null) {
        unset($perubahan[$indexTemaPilihan]);
        $encodedData = json_encode($perubahan);
        setcookie('HAHAHA', $encodedData, time() + (86400 * 1), "/"); 
    }
    
}
if(isset($_POST['submit'])) {
    
    $updateData= array(
        'namaPerubah' => $_POST['namaTema'],
        'warnaBackground' => $_POST['warnaBackground'],
        'warnaHalam1' => $_POST['warnaH1'],
        'posisiText' => $_POST['penempatanHuruf'],
        'warnaText' => $_POST['warnaHuruf'],
        'sizeText' => $_POST['sizeHuruf']
    );
    
    $perubahan[] = $updateData;
    $encodedData = json_encode($perubahan);

    setcookie('HAHAHA', $encodedData, time() + (86400 * 1), "/"); 

    header('Location: Beranda.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
</head>
<body>
<?php
    echo "<form method=\"post\" action=\"Ubah.php\">
    <label>Name Of The Theme : </label>
    <input type=\"text\" name=\"namaTema\" value=\"" . ($temaPilihan['namaPerubah'] ?? '') . "\">
    <br>
    <br>

    <label>Color Of The Page Background : </label>
    <input type=\"color\" name=\"warnaBackground\" value=\"" . ($temaPilihan['warnaBackground'] ?? '') . "\">
    <br>
    <br>

    <label>Color Of The Heading 1 : </label>
    <input type=\"color\" name=\"warnaH1\" value=\"" . ($temaPilihan['warnaHalam1'] ?? '') . "\">
    <br>
    <br>

    <label>Alignment Of The Heading 1 : </label>
    <select name=\"penempatanHuruf\">
        <option value=\"left\" " . (($temaPilihan['posisiText'] ?? '') == 'left' ? 'selected' : '') . ">Left</option>
        <option value=\"center\" " . (($temaPilihan['posisiText'] ?? '') == 'center' ? 'selected' : '') . ">Center</option>
        <option value=\"right\" " . (($temaPilihan['posisiText'] ?? '') == 'right' ? 'selected' : '') . ">Right</option>
    </select>
    <br>
    <br>

    <label>Color Of Paragraph : </label>
    <input type=\"color\" name=\"warnaHuruf\" value=\"" . ($temaPilihan['warnaText'] ?? '') . "\">
    <br>
    <br>

    <label>Font Size Of Paragraph : </label>
    <input type=\"number\" name=\"sizeHuruf\" min=\"1\" max=\"100\" value=\"" . ($temaPilihan['sizeText'] ?? '') . "\">
    <label>px </label>
    <br>
    <br>
    
    <input type=\"submit\" name=\"submit\" value=\"SAVE\">	
</form> ";
?>
</body>
</html>