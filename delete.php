<?php
require 'conn.php';

$upload="uploads/";
if (isset($_GET['table'])) {
    $table=$_GET['table'];
    $id=$_GET['delid'];
    
    if ($table=="plannar") {
      $file=mysqli_query($conn,"SELECT * FROM $table WHERE id ='$id'");
      $f=mysqli_fetch_assoc($file);
       $str = ($f['file_name']);
      $files =  (explode("hellopapa",$str));
      $file_num = count($files);
      for ($i=0; $i <=$file_num-1 ; $i++) {
        $file =  base64_decode($files[$i]);
        unlink($upload.$file);
      }
    }
    $query="DELETE FROM $table WHERE id='$id'";
    $delete=mysqli_query($conn,$query);
    if ($delete) {
    header("location: index.php?pg=body/$table.php");
}
}
?>
