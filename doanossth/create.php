<?php 
include './pdo.php';
$sql="select * from nhaxb";//CRUD - Read
$stm = $objPDO->prepare($sql);
$stm->execute();
$dataNXB =$stm->fetchAll();

$sql="select * from loai";//CRUD - Read
$stm = $objPDO->prepare($sql);
$stm->execute();
$dataLoai =$stm->fetchAll();
//echo '<pre>';print_r($data); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
    <h2>CRUD  <a href='create.php'>Create</a> Read Update Delete</h2>
    <h3> Them moi</h3>
       <form action="store.php" method=post enctype='multipart/form-data'>
           <table>
               <tr>
                   <td>masach</td>
                   <td><input type=text name='masach'></td>
               </tr>
               <tr>
                   <td>Ten</td>
                   <td><input type=text name='tensach'></td>
               </tr>
               <tr>
                   <td>Gia</td>
                   <td><input type=number name='gia'></td>
               </tr>
               <tr>
                   <td>Hinh</td>
                   <td><input type=file name=hinh></td>
               </tr>
               <tr>
                   <td>Jmo ta</td>
                   <td>
                       <textarea name="mota" id="" cols="30" rows="4"></textarea>
                   </td>
               </tr>
               <tr>
                   <td>Loai</td>
                   <td>
                   <select name="maloai" id="">
                           <?php 
                            foreach($dataLoai as $r)
                            {
                                ?>
                                <option value="<?php echo $r['maloai'] ?>"><?php echo $r['tenloai'] ?></option>
                                <?php
                            }
                           ?>
                       </select>
                   </td>
               </tr>
               <tr>
                   <td>Nha xb</td>
                   <td>
                       <select name="manxb" id="">
                           <?php 
                            foreach($dataNXB as $r)
                            {
                                ?>
                                <option value="<?php echo $r['manxb'] ?>"><?php echo $r['tennxb'] ?></option>
                                <?php
                            }
                           ?>
                       </select>
                   </td>
               </tr>
               <tr>
                   
                   <td colspan=2>
                       <input type="submit">
                   </td>
               </tr>
           </table>
       </form>
    </div>
</body>
</html>