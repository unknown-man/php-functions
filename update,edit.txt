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
