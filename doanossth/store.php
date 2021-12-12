<?php 
include './pdo.php';
$masach = $_POST['masach'];
$tensach = $_POST['tensach'];
$gia = $_POST['gia'];
$mota = $_POST['mota'];
$maloai = $_POST['maloai'];
$manxb = $_POST['manxb'];

$hinh = time().'-'.$_FILES['hinh']['name'];
move_uploaded_file($_FILES['hinh']['tmp_name'], "img/$hinh");

$sql="insert into sach(masach, tensach, gia, hinh,mota, maloai, manxb)
     values(?,?,?,?,?,?,?) ";
$a =[$masach, $tensach, $gia, $hinh, $mota, $maloai, $manxb];

$stm = $objPDO->prepare($sql);
$stm->execute($a);
header('location:index.php');
