<?php
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$kelamin = $_POST['kelamin'];
// File yang diupload
$file = $_FILES['image'];

// Error checking
if($file['error'] != 0){
    die("An error occurred while uploading the file");
}

// File name
$fileName = $file['name'];

// File tmp name
$fileTmpName = $file['tmp_name'];

// File extension
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

// Allowed file extensions
$allowed = array('jpg', 'jpeg', 'png', 'gif');

// Check if file extension is allowed
if(!in_array($fileActualExt, $allowed)){
    die("File type not allowed");
}

// File new name
$fileNewName = uniqid('', true).".".$fileActualExt;

// Destination folder
$fileDestination = 'source/'.$fileNewName;

// Move file to destination folder
move_uploaded_file($fileTmpName, $fileDestination);

// Get image size
list($width, $height) = getimagesize($fileDestination);

// Insert image data into database
require_once 'config.php';
$sql = "INSERT INTO indentitas (name, path, nama, kelas, kelamin)
VALUES ('$fileName', '$fileDestination', '$nama', '$kelas', '$kelamin')";
$stmt = $link->prepare($sql);
$stmt->execute();

header("location: tampil.php");
exit();
?>
