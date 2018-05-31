<?php require_once "check_login.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once "head.php"; ?>
</head>
<body>
	<?php require_once "menu.php"; ?>
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-3" style="margin-bottom: 2rem;">
                <div class="card">
                    <div class="card-header">
                        <h5>Bảng điểm cá nhân</h5>
                    </div>
                    <div class="card-body">
                        <a href="xembangdiem.php">
                            <center>
                                <img src="../images/bangdiem.png" width="100%" alt="">
                            </center>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="margin-bottom: 2rem;">
                <div class="card">
                    <div class="card-header">
                        <h5>Thông tin cá nhân</h5>
                    </div>
                    <div class="card-body">
                        <a href="thongtintaikhoan.php">
                            <center>
                                <img src="../images/avatar3.png" width="100%" alt="">
                            </center>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#trangchu').addClass('active');
		});
	</script>
</body>
</html>

