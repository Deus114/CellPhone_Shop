    <h2>Quản lí thông tin hiển thị ở footer</h2>
    <!-- form để sửa đổi phần giới thiệu liên hện -->
    <form action="index.php?act=modifyfooter" method="post">
        <label class="form-label">Giới thiệu: </label> <br>
        <textarea name="gioithieu" class="form-control" id="input" ><?php echo $kq[0]['gioithieu']; ?></textarea> <br>
        <label class="form-label">Liên hệ: </label> <br>
        <textarea name="lienhe" class="form-control" id="input" ><?php echo $kq[0]['lienhe']; ?></textarea> <br>
        <label class="form-label">Tin tức: </label> <br>
        <textarea name="tintuc" class="form-control" id="input" ><?php echo $kq[0]['tintuc']; ?></textarea> <br>
        <input type="submit" name="modify" value="Cập nhật">
    </form>