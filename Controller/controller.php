<?php
    //Header
    include "View/header.php";

    if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act){
            // Chuyển đến trang login
            case 'login':
                include "View/login.php";
                break;

            // Chuyển đến trang đăng nhập
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
            
            // Thoát khỏi tài khoản người dùng
            case 'thoat':
                if(isset($_SESSION['role'])) unset($_SESSION['role']);
                if(isset($_SESSION['user'])) unset($_SESSION['user']);
                if(isset($_SESSION['password'])) unset($_SESSION['password']);
                if(isset($_SESSION['name'])) unset($_SESSION['name']);
                if(isset($_SESSION['avatar'])) unset($_SESSION['avatar']);
                header('location: index.php');
                break;

            // Chuyển đến trang đăng kí
            case 'signup':
                include "View/signup.php";
                break;

            // Kiểm tra đăng kí thành công hay không    
            case 'dangki':
                if(isset($_POST['dangki']) && ($_POST['dangki'])){
                    $user=$_POST['user'];
                    $pass=$_POST['password'];
                    $email=$_POST['email'];
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $err_text='Email có dạng stt@...';
                        include "View/signup.php";
                        break;
                    }
                    // Kiểm tra tên đăng nhập có tồn tại hay không
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
                    // Tên
                    if($name != ""){
                        $name = trim($name);
                        if(strlen($name)<2 || strlen($name)>30 || !preg_match('/^[\p{L} ]+$/u', $name)){
                            $texterr='Tên phải từ 2-30 ký tự, không có ký tự đặc biệt hay chứ số';
                            $user=$_SESSION['user'];
                            $kq=checkuser($user);
                            include "View/modifyinfo.php";
                            break;
                        }
                    }
                    //Email
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $texterr='Email có dạng stt@...';
                        $user=$_SESSION['user'];
                        $kq=checkuser($user);
                        include "View/modifyinfo.php";
                        break;
                    }
                    //Mật khẩu
                    if(strlen($password)<2 || strlen($password)>20){
                        $texterr='Mật Khẩu phải có từ 2-20 ký tự';
                        $user=$_SESSION['user'];
                         $kq=checkuser($user);
                        include "View/modifyinfo.php";
                        break;
                    }
                    // Điện thoại
                    if($sdt != ""){
                        // Loại bỏ khoảng trắng và các ký tự không phải số
                        $sdt = preg_replace('/[^0-9]/', '', $sdt);
                        if (strlen($sdt) != 10 && strlen($sdt) != 11) {
                            $texterr='Số điện thoại không hợp lệ';
                            $user=$_SESSION['user'];
                            $kq=checkuser($user);
                            include "View/modifyinfo.php";
                            break;
                        }
                    }
                    // Địa chỉ
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
                    modifyinfo($user,$name,$address,$email,$password,$img,$sdt);
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

            // Chuyển tới trang chi tiết sản phẩm
            case 'spchitiet':
                $idprd=$_GET['id'];
                $_SESSION['idprd']=$idprd;
                $listbl=getallbl($idprd);
                $kq=getproduct($idprd);
                include "View/spchitiet.php";
                break;

            // Thêm sản phẩm vào giỏ hàng
            case 'addtocart':
                // Trường hợp người dùng
                if(isset($_SESSION['user'])){
                    if(isset($_POST['addcart']) && ($_POST['addcart'])){
                        $user=checkuser($_SESSION['user']);
                        $idsp=$_POST['idsp'];
                        $sl=1;
                        $flag=0;
                        $cart=getcart($user[0]['id']);
                        if(count($cart) != 0){
                            $count=0;
                            foreach($cart as $item){
                                if($item['idsp']==$idsp){
                                    $slg=$cart[$count]['soluong']+1;
                                    modifysl($cart[$count]['id'],$slg);
                                    $flag=1;
                                    break;
                                }
                                $count++;
                            }
                        }
                        if($flag==0)
                            addcart($user[0]['id'],$idsp,$sl);
                    }
                    $kq=getcart($user[0]['id']);
                }
                // Trường hợp khách 
                else {
                    if(isset($_POST['addcart']) && ($_POST['addcart'])){
                        $idsp=$_POST['idsp'];
                        $kq=getproduct($idsp);
                        $tensp=$kq[0]['tensp'];
                        $image=$kq[0]['image'];
                        $gia=$kq[0]['gia'];
                        $sl=1;
                        $flag=0;
                        $count=0;
                        foreach($_SESSION['cart'] as $item){
                            if($item[0]==$tensp){
                                $slg=$item[3]+1;
                                $_SESSION['cart'][$count][3]=$slg;
                                $flag=1;
                                break;
                            }
                            $count++;
                        }
                        if($flag==0){
                            $item=array($tensp,$image,$gia,$sl);
                            $_SESSION['cart'][]=$item;

                        }
                    }
                }
                header('location: index.php?act=cart');
                break;

            // Chuyển tới trang giỏ hàng    
            case 'cart':
                // Trường hợp người dùng
                if(isset($_SESSION['user'])){
                    $user=checkuser($_SESSION['user']);
                    $kq=getcart($user[0]['id']);
                }
                include "View/cart.php";
                break;    
            
            // Xóa sp hoặc toàn bộ giỏ hàng
            case 'delcart':
                // Trường hợp người dùng
                if(isset($_SESSION['user'])){
                    // Xóa 1 item trong giỏ hàng
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        deletecart($id);
                        $user=checkuser($_SESSION['user']);
                        $kq=getcart($user[0]['id']);
                        include "View/cart.php";
                    }
                    // Xóa tất cả
                    else {
                        $user=checkuser($_SESSION['user']);
                        deleteallcart($user[0]['id']);
                        $kq=getcart($user[0]['id']);
                        include "View/cart.php";
                    }
                }
                // Trường hợp khách
                else {
                    // Xóa 1 item trong giỏ hàng
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        array_splice( $_SESSION['cart'], $id, 1);
                        include "View/cart.php";
                    }
                    // Xóa tất cả
                    else {
                        unset($_SESSION['cart']);
                        include "View/cart.php";
                    }
                }
                break;
            
            // Tăng giảm số lượng 1 sản phẩm trong giỏ hàng
            case 'giamsl':
                // Trường học người dùng
                if(isset($_SESSION['user'])){
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $cart=getcartbyID($id);
                        $slg=$cart[0]['soluong']-1;
                        if($slg==0)
                            deletecart($id);
                        else 
                            modifysl($id,$slg);
                        $user=checkuser($_SESSION['user']);
                        $kq=getcart($user[0]['id']);
                        header('location: index.php?act=cart');
                    }
                }
                // Trường hợp khách
                else {
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $slg=$_SESSION['cart'][$id][3]-1;
                        if($slg==0)
                            array_splice( $_SESSION['cart'], $id, 1);
                        else 
                            $_SESSION['cart'][$id][3]=$slg;
                        header('location: index.php?act=cart');
                    }
                }
                break;

            case 'tangsl':
                // Trường hợp người dùng
                if(isset($_SESSION['user'])){
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $cart=getcartbyID($id);
                        $slg=$cart[0]['soluong']+1;
                        modifysl($id,$slg);
                        $user=checkuser($_SESSION['user']);
                        $kq=getcart($user[0]['id']);
                        header('location: index.php?act=cart');
                    }
                }
                // Trường hợp khách
                else {
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $slg=$_SESSION['cart'][$id][3]+1;
                        $_SESSION['cart'][$id][3]=$slg;
                        header('location: index.php?act=cart');
                    }
                }
                break;

            // Chuyển qua trang đặt hàng
            case 'dathang':
                // Trường hợp người dùng
                if(isset($_SESSION['user'])){
                    $user=checkuser($_SESSION['user']);
                    $cart=getcart($user[0]['id']);
                    $tt=0;
                    $count=0;
                    $noidung="";
                    foreach($cart as $item){
                        $sp=getproduct($item['idsp']);
                        $tt+=$item['soluong']*$sp[0]['gia'];
                        if($count != 0)
                            $noidung.=", ";
                        $noidung.=$sp[0]['tensp'];
                        $noidung.=" * ";
                        $noidung.=$item['soluong'];
                        $count++;
                    }
                    include "View/thanhtoan.php";
                }
                // Trường hợp khách
                else {
                    $tt=0;
                    $noidung="";
                    $count=0;
                    foreach($_SESSION['cart'] as $item){
                        $tt+=$item[3]*$item[2];
                        if($count != 0)
                            $noidung.=", ";
                        $noidung.=$item[0];
                        $noidung.=" * ";
                        $noidung.=$item[3];
                        $count++;
                    }
                    include "View/thanhtoan.php";
                }
                break;

            // Chuyển đến trang thanh toán
            case 'xacnhan':
                if(isset($_POST['iduser']))
                    $iduser=$_POST['iduser'];
                else 
                    $iduser=0;
                $pttt=$_POST['pttt'];
                $noidung=$_POST['noidung'];
                $thanhtien=$_POST['thanhtien'];
                $name=$_POST['hovaten'];
                $email=$_POST['email'];
                $sdt=$_POST['sdt'];
                $address=$_POST['address'];
                $madonhang="SP";
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date=date('h:ia d/m/Y');
                // Kiểm tra hợp lệ
                // Tên
                $name = trim($name);
                if(strlen($name)<2 || strlen($name)>30 || !preg_match('/^[\p{L} ]+$/u', $name)){
                    $_SESSION['texterr']='Tên phải từ 2-30 ký tự, không có ký tự đặc biệt hay chứ số';
                    $user=$_SESSION['user'];
                    $kq=checkuser($user);
                    header('location: index.php?act=dathang');
                    break;
                }
                
                //Email
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $_SESSION['texterr']='Email có dạng stt@...';
                    $user=$_SESSION['user'];
                    $kq=checkuser($user);
                    header('location: index.php?act=dathang');
                    break;
                }
                // Điện thoại
                // Loại bỏ khoảng trắng và các ký tự không phải số
                $sdt = preg_replace('/[^0-9]/', '', $sdt);
                if (strlen($sdt) != 10 && strlen($sdt) != 11) {
                    $_SESSION['texterr']='Số điện thoại không hợp lệ';
                    $user=$_SESSION['user'];
                    $kq=checkuser($user);
                    header('location: index.php?act=dathang');
                   break;
                }
                // Địa chỉ
                if(strlen($address)<2 || strlen($address)>30){
                    $_SESSION['texterr']='Địa chỉ nhà không hợp lệ';
                    $user=$_SESSION['user'];
                    $kq=checkuser($user);
                    header('location: index.php?act=dathang');
                    break;
                }
                unset($_SESSION['texterr']);
                addnewdh($madonhang, $noidung, $thanhtien, $iduser, $name, $sdt, $email, $address, $pttt, $date);
                // Trường hợp người dùng
                if(isset($_SESSION['user'])){
                    $user=checkuser($_SESSION['user']);
                    deleteallcart($user[0]['id']);
                }
                // Trường hợp khách
                else {
                    unset($_SESSION['cart']);
                }
                if(isset($_SESSION['user']))
                    $_SESSION['success']='Bạn đã đặt hàng thành công';
                else    
                    $_SESSION['success']='Bạn đã đặt hàng thành công bạn sẽ nhận được email và cuộc gọi xác nhận';
                header('location: index.php?act=cart');
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