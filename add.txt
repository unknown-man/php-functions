<?php
//table name before submit button as hidden
//submit button name add
require 'conn.php';
function insert($table,$post){
echo "INSERT INTO $table"."(";
$r = count($post)-2;
$p = array_keys($post);
for ($i=0; $i < $r; $i++) {
  echo $p[$i];
  if ($i <= $r-2) {
    echo ",";
  }
}
echo ") VALUES(";
for ($i=0; $i < $r; $i++) {
  echo "'".base64_encode($post[$p[$i]])."'";
  if ($i <= $r-2) {
    echo ",";
  }
}
echo ")";
}

if (isset($_POST['add'])) {
    $table=$_POST['table_name'];
    ob_start();
    insert($table,$_POST);
    $query = ob_get_clean();
  $insert = mysqli_query($conn,$query);
if ($insert) {
header('Location: http://www.example.com/');
}
}
?>
