<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $uploadDir = 'public/assets/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $extensions_ok = ['jpg', 'jpeg', 'png'];
    $maxFileSize = 1000000;

    if ((!in_array($extension, $extensions_ok))) {
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
    }

    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
        $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload a file</title>
</head>

<body>
    <h3>HOMER J.SIMPSON</h3>
    <p> 30 ans</p>
    <form method="post" enctype="multipart/form-data">
        <label for="imageUpload">Upload an profile image</label><br><br>
        <input type="file" name="avatar" id="imageUpload" /><br><br>
        <button name="send">Send</button>
    </form>
</body>

</html>