<?php
//table name before submit button as hidden
//submit button name add without value
//images must be sent with array
//............ORDER BY chiky bum....
function insert($table,$post,$files){
$upload ="upload/";
echo "INSERT INTO $table"."(";
//echo     $files['f']['name'][2]; //1.jpg
echo "<br>";
$file_num = count($files); ////  2 number of  inputs
$file_key=array_keys($files);///array
for ($i=0; $i <= $file_num-1; $i++) {
       echo $file_key[$i].",";////// distinct inputs f,g
}
$r = count($post)-2;
$p = array_keys($post);
for ($i=0; $i < $r; $i++) {
  echo $p[$i];
  if ($i <= $r-2) {
    echo ",";
  }
}
echo ") VALUES(";
$file_num = count($files); ////  2 number of  inputs
$file_key=array_keys($files);///array

for ($i=0; $i <= $file_num-1; $i++) {
           $files1 = $files[$file_key[$i]];
           $files_name = $files1['name'];//i really dont know why i am doing this.....
           $tmp_name=$files1['tmp_name'];
           $file_key1 = array_keys($files_name);
           $file_num1 = count($file_key1);/////images per input
           echo "'";
     for ($k=0; $k <= $file_num1 -1 ; $k++) {
       $name=time().$k.$files_name[$k];///unique name
      echo base64_encode($name); ///images of f ,images of g
            move_uploaded_file($tmp_name[$k],$upload.$name);
          $file_num2 = count($files_name);
             if ($k <= $file_num2-2) {
              echo "hellopapa";
            }
      echo "<br>";
     }
        echo "',";
}
for ($i=0; $i < $r; $i++) {
  echo "'".($post[$p[$i]])."'";
  if ($i <= $r-2) {
    echo ",";
  }
}
echo ")";
}
if (isset($_POST['add'])) {
    $table=$_POST['table_name'];
    ob_start();
    insert($table,$_POST,$_FILES);
    $query = ob_get_clean();
    $insert = mysqli_query($conn,$query);
  if ($insert) {
  header('Location: http://www.example.com/');
  }
}
?>
