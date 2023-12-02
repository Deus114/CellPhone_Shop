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
                            $_SESSION['user']=$kq[0]['user'];
                            $_SESSION['password']=$kq[0]['password'];
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

            case 'userinfo':
                $user=$_SESSION['user'];
                $kq=getuser($user);
                include "View/userinfo.php";
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