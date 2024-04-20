<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD THEME</title>
</head>
<body>
<form method="post" action="Beranda.php">
        <label>Name Of The Theme : </label>
        <input type="text" name="namaTema" value="">
        <br>
        <br>

        <label>Color Of The Page Background : </label>
        <input type="color" name="warnaBackground" value="">
        <br>
        <br>

        <label>Color Of The Heading 1 : </label>
        <input type="color" name="warnaH1" value="">
        <br>
        <br>

        <label>Alignment Of The Heading 1 : </label>
        <select name="penempatanHuruf" >
            <option value="left"  >Left</option>
            <option value="center"  >Center</option>
            <option value="right"  >Right</option>
        </select>
        <br>
        <br>

        <label>Color Of Paragraph : </label>
        <input type="color" name="warnaHuruf" value="">
        <br>
        <br>

        <label>Font Size Of Paragraph : </label>
        <input type="number" name="sizeHuruf"min="1" max="100" value="1" value="">
        <label>px </label>
        <br>
        <br>
        
        <input type="submit" name="simpan" value="SAVE">	
    </form>
</body>
</html>