<?php 
include './pdo.php';

$masach = isset($_GET['id'])?$_GET['id']:'';
if ($masach !='')
{
    $sql="delete  from sach where masach=?";//CRUD - Read
    $a = [$masach];
    $stm = $objPDO->prepare($sql);
    $stm->execute($a);
    $n = $stm->rowCount();
}
header('location:index.php');
