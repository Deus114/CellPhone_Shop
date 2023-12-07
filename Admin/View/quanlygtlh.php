    <div class="bg-light d-flex align-items-center justify-content-center border rounded-3 p-1 p-sm-3 m-2 m-sm-4">
        <h2>Quản lí thông tin hiển thị ở footer</h2>
    </div>
    <!-- form để sửa đổi phần giới thiệu liên hện -->
    <div class="bg-light  border rounded-3 p-1 p-sm-3 m-2 m-sm-4">
        <form action="index.php?act=modifyfooter" method="post">
            <label class="form-label">Giới thiệu: </label> <br>
            <textarea name="gioithieu" class="form-control" id="input" ><?php echo $kq[0]['gioithieu']; ?></textarea> <br>
            <label class="form-label">Liên hệ: </label> <br>
            <textarea name="lienhe" class="form-control" id="input" ><?php echo $kq[0]['lienhe']; ?></textarea> <br>
            <label class="form-label">Tin tức: </label> <br>
            <textarea name="tintuc" class="form-control" id="input" ><?php echo $kq[0]['tintuc']; ?></textarea> <br>
            <input type="submit" name="modify" value="Cập nhật" class="btn btn-info">
        </form>
    </div>