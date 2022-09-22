<?php
//table name before submit button as hidden
//id befoe submit button as hidden
//submit button name add
require 'conn.php';
function update($table,$post,$id){
  $r = count($post)-3;
  $p = array_keys($post);
  echo "UPDATE $table SET ";

  for ($i=0; $i < $r; $i++) {
    echo $p[$i]." = '".base64_encode($post[$p[$i]])."'";
    if ($i <= $r-2) {
      echo ", ";
      }
    }
  echo " WHERE id = $id";
}

if (isset($_POST['edit'])) {
    $table=$_POST['table_name'];
    $id=$_POST['id'];
    ob_start();
    update($table,$_POST,$id);
    $query = ob_get_clean();

  $update = mysqli_query($conn,$query);
if ($update) {
header("location: ../../index.php?pg=data/$table.php");
}
}





















//table name before submit button as hidden
//id befoe submit button as hidden
//submit button name edit
require 'conn.php';
function update($table,$post,$files,$id){
  $upload="../uploads/";
  $r = count($post)-3;
  $p = array_keys($post);
  echo "UPDATE $table SET ";

  $file_num = count($files); ////  2 number of  inputs
  $file_key=array_keys($files);///array

  for ($i=0; $i <= $file_num-1; $i++) {

             $files1 = $files[$file_key[$i]];
             $files_name = $files1['name'];//i really dont know why i am doing this.....
             $tmp_name=$files1['tmp_name'];
             $file_key1 = array_keys($files_name);
             $file_num1 = count($file_key1);/////images per input
if (!empty(trim($files_name[0]))) {

             echo ($file_key[$i])." = '";

       for ($k=0; $k <= $file_num1 -1 ; $k++) {
         if (!empty(trim($files_name[$k]))) {
         $name=time().$k.$files_name[$k];///unique name
        echo base64_encode($name); ///images of f ,images of g
              move_uploaded_file($tmp_name[$k],$upload.$name);
            $file_num2 = count($files_name);
               if ($k <= $file_num2-2) {
                echo "hellopapa";
              }
       }
     }
          echo "',";
  }
}

  for ($i=0; $i < $r; $i++) {
    echo $p[$i]." = '".base64_encode($post[$p[$i]])."'";
    if ($i <= $r-2) {
      echo ", ";
      }
    }
  echo " WHERE id = $id";
}

if (isset($_POST['edit'])) {
    $table=$_POST['table_name'];
    $id=$_POST['id'];
    ob_start();
    update($table,$_POST,$_FILES,$id);
    $query = ob_get_clean();
//echo $query;
 $update = mysqli_query($conn,$query);
if ($update) {
header("location: ../index.php?pg=body/$table.php");
}
}


