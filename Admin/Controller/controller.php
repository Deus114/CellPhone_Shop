<?php
    // Kiểm tra role để biết có phải là admin không
    if(isset($_SESSION['role']) && ($_SESSION['role']==1)){
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
                
                // Chỉnh sửa danh mục sản phẩm
                case 'modifydanhmuc':
                    // Lấy ra sản phẩm tương ứng
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $dm=getdm($id);
                        $kq=getall_dm();
                        include "View/modifydanhmuc.php";
                    }
                    if(isset($_POST['id'])){
                        $id=$_POST['id'];
                        $tendanhmuc=$_POST['tendanhmuc'];
                        $hienthi=$_POST['hienthi'];
                        modifydm($id, $tendanhmuc, $hienthi);
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

                //Thêm một sản phẩm mới
                case 'addprd':
                    if(isset($_POST['addnewprd'])&&($_POST['addnewprd'])){
                        $nameprd=$_POST['nameprd'];
                        $gia=$_POST['gia'];
                        $iddm=$_POST['iddm'];
                        // Lưu đường dẫn hình ảnh vào db và upload hình ảnh lên host
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        $img= $target_file;
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
                    $kq=getall_user();
                    include "View/quanlytk.php";
                    break;

                case 'deleteuser':
                    $id=$_GET['id'];
                    deleteuser($id);
                    $kq=getall_user();
                    include "View/quanlytk.php";
                    break;

                case 'modifyuser':
                    $id=$_GET['id'];
                    $kq=getkuser($id);
                    include 'View/modifyuser.php';
                    break;

                case 'updateuser':
                    $id=$_POST['id'];
                    $role=$_POST['role'];
                    $banchat=$_POST['banchat'];
                    $banbuy=$_POST['banbuy'];
                    modifyuser($id,$role,$banbuy,$banchat);
                    $kq=getall_user();
                    include "View/quanlytk.php";
                    break;
                    
                case 'donhang':
                    $kq=getall_dh();
                    include "View/quanlydh.php";
                    break;

                case 'deletedh':
                    $id=$_GET['id'];
                    deletedh($id);
                    $kq=getall_dh();
                    include "View/quanlydh.php";
                    break;

                case 'product':
                    // Lấy danh sách danh mục
                    $listdm=getall_dm();
                    // Lấy danh sách sản phẩm
                    $kq=getall_prd();
                    include "View/product.php";
                    break;
                
                // Chuyển tới trang cập nhật thông tin sản phẩm
                case 'updateprd':
                    // Lấy danh sách danh mục
                    $listdm=getall_dm();
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $prd=getproduct($_GET['id']);
                    }
                    // Lấy danh sách sản phẩm
                    $kq=getall_prd();
                    include "View/updateprd.php";
                    break;
                
                // Khi đã sửa đổi thông tin và bấm nút cập nhật ở trang cập nhật thông tin sản phẩm
                case 'updateproduct':
                    // Lấy danh sách danh mục
                    $listdm=getall_dm();
                    if(isset($_POST['update'])&&($_POST['update'])){
                        $nameprd=$_POST['nameprd'];
                        $gia=$_POST['gia'];
                        $iddm=$_POST['iddm'];
                        $id=$_POST['id'];
                        $sptieubieu=$_POST['sptieubieu'];
                        $mota=$_POST['mota'];
                        $chitiet=$_POST['chitiet'];
                        $hienthi=$_POST['hienthi'];
                        if($_FILES["img"]["name"] != ""){
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
                        } else {
                            $img="";
                        }
                        modifyproduct($id, $nameprd, $img, $gia, $iddm, $sptieubieu, $mota, $chitiet, $hienthi);
                    }
                    // Lấy danh sách sản phẩm
                    $kq=getall_prd();
                    include "View/product.php";
                    break;
                
                case 'deleteprd':
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        deleteprd($id);
                    }
                    $listdm=getall_dm();
                    $kq=getall_prd();
                    include "View/product.php";
                    break;

                case 'thoat':
                    if(isset($_SESSION['role'])) unset($_SESSION['role']);
                    header('location: ../index.php');
                    break;

                // Quản lý bình luận
                case 'binhluan':
                    $kq=getall_bl();
                    include "View/quanlybl.php";
                    break;
                    
                // Xóa bình luận
                case 'deletebl':
                    $id=$_GET['id'];
                    deletebl($id);
                    $kq=getall_bl();
                    include "View/quanlybl.php";
                    break;

                // Chỉnh sửa footer
                case 'footer':
                    $kq=getall_lhgt();
                    include "View/quanlygtlh.php";
                    break;

                case 'modifyfooter':
                    $lienhe=$_POST['lienhe'];
                    $gioithieu=$_POST['gioithieu'];
                    $tintuc=$_POST['tintuc'];
                    modifylhgt($lienhe, $gioithieu, $tintuc);
                    $kq=getall_lhgt();
                    include "View/quanlygtlh.php";
                    break;

                case 'sort':
                    if($_GET['id']==1)
                        $kq=getall_hp();
                    else    
                        $kq=getall_lp();
                    $listdm=getall_dm();
                    include "View/product.php";
                    break;

                case 'sortview':
                    if($_GET['id']==1)
                        $kq=getall_hw();
                    else    
                        $kq=getall_lw();
                    $listdm=getall_dm();
                    include "View/product.php";
                    break;

                case 'sortbuy':
                    if($_GET['id']==1)
                        $kq=getallsp();
                    else    
                        $kq=getall_lb();
                    $listdm=getall_dm();
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
    } else 
        header('location: ../index.php');
?>