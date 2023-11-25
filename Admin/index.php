<?php
    session_start();
    ob_start();
    include "../Model/connectdb.php";
    include "../Model/danhmuc.php";
    include "../Model/product.php";

    // Header
    include "View/header.php";

    //Controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'danhmucsanpham':
                // Lấy thông tin tất cả danh mục
                $kq=getall_dm();
                include "View/danhmuc.php";
                break;

            case 'deletedanhmuc':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    deletedanhmuc($id);
                }
                $kq=getall_dm();
                include "View/danhmuc.php";
                break;

            case 'modifyproduct':
                // Lấy ra sản phẩm tương ứng
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $product=getproduct($id);
                    $kq=getall_dm();
                    include "View/modifyproduct.php";
                }
                if(isset($_POST['id'])){
                    $id=$_POST['id'];
                    $tensp=$_POST['tensp'];
                    modifyproduct($id, $tensp);
                    $kq=getall_dm();
                    include "View/danhmuc.php";
                }
                break;

            case 'addnew':
                if(isset($_POST['addnewprd'])&&($_POST['addnewprd'])){
                    $tendanhmuc=$_POST['tendanhmuc'];
                    addnewdm($tendanhmuc);
                }
                // Lấy thông tin tất cả danh mục
                $kq=getall_dm();
                include "View/danhmuc.php";
                break;

            case 'addprd':
                if(isset($_POST['addnewprd'])&&($_POST['addnewprd'])){
                    $nameprd=$_POST['nameprd'];
                    $gia=$_POST['gia'];
                    $iddm=$_POST['iddm'];
                    // Lưu đường dẫn hình ảnh vào db và upload hình ảnh lên host
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $img=$target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    $uploadOk = 0;
                    }

                    if($uploadOk == 1){
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        addnewprd($nameprd,$img,$gia,$iddm);
                    }
                }
                // Lấy danh sách danh mục
                $listdm=getall_dm();
                // Lấy danh sách sản phẩm
                $kq=getall_prd();
                include "View/product.php";
                break;

            case 'quanlitaikhoan':
                include "View/user.php";
                break;
                
            case 'donhang':
                include "View/donhang.php";
                break;

            case 'product':
                $uploadOk = 1;
                // Lấy danh sách danh mục
                $listdm=getall_dm();
                // Lấy danh sách sản phẩm
                $kq=getall_prd();
                include "View/product.php";
                break;
            
            default :
                include "View/home.php";
                break;
        }
    }
    else{
        include "View/home.php";
    }

    //Footer
    include "View/footer.php";
?>