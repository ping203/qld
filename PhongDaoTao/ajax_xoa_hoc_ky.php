<?php require_once "check_login.php"; ?>
<?php
$kq = array(
    'trangthai' => 0
);
$conn = $ketnoi->ketnoi();
$id = $_POST['id'];
$sql = "DELETE FROM HOCKY WHERE IDHK = :id";
$p_sql = oci_parse($conn, $sql);
oci_bind_by_name($p_sql, ":id",$id);
oci_execute($p_sql);
$r_sql = oci_num_rows($p_sql);
oci_free_statement($p_sql);
oci_close($conn);
if ($r_sql > 0){
    $kq['trangthai'] = 1;
}
echo json_encode($kq);
exit();
?>