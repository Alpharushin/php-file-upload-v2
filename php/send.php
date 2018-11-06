<?php 

/*echo "<pre>";
print_r($_FILES);
echo "</pre>";
exit();*/

/*echo count($_FILES['images']['name']);
exit();*/

$extensions = array("jpeg","jpg","png");
$maxFileSize = 2097152;

if ( isset($_FILES['images'])) {
 
  for ($i=0; $i < count($_FILES['images']['name']) ; $i++) { 

    $fileExt = explode('.',$_FILES['images']['name'][$i]);
    $fileExt = end($fileExt);
    $fileExt = strtolower($fileExt);
  
  
    if (!in_array($fileExt, $extensions)) {
      $errors[] = "Неверный формат файла";
      
    }
  
    if ($_FILES['images']['size'][$i] > $maxFileSize) {
      $errors[] = "Файл должен быть не более 2Мб";
    }
  
    if (empty($errors)) {
      move_uploaded_file($_FILES['images']['tmp_name'][$i] , '../images/'.$_FILES['images']['name'][$i]);
      echo "Файл загружен успешно!<br>";
    } else {
      print_r($errors);
      exit();
    }
  
  
    
  }

}



exit();



?>