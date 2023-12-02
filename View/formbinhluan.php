<?php
    session_start();
    include "../Model/connectdb.php";
    include "../Model/binhluan.php";
    if(isset($_SESSION['id']))
        $iduser=$_SESSION['id'];
    if(isset($_SESSION['user']))
        $user=$_SESSION['user'];
    $idprd=$_REQUEST['idprd'];

    if(isset($_POST['guibl']) && ($_POST['guibl'])){
        $noidung=$_POST['noidung'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date=date('h:i:sa d/m/Y');
        addnewbl($noidung, $iduser, $idprd, $date, $user);
        header("location: ".$_SERVER['HTTP_REFERER']);
    }

    $kq= getallbl($idprd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <style>
        .input {
            width: 80%;
        }

        .container1 {
            width: 80%;
            border: 1px solid;
            border-radius: 5px;
        }

        .mgl {
            margin-left: 1%;
            padding-bottom: 15px;
        }
    </style>
</head>
<body>
    <br>
    <div class="container1">
        <div class="mgl">
            <h3>Bình luận</h3>
            <br>
            <?php 
                foreach($kq as $bl){
                    echo '<h5>'.$bl['user'].'</h5>';
                    echo '<span>'.$bl['date'].'</span>';
                    echo '<br>';
                    echo '<p>'.$bl['noidung'].'</p>';
                }
            ?>
            <?php
                if(isset($_SESSION['user'])){
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <input type="hidden" name="idprd" value="<?=$idprd?>">
                <label for="comment" class="form-label">Nội dung bình luận:</label>
                <textarea class="form-control input" id="comment" name="noidung" require></textarea> <br>
                <input type="submit" name="guibl" value="Gửi">
            </form> 
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>