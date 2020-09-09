<?php require('website/views/shared/header.php'); ?>
    <div class="container-top" style="margin-top: 50px">
        <div class="panel panel-default">
            <div class="block-title text-center"><h5 class="block-title-name">GỬI BÁN XE</h5>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    <div class="small form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Họ tên</label>
                            <div class="col-sm-9">
                                <input name="hoten" type="text" class="form-control text-capitalize" id="hoten" placeholder="Họ tên"
                                       required="" autofocus/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dienthoai" class="col-sm-3 control-label">Điện thoại</label>
                            <div class="col-sm-9">
                                <input name="dienthoai" type="text" class="form-control" id="dienthoai"
                                       placeholder="Điện thoại" required=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="diachi" class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input name="diachi" type="text" class="form-control" id="diachi" placeholder="Địa chỉ"
                                       required=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="thongtinxe" class="col-sm-3 control-label">Thông tin xe</label>
                            <div class="col-sm-9">
                                <input name="thongtinxe" type="text" class="form-control" id="thongtinxe"
                                       placeholder="Thông tin xe" required=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="giabanmongmuon" class="col-sm-3 control-label">Giá bán mong muốn</label>
                            <div class="col-sm-9">
                                <input name="giabanmongmuon" type="text" class="form-control" id="giabanmongmuon"
                                       placeholder="Giá bán mong muốn" required=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-primary" id="guithongtin"><i
                                            class="glyphicon glyphicon-send"></i> Gửi thông tin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#hoten').keypress(function (e) {
                if (e.keyCode == 13){
                    $('#dienthoai').focus();
                }
            });
            $('#dienthoai').keypress(function (e) {
                if (e.keyCode == 13){
                    $('#diachi').focus();
                }
            });
            $('#diachi').keypress(function (e) {
                if (e.keyCode == 13){
                    $('#thongtinxe').focus();
                }
            });
            $('#thongtinxe').keypress(function (e) {
                if (e.keyCode == 13){
                    $('#giabanmongmuon').focus();
                }
            });
            $('#giabanmongmuon').keypress(function (e) {
                if (e.keyCode == 13){
                    $('#guithongtin').focus();
                }
            });
            $('#guithongtin').click(function (e) {
                var hoten = $("#hoten").val();
                if (checkIf(hoten)) {
                    return jAlert("Chưa nhập họ tên", "Thông báo", function (e) {
                        $("#hoten").focus();
                    });
                }
                var dienthoai = $("#dienthoai").val();
                if (checkIf(dienthoai)) {
                    return jAlert("Chưa nhập số điện thoại", "Thông báo", function (e) {
                        $("#hoten").focus();
                    });
                }
                var diachi = $("#diachi").val();
                var thongtinxe = $("#thongtinxe").val();
                var giabanmongmuon = $("#giabanmongmuon").val();
                $.ajax({
                    url: "website.php?controller=guibanxe&action=guithongtin",
                    type: "POST",
                    data: {
                        hoten: hoten,
                        dienthoai: dienthoai,
                        diachi: diachi,
                        thongtinxe: thongtinxe,
                        giabanmongmuon: giabanmongmuon
                    },
                    success: function (response) {
                        if (response > 0) {
                            jAlert("Gửi thông tin thành công", "Thông báo", function (e) {
                                $("#hoten").prop("disabled", "disabled");
                                $("#dienthoai").prop("disabled", "disabled");
                                $("#diachi").prop("disabled", "disabled");
                                $("#thongtinxe").prop("disabled", "disabled");
                                $("#giabanmongmuon").prop("disabled", "disabled");
                                $("#guithongtin").hide();
                            });
                        } else {
                            jAlert("Gửi thông tin không thành công. Vui lòng liên hệ qua số điện thoại", "Thông báo", function (e) {
                            });
                        }
                    }
                });
            });
        });
    </script>
<?php require('website/views/shared/footer.php'); ?>