<?php
include './pdo.php';
$kw = isset($_GET['kw']) ? $_GET['kw'] : '';
$sql = "select * from sach where tensach like ?"; //CRUD - Read
$arr = ["%$kw%"];
$stm = $objPDO->prepare($sql);
$stm->execute($arr);
$n = $stm->rowCount();
$data = $stm->fetchAll();
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
        <h2>CRUD <a href='create.php'>Create</a> Read Update Delete</h2>
        <h3> Co <?php echo $n ?> cuon sach
        </h3>
        <form method=get action='index.php'>
            <input type="text" name='kw' value='<?php echo $kw ?>'><input type=submit value='Search'>
        </form>
        <table class='table table-bodered'>
            <?php
            foreach ($data as $r) {
            ?>
                <tr>
                    <td><?php echo $r['masach'] ?></td>
                    <td><?php echo $r['tensach'] ?></td>
                    <td><?php echo $r['gia'] ?></td>
                    <td><?php echo $r['hinh'] ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $r['masach'] ?>">Xoa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>