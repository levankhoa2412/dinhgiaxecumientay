<?php require('admin/views/shared/header.php');
$nhanvien = select_1_record('SELECT * FROM user WHERE Id = ' . $_GET["id"]);
?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h3 class="panel-title">Sửa thông tin</h3>
        </div>
        <div class="panel-body form-horizontal">
            <form>
                <div class="form-group" hidden>
                    <label for="taikhoan" class="col-sm-3 control-label">Tài khoản</label>
                    <div class="col-sm-8">
                        <input name="id" type="text" class="form-control" id="id"
                               value="<?php echo $nhanvien ? $nhanvien['Id'] : ''; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="taikhoan" class="col-sm-3 control-label">Tài khoản</label>
                    <div class="col-sm-8">
                        <input name="taikhoan" type="text" class="form-control" id="taikhoan" disabled
                               required pattern="\S(.*\S)?" title="Tài khoản không được có khoản trắng"
                               placeholder="Tài khoản" value="<?php echo $nhanvien ? $nhanvien['Username'] : ''; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="matkhau" class="col-sm-3 control-label">Mật khẩu</label>
                    <div class="col-sm-8">
                        <input name="matkhau" type="password" class="form-control" id="matkhau"
                               placeholder="Mật khẩu" minlength="3" required
                               value="<?php echo $nhanvien ? $nhanvien['Password'] : ''; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nhaplaimatkhau" class="col-sm-3 control-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-8">
                        <input name="nhaplaimatkhau" type="password" class="form-control" id="nhaplaimatkhau"
                               placeholder="Nhập lại mật khẩu" minlength="3" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hoten" class="col-sm-3 control-label">Họ tên</label>
                    <div class="col-sm-8">
                        <input name="hoten" type="text" class="form-control" id="hoten"
                               required placeholder="Họ tên"
                               value="<?php echo $nhanvien ? $nhanvien['Name'] : ''; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sodienthoai" class="col-sm-3 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                        <input name="sodienthoai" type="text" class="form-control" id="sodienthoai"
                               required placeholder="Số điện thoại" pattern="0[0-9\s.-]{9,13}"
                               value="<?php echo $nhanvien ? $nhanvien['Phone'] : ''; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="diachi" class="col-sm-3 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                        <input name="diachi" type="text" class="form-control" id="diachi"
                               placeholder="Địa chỉ" value="<?php echo $nhanvien ? $nhanvien['Address'] : ''; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sodienthoai" class="col-sm-3 control-label"></label>
                    <div class="col-sm-8">
                        <button class="btn btn-primary" type="button" id="capnhat">Cập nhật</button>
                        <a class="btn btn-warning" href="admin.php?controller=user&action=list">Trở về</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#capnhat").click(function (e) {
            var id = $("#id").val();
            var taikhoan = $("#taikhoan").val();
            var matkhau = $("#matkhau").val();
            var nhaplai = $("#nhaplaimatkhau").val();
            if (matkhau != nhaplai) {
                return jAlert('Mật khẩu không khớp', 'Thông báo', function (e) {
                    $("#nhaplaimatkhau").focus();
                });
            }
            var hoten = $("#hoten").val();
            if (checkIf(hoten)) {
                return jAlert('Chưa nhập họ tên', 'Thông báo', function (e) {
                    $("#hoten").focus();
                });
            }
            var sodienthoai = $("#sodienthoai").val();
            var diachi = $("#diachi").val();
            $.ajax({
                url: "admin.php?controller=user&action=edit",
                type: "POST",
                data: {
                    id: id,
                    taikhoan: taikhoan,
                    matkhau: matkhau,
                    hoten: hoten,
                    sodienthoai: sodienthoai,
                    diachi: diachi
                },
                success: function (response) {
                    if (response == -1) {
                        jAlert("Tài khoản đã tồn tại", "Thông báo");
                    } else {
                        location.href = "admin.php?controller=user&action=list";
                    }
                }
            });
        });
    });
</script>
