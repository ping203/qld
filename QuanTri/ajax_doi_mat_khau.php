<?php require_once "check_login.php"; ?>
<?php
$kq = array(
    'trangthai' => 0
);
	$conn = $ketnoi->ketnoi();
	$mk = $_POST['mk'];
	$id = $_POST['id'];
    if (empty($mk)) {
        echo json_encode($kq);
        exit();
    }
	$sql = "UPDATE NQT SET MATKHAU=:mk WHERE IDNQT = :id";
	$p_sql = oci_parse($conn, $sql);
    $mk = md5($mk);
	oci_bind_by_name($p_sql, ":mk", $mk);
    oci_bind_by_name($p_sql, ":id",$id);
    oci_execute($p_sql);
    $r_sql = oci_num_rows($p_sql);
    if ($r_sql > 0){
        $kq['trangthai'] = 1;
    }
    echo json_encode($kq);
    exit();
 ?>