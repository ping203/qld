<?php sleep(2) ?>
<?php require_once "check_login.php"; ?>
<?php require_once "_l_function.php"; ?>
<?php if (!isset($_POST['id']) || empty($_POST['id']) || intval($_POST['id']) == 0) {
    echo "Không có dữ liệu";
}
$conn = $ketnoi->ketnoi();
$id = $_POST['id'];
$id = intval($id);
$sql = "SELECT l.MALOP, l.TENLOP, n.TENNDT, n.TRINHDODT, k.TENKHOA, gv.HOTENGV FROM LOP l, NGANHDT n, KHOACM k, GV gv, CTDAOTAO dt WHERE l.IDGV = gv.IDGV AND l.IDKHOA = k.IDKHOA AND l.IDCTDT = dt.IDCTDT AND dt.IDNDT = n.IDNDT AND l.IDLOP=:id AND ROWNUM = 1";
$p_sqlk = oci_parse($conn, $sql);
oci_bind_by_name($p_sqlk, ":id", $id);
oci_execute($p_sqlk);
$thongtin = oci_fetch_assoc($p_sqlk);
oci_free_statement($p_sqlk);

 ?>
<table class="table">
    <tr>
        <th>Tên lớp:</th>
        <td><?php echo $thongtin['TENLOP'] ?></td>
        <th>Mã lớp:</th>
        <td><?php echo $thongtin['MALOP'] ?></td>
    </tr>
    <tr>
        <th>Ngành đào tạo:</th>
        <td><?php echo $thongtin['TENNDT'] ?></td>
        <th>Trình độ:</th>
        <td><?php echo $thongtin['TRINHDODT'] ?></td>
    </tr>
    <tr>
        <th>Khoa phụ trách:</th>
        <td><?php echo $thongtin['TENKHOA'] ?></td>
        <th>Giáo viên cố vấn:</th>
        <td><?php echo $thongtin['HOTENGV'] ?></td>
    </tr>
</table>
<table id="banghocky" class="table table-bordered table-hover table-striped">
    <thead>
        <tr style="text-align: center;">
            <th>STT</th>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Email</th>
            <th>Quê quán</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php $sv = lay_chi_tiet_lop($id); $stt = 1;
        while ($row = oci_fetch_assoc($sv)){ ?>
            <tr style="text-align: center;">
                <th><?php echo $stt; ?></th>
                <td><?php echo $row['MASV'] ?></td>
                <td><?php echo $row['HOTENSV'] ?></td>
                <td><?php echo $row['NGAYSINHSV']; ?></td>
                <td><?php echo $row['GIOITINHSV']; ?></td>
                <td><?php echo $row['EMAILSV']; ?></td>
                <td><?php echo $row['QUEQUANSV']; ?></td>
                <td><button class="btn btn-primary btn-sm sua" lydata="<?php echo $row['IDSV'] ?>">Sửa</button>&ensp;<button class="btn btn-danger btn-sm xoa" lydata="<?php echo $row['IDSV'] ?>">Xóa</button></td>
            </tr>
        <?php $stt++; } ?>
    </tbody>
    </table>