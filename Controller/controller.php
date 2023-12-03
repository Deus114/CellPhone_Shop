<?php
    //Header
    include "View/header.php";


    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act){
            // Chuyển đến trang login
            case 'login':
                include "View/login.php";
                break;

            case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $user=$_POST['user'];
                    $pass=$_POST['password'];
                    $kq=getuserinfo($user, $pass);
                    if(count($kq) > 0){
                        $role=$kq[0]['role'];
                        if($role == 1){
                            $_SESSION['role']=$role;
                            header('location: Admin/index.php');
                        }
                        else{
                            $_SESSION['role']=$role;
                            $_SESSION['avatar']=$kq[0]['avatar'];
                            $_SESSION['user']=$kq[0]['user'];
                            $_SESSION['password']=$kq[0]['password'];
                            $_SESSION['id']=$kq[0]['id'];
                            if($kq[0]['name'] == "") $_SESSION['name']=$kq[0]['user'];
                            else $_SESSION['name']=$kq[0]['name'];
                            header('location: index.php');
                        }
                    }
                    else {
                        $err_text="Username hoặc password không tồn tại";
                        include "View/login.php";
                    }
                    
                }
                break;
            
            case 'thoat':
                if(isset($_SESSION['role'])) unset($_SESSION['role']);
                if(isset($_SESSION['user'])) unset($_SESSION['user']);
                if(isset($_SESSION['password'])) unset($_SESSION['password']);
                if(isset($_SESSION['name'])) unset($_SESSION['name']);
                if(isset($_SESSION['avatar'])) unset($_SESSION['avatar']);
                header('location: index.php');
                break;

            case 'signup':
                include "View/signup.php";
                break;

            case 'dangki':
                if(isset($_POST['dangki']) && ($_POST['dangki'])){
                    $user=$_POST['user'];
                    $pass=$_POST['password'];
                    $email=$_POST['email'];
                    $kq=checkuser($user);
                    if(count($kq) == 0){
                        addnewuser($user, $pass, $email);
                        $success_text="Đăng kí thành công mời bạn đăng nhập";
                    }
                    else {
                        $err_text="Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác";
                    }
                }
                include "View/signup.php";
                break;

            // Chuyển tới trang thông tin cá nhân
            case 'userinfo':
                $user=$_SESSION['user'];
                $kq=checkuser($user);
                include "View/userinfo.php";
                break;

            // Chuyển tới form chỉnh sửa thông tin cá nhân
            case 'modifyinfo':
                if(isset($_POST['thaydoi']) && ($_POST['thaydoi'])){
                    if($_POST['img'] != ""){
                        $target_dir = "upload/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        $img= $target_file;
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
                            $uploadOk = 0;
                            include "View/modifyinfo.php";
                            break;
                        }
                        if($uploadOk == 1){
                            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        }
                    } else{
                        $img="";
                    }
                    
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $sdt=$_POST['sdt'];
                    $address=$_POST['address'];
                    // Kiểm tra hợp lệ
                    if($name != ""){
                        $name = trim($name);
                        if(strlen($name)<2 || strlen($name)>30 || !preg_match('/^[\p{L} ]+$/u', $name)){
                            $texterr=$name;
                            $user=$_SESSION['user'];
                            $kq=checkuser($user);
                            include "View/modifyinfo.php";
                            break;
                        }
                    }
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $texterr='Email có dạng stt@...';
                        $user=$_SESSION['user'];
                        $kq=checkuser($user);
                        include "View/modifyinfo.php";
                        break;
                    }
                    if(strlen($password)<2 || strlen($password)>20){
                        $texterr='Mật khâir phải có từ 2-20 ký tự';
                        $user=$_SESSION['user'];
                         $kq=checkuser($user);
                        include "View/modifyinfo.php";
                        break;
                    }
                    if(strlen($password)<2 || strlen($password)>20){
                        $texterr='Mật khâir phải có từ 2-20 ký tự';
                        $user=$_SESSION['user'];
                         $kq=checkuser($user);
                        include "View/modifyinfo.php";
                        break;
                    }
                    if($sdt != '0'){
                        // Loại bỏ khoảng trắng và các ký tự không phải số
                        $sdt = preg_replace('/[^0-9]/', '', $sdt);
                        if (strlen($sdt) != 10 || strlen($sdt) != 11) {
                            $texterr='Số điện thoại không hợp lệ';
                            $user=$_SESSION['user'];
                            $kq=checkuser($user);
                            include "View/modifyinfo.php";
                            break;
                        }
                    }
                    if($address != ""){
                        if(strlen($address)<2 || strlen($address)>30){
                            $texterr='Địa chỉ nhà không hợp lệ';
                            $user=$_SESSION['user'];
                             $kq=checkuser($user);
                            include "View/modifyinfo.php";
                            break;
                        }
                    }
                    $user=$_SESSION['user'];
                    modifyinfo($user,$name,$address,$email,$password,$img);
                    $kq=checkuser($user);
                    if($kq[0]['name'] == "") $_SESSION['name']=$kq[0]['user'];
                    else $_SESSION['name']=$kq[0]['name'];
                    $_SESSION['avatar']=$kq[0]['avatar'];
                    $_SESSION['success']='Chỉnh sửa thành công';
                    header('location: index.php?act=userinfo');
                    break;
                }
                $user=$_SESSION['user'];
                $kq=checkuser($user);
                include "View/modifyinfo.php";
                break;

            case 'spchitiet':
                $idprd=$_GET['id'];
                $_SESSION['idprd']=$idprd;
                $listbl=getallbl($idprd);
                $kq=getproduct($idprd);
                include "View/spchitiet.php";
                break;

            default:
                $listdm=getall_dm();
                $kq=get_sptieubieu();
                include "View/home.php";
        }
    } else {
        $listdm=getall_dm();
        $kq=get_sptieubieu();
        include "View/home.php";
    }

    //Footer
    include "View/footer.php";
?>