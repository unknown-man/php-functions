<?php
if (isset($_GET['table'])) {
    $table=$_GET['table'];
    $id=$_GET['delid'];
$query="DELETE FROM $table WHERE id='$id'";
$delete=mysqli_query($conn,$query);
if ($delete) {
header("location: index.php?pg=data/$table.php");
}
}
?>
