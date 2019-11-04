<?php require('admin/views/shared/header.php'); ?>
    <div id="page-wrapper">
        <ul class="nav nav-tabs small bg-info">
            <li class="active"><a data-toggle="tab" href="#home">Khách hàng</a></li>
            <li><a data-toggle="tab" href="#typecustomer">Loại khách hàng</a></li>
            <li><a data-toggle="tab" href="#groupcustomer">Nhóm khách hàng</a></li>
            <!--            <li><a data-toggle="tab" href="#" >Nhóm khách hàng</a></li>-->
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <button class="btn btn-toolbar pull-right" style="margin: 3px" type="button"
                                id="btnResetPassEmployee"><i
                                    class="glyphicon glyphicon-repeat"></i> Reset password
                        </button>
                        <button class="btn btn-danger pull-right" style="margin: 3px" type="button"
                                id="btnDeleteEmployee"><i
                                    class="glyphicon glyphicon-minus"></i> Xóa
                        </button>
                        <button class="btn btn-warning pull-right" style="margin: 3px" type="reset"
                                id="btnResetEmployee"><i
                                    class="glyphicon glyphicon-trash"></i> Reset
                        </button>
                        <button class="btn btn-primary pull-right" style="margin: 3px" type="button"
                                id="btnUpdateEmployee"><i
                                    class="glyphicon glyphicon-plus"></i> Cập nhật
                        </button>
                        <div class="panel-heading">
                            <b class="small">Danh mục nhân viên</b>
                        </div>
                        <div class="panel-body small">
                            <div>
                                <input name="id" type="hidden" class="form-control" id="id"/>
                                <input name="userid" type="hidden" class="form-control" id="userid"/>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Tài khoản</label>
                                <div class="col-sm-4">
                                    <input name="username" type="text" class="form-control input-sm" id="username"
                                           placeholder="Tài khoản"
                                           required=""/>
                                </div>
                                <label for="name" class="col-sm-2 control-label">Tên</label>
                                <div class="col-sm-4">
                                    <input name="name" type="text" class="form-control input-sm" id="name"
                                           placeholder="Họ tên"
                                           required=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="identity" class="col-sm-2 control-label">Chứng minh</label>
                                <div class="col-sm-4">
                                    <input name="identity" type="text" class="form-control input-sm" id="identity"
                                           placeholder="Chứng minh nhân dân" required=""/>
                                </div>
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-4">
                                    <input name="email" type="email" class="form-control input-sm" id="email"
                                           placeholder="Email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="province" class="col-sm-2 control-label">Thành phố/Tỉnh</label>
                                <div class="col-sm-4">
                                    <select name="province" class="form-control input-sm" id="province" required=""
                                            onChange="getListDistrict(this.value);"
                                            data-show-subtext="true" data-live-search="true">
                                        <option value="-1" selected>Chọn Thành phố/Tỉnh</option>
                                        <?php foreach ($province as $provinces) {
                                            echo '<option value="' . $provinces['id'] . '">' . $provinces['name'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <label for="address" class="col-sm-2 control-label">Quận/Huyện</label>
                                <div class="col-sm-4">
                                    <select name="district" class="form-control input-sm" id="district" required=""
                                            onChange="getListVillage(this.value);">
                                        <option value="-1" selected>Chọn Quận/Huyện</option>
                                        <!--                                        --><?php //foreach ($unit as $units) {
                                        //                                            echo '<option value="' . $units['district'] . '">' . $units['districtname'] . '</option>';
                                        //                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="village" class="col-sm-2 control-label">Phường/Xã</label>
                                <div class="col-sm-4">
                                    <select name="village" class="form-control input-sm" id="village" required="">
                                        <option value="-1" selected>Chọn Phường/Xã</option>
                                        <!--                                        --><?php //foreach ($unit as $units) {
                                        //                                            echo '<option value="' . $units['village'] . '">' . $units['villagename'] . '</option>';
                                        //                                        } ?>
                                    </select>
                                </div>
                                <label for="identity" class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-4">
                                    <input name="address" type="text" class="form-control input-sm" id="address"
                                           placeholder="Địa chỉ"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sex" class="col-sm-2 control-label">Giới tính</label>
                                <div class="col-sm-4">
                                    <select name="sex" class="form-control input-sm" id="sex" required=""
                                            data-show-subtext="true" data-live-search="true">
                                        <option value="-1" selected disabled>Chọn giới tính</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                                <label for="birthday" class="col-sm-2 control-label">Ngày sinh</label>
                                <div class="col-sm-4">
                                    <input name="birthday" type="date" class="form-control input-sm" id="birthday"
                                           placeholder="Ngày sinh"
                                           required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="position" class="col-sm-2 control-label">Chức vụ</label>
                                <div class="col-sm-4">
                                    <select name="position" class="form-control input-sm" id="position" required=""
                                            data-show-subtext="true" data-live-search="true">
                                        <option value="-1" selected>Chọn chức vụ</option>
                                        <?php foreach ($listposition as $listpositions) {
                                            echo '<option value="' . $listpositions['id'] . '">' . $listpositions['name'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <label for="phone" class="col-sm-2 control-label">Điện thoại</label>
                                <div class="col-sm-4">
                                    <input name="phone" type="text" class="form-control input-sm" id="phone"
                                           placeholder="Số điện thoại"
                                           required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="zalo" class="col-sm-2 control-label">Zalo</label>
                                <div class="col-sm-4">
                                    <input name="zalo" type="text" class="form-control input-sm" id="zalo"
                                           placeholder="Zalo"/>
                                </div>
                                <label for="facebook" class="col-sm-2 control-label">
                                    <a id="linkfacebook" target="_blank">Facebook</a></label>
                                <div class="col-sm-4">
                                    <input name="facebook" type="text" class="form-control input-sm" id="facebook"
                                           placeholder="Facebook"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--                                <label for="createtime" class="col-sm-2 control-label">Ngày tạo</label>-->
                                <!--                                <div class="col-sm-4">-->
                                <!--                                    <input name="createtime" type="datetime-local" class="form-control input-sm" id="createtime"-->
                                <!--                                           placeholder="Ngày tạo" value="--><?php
                                //                                    echo date('Y-m-d\Th:i:s') ?><!--"-->
                                <!--                                           required=""/>-->
                                <!--                                </div>-->
                                <label for="datejoined" class="col-sm-2 control-label">Ngày vào</label>
                                <div class="col-sm-4">
                                    <input name="datejoined" type="date" class="form-control input-sm" id="datejoined"
                                           placeholder="Ngày vào" value="<?php echo date('Y-m-d') ?>"
                                           required=""/>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <table class="table table-striped table-bordered table-hover small" id="tableEmployees" style="width:100%">
                <thead class="bg-primary">
                <tr>
                    <th class="text-center" width="7%">Id</th>
                    <th class="text-left">Tài khoản</th>
                    <th class="text-left">Tên</th>
                    <th class="text-left">Ngày sinh</th>
                    <th class="text-left">Chứng minh</th>
                    <th class="text-left">Điện thoại</th>
                    <th class="text-left">Email</th>
                    <th class="text-left">Địa chỉ</th>
                    <th class="text-left">Giới tính</th>
                    <th class="text-left">Facebook</th>
                    <th class="text-left">Zalo</th>
                    <th class="text-left">Mật khẩu</th>
                    <th class="text-left">Ngày tạo</th>
                    <th class="text-left">Chức vụ id</th>
                    <th class="text-left">Chức vụ</th>
                    <th class="text-left">Ngày vào</th>
                    <th class="text-center" width="7%">User id</th>
                </tr>
                </thead>
            </table>
        </div>
        <div id="typecustomer" class="tab-pane fade">
            <form class="form-horizontal">
                <div class="panel panel-default">
                    <button class="btn btn-danger pull-right" style="margin: 3px" type="button" id="btnTypecustomerDelete">
                        <i class="glyphicon glyphicon-minus"></i> Xóa
                    </button>
                    <button class="btn btn-warning pull-right" style="margin: 3px" type="reset" id="btnTypecustomerReset">
                        <i class="glyphicon glyphicon-trash"></i> Reset
                    </button>
                    <button class="btn btn-primary pull-right" style="margin: 3px" type="button" id="btnTypecustomerUpdate">
                        <i class="glyphicon glyphicon-plus"></i> Cập nhật
                    </button>
                    <div class="panel-heading">
                        <b class="small">Danh mục loại khách hàng</b>
                    </div>
                    <div class="panel-body small">
                        <div>
                            <input name="typecustomerid" type="hidden" class="form-control" id="typecustomerid"/>
                        </div>
                        <div class="form-group">
                            <label for="typecustomername" class="col-sm-2 control-label">Tên loại khách hàng</label>
                            <div class="col-sm-10">
                                <input name="typecustomername" type="text" class="form-control input-sm"
                                       id="typecustomername" placeholder="Tên loại khách hàng" required=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-bordered table-hover small" id="tblTypecustomer" style="width:100%">
                <thead class="bg-primary">
                <tr>
                    <th class="text-center" width="30%">Id</th>
                    <th class="text-left">Tên loại khách hàng</th>
                </tr>
                </thead>
            </table>
        </div>
        <div id="groupcustomer" class="tab-pane fade">
            <form class="form-horizontal">
                <div class="panel panel-default">
                    <button class="btn btn-danger pull-right" style="margin: 3px" type="button" id="btnGroupcustomerDelete">
                        <i class="glyphicon glyphicon-minus"></i> Xóa
                    </button>
                    <button class="btn btn-warning pull-right" style="margin: 3px" type="reset" id="btnGroupcustomerReset">
                        <i class="glyphicon glyphicon-trash"></i> Reset
                    </button>
                    <button class="btn btn-primary pull-right" style="margin: 3px" type="button" id="btnGroupcustomerUpdate">
                        <i class="glyphicon glyphicon-plus"></i> Cập nhật
                    </button>
                    <div class="panel-heading">
                        <b class="small">Danh mục nhóm khách hàng</b>
                    </div>
                    <div class="panel-body small">
                        <div>
                            <input name="groupcustomerid" type="hidden" class="form-control" id="groupcustomerid"/>
                        </div>
                        <div class="form-group">
                            <label for="groupcustomername" class="col-sm-2 control-label">Tên nhóm khách hàng</label>
                            <div class="col-sm-10">
                                <input name="groupcustomername" type="text" class="form-control input-sm"
                                       id="groupcustomername" placeholder="Tên nhóm khách hàng" required=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-bordered table-hover small" id="tblGroupcustomer" style="width:100%">
                <thead class="bg-primary">
                <tr>
                    <th class="text-center" width="30%">Id</th>
                    <th class="text-left">Tên nhóm khách hàng</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    </div>
    <script>

        //Nhân viên
        $(document).ready(function () {
            $('#btnResetPassEmployee').click(function (e) {
                var id = $('#id').val();
                if (id) {
                    jConfirm('Bạn chắc chắn muốn reset password tài khoản này?', 'Thông báo', function (e) {
                        if (e == true) {
                            $.ajax({
                                type: "POST",
                                url: "admin/controllers/employees/resetEmployees.php",
                                data: {
                                    'id': id
                                },
                                success: function (data) {
                                    if (data == '0') {
                                        jAlert('Thực hiện không thành công', 'Thông báo');
                                    } else {
                                        jAlert('Thực hiện thành công', 'Thông báo');
                                        $('#btnResetEmployee').click();
                                        loadTableEmployees();
                                    }
                                }
                            });
                        }
                    });
                } else {
                    jAlert('Chưa chọn tài khoản', 'Thông báo');
                }

            });

            $('#btnDeleteEmployee').click(function (e) {
                var id = $('#id').val();
                if (id) {
                    jConfirm('Bạn chắc chắn xóa tài khoản này?', 'Thông báo', function (e) {
                        if (e == true) {
                            $.ajax({
                                type: "POST",
                                url: "admin/controllers/employees/deleteEmployees.php",
                                data: {
                                    'id': id
                                },
                                success: function (data) {
                                    if (data == '0') {
                                        jAlert('Thực hiện không thành công', 'Thông báo');
                                    } else {
                                        jAlert('Thực hiện thành công', 'Thông báo');
                                        $('#btnResetEmployee').click();
                                        loadTableEmployees();
                                    }
                                }
                            });
                        }
                    });
                } else {
                    jAlert('Chưa chọn tài khoản', 'Thông báo');
                }

            });

            $('#btnResetEmployee').click(function (e) {
                $('#id').val('');
                $('#userid').val('');
                $('#province').val('-1');
                $('#district').val(-1);
                $('#village').val(-1);
            });

            $('#btnUpdateEmployee').click(function (e) {
                var id = $('#id').val();
                var userid = $('#userid').val();
                var username = $('#username').val();
                var name = $('#name').val();
                var identity = $('#identity').val();
                var email = $('#email').val();
                var province = $('#province').val();
                if (checkIf(province)) {
                    return jAlert('Chưa chọn Thành phố/Tỉnh', 'Thông báo');
                }
                var district = $('#district').val();
                if (checkIf(district)) {
                    return jAlert('Chưa chọn Quận/Huyện', 'Thông báo');
                }
                var village = $('#village').val();
                if (checkIf(village)) {
                    return jAlert('Chưa chọn Phường/Xã', 'Thông báo');
                }
                var address = $('#address').val();
                var sex = $('#sex').val();
                if (checkIf(sex)) {
                    return jAlert('Chưa chọn giới tính', 'Thông báo');
                }
                var birthday = $('#birthday').val();
                var position = $('#position').val();
                var phone = $('#phone').val();
                var zalo = $('#zalo').val();
                var facebook = $('#facebook').val();
                var createtime = $('#createtime').val();
                var datejoined = $('#datejoined').val();
                if (username) {
                    $.ajax({
                        type: "POST",
                        url: "admin/controllers/employees/updateEmployees.php",
                        data: {
                            'id': id,
                            'userid': userid,
                            'username': username,
                            'name': name,
                            'identity': identity,
                            'email': email,
                            'province': province,
                            'district': district,
                            'village': village,
                            'address': address,
                            'sex': sex,
                            'birthday': birthday,
                            'position': position,
                            'phone': phone,
                            'zalo': zalo,
                            'facebook': facebook,
                            'createtime': createtime,
                            'datejoined': datejoined
                        },
                        success: function (data) {
                            if (data == '0') {
                                jAlert('Thực hiện không thành công', 'Thông báo');
                            } else {
                                jAlert('Thực hiện thành công', 'Thông báo');
                                loadTableEmployees();
                            }
                        }
                    });
                } else {
                    jAlert('Chưa nhập tên chức vụ', 'Thông báo');
                }
            });

            loadTableEmployees();

            function loadTableEmployees() {
                $('#tableEmployees').DataTable().destroy();
                $('#tableEmployees').DataTable({
                    width: '100%',
                    responsive: true,
                    order: [[0, 'desc']],
                    ajax: {
                        url: "admin/controllers/employees/listEmployees.php",
                        dataSrc: ''
                    },
                    columns: [
                        {data: "id"},
                        {data: "username"},
                        {data: "name"},
                        {data: "birthday"},
                        {data: "identity"},
                        {data: "phone"},
                        {data: "email"},
                        {data: "address"},
                        {data: "sex"},
                        {data: "facebook"},
                        {data: "zalo"},
                        {data: "password"},
                        {data: "createtime"},
                        {data: "position"},
                        {data: "positionname"},
                        {data: "datejoined"},
                        {data: "userid"}
                    ],
                    columnDefs: [
                        {
                            targets: 0, // your case first column
                            className: "text-center",
                            width: "7%"
                        }, {
                            targets: 1,
                            width: "20%"
                        }, {
                            targets: 2,
                            width: "25%"
                        }, {
                            targets: 3,
                            visible: false
                        }, {
                            targets: 4,
                            visible: false
                        }, {
                            targets: 6,
                            visible: false
                        }, {
                            targets: 7,
                            visible: false
                        }, {
                            targets: 8,
                            class: "text-center",
                            visible: false
                        }, {
                            targets: 9,
                            visible: false
                        }, {
                            targets: 10,
                            visible: false
                        }, {
                            targets: 11,
                            visible: false
                        }, {
                            targets: 12,
                            visible: false
                        }, {
                            targets: 13,
                            class: "text-right",
                            visible: false
                        }, {
                            targets: 14
                        }, {
                            targets: 15,
                            class: "text-right"
                        }, {
                            targets: 16,
                            class: "text-right",
                            visible: false
                        }
                    ]
                });
            }

            $('#tableEmployees tbody').on('click', 'tr', function (id) {
                var data = $('#tableEmployees').DataTable().row(this).data();
                if (data["id"] !== undefined && data["id"] !== null) {
                    $("#id").val(data["id"]);
                    $("#username").val(data["username"]);
                    $("#name").val(data["name"]);
                    $("#birthday").val(data["birthday"]);
                    $("#identity").val(data["identity"]);
                    $("#phone").val(data["phone"]);
                    $("#email").val(data["email"]);
                    $("#address").val(data["address"]);
                    $("#sex").val(data["sex"]);
                    $("#facebook").val(data["facebook"]);
                    // $("#linkfacebook").val(data["facebook"]);
                    $("#linkfacebook").attr("href", data['facebook']);
                    $("#zalo").val(data["zalo"]);
                    // $("#password").val(data["password"]);
                    // $("#createtime").val(data["createtime"]);
                    $("#position").val(data["position"]);
                    $("#datejoined").val(data["datejoined"]);
                    $("#userid").val(data["userid"]);
                    var provinceid = data["province"];
                    var districtid = data["district"];
                    var villageid = data["village"];
                    $("#province").val(provinceid);
                    setDistrict(provinceid, districtid);
                    setVillage(districtid, villageid);
                }
            });

            function setDistrict(provinceid, districtid) {
                $.ajax({
                    type: "POST",
                    url: "admin/controllers/units/setDistrict.php",
                    data: {
                        'provinceid': provinceid,
                        'districtid': districtid
                    },
                    success: function (data) {
                        $("#district").html(data);
                    }
                });
                return true;
            }

            function setVillage(districtid, villageid) {
                $.ajax({
                    type: "POST",
                    url: "admin/controllers/units/setVillage.php",
                    data: {
                        'districtid': districtid,
                        'villageid': villageid
                    },
                    success: function (data) {
                        $("#village").html(data);
                    }
                });
                return true;
            }
        });

        //Nhóm khách hàng
        $(document).ready(function () {
            loadGroupcustomer();

            function loadGroupcustomer() {
                $('#groupcustomerid').val('');
                $('#tblGroupcustomer').DataTable().destroy();
                $('#tblGroupcustomer').DataTable({
                    width: '100%',
                    responsive: true,
                    order: [[0, 'desc']],
                    ajax: {
                        url: "admin/controllers/customer/listGroupcustomer.php",
                        dataSrc: ''
                    },
                    columns: [
                        {data: "id"},
                        {data: "name"}
                    ],
                    columnDefs: [
                        {
                            targets: 0, // your case first column
                            className: "text-center",
                            width: "20%"
                        }, {
                            targets: 1, // your case first column
                            className: "text-center",
                            width: "80%"
                        }
                    ]
                });
            }

            $('#tblGroupcustomer tbody').on('click', 'tr', function (id) {
                var data = $('#tblGroupcustomer').DataTable().row(this).data();
                if (data["id"] !== undefined && data["id"] !== null) {
                    $("#groupcustomerid").val(data["id"]);
                    $("#groupcustomername").val(data["name"]);
                }
            });

            $('#btnGroupcustomerUpdate').click(function (e) {
                var id = $('#groupcustomerid').val();
                var name = $('#groupcustomername').val();
                if (name) {
                    $.ajax({
                        type: "POST",
                        url: "admin/controllers/customer/updateGroupcustomer.php",
                        data: {
                            'id': id,
                            'name': name
                        },
                        success: function (data) {
                            if (data == '0') {
                                jAlert('Thực hiện không thành công', 'Thông báo');
                            } else {
                                jAlert('Thực hiện thành công', 'Thông báo');
                                $('#btnGroupcustomerReset').click();
                                loadGroupcustomer();
                            }
                        }
                    });
                } else {
                    jAlert('Chưa nhập tên loại khách hàng', 'Thông báo');
                }
            });

            $('#btnGroupcustomerDelete').click(function (e) {
                var id = $('#groupcustomerid').val();
                if (id) {
                    $.ajax({
                        type: "POST",
                        url: "admin/controllers/customer/deleteGroupcustomer.php",
                        data: {
                            'id': id
                        },
                        success: function (data) {
                            if (data == '0') {
                                jAlert('Thực hiện không thành công', 'Thông báo');
                            } else {
                                jAlert('Thực hiện thành công', 'Thông báo');
                                $('#btnGroupcustomerReset').click();
                                loadGroupcustomer();
                            }
                        }
                    });
                } else {
                    jAlert('Chưa chọn nhóm khách hàng', 'Thông báo');
                }
            });
        });

        // Loại khách hàng
        $(document).ready(function () {
            loadTypecustomer();

            function loadTypecustomer() {
                $('#typecustomerid').val('');
                $('#tblTypecustomer').DataTable().destroy();
                $('#tblTypecustomer').DataTable({
                    width: '100%',
                    responsive: true,
                    order: [[0, 'desc']],
                    ajax: {
                        url: "admin/controllers/customer/listTypecustomer.php",
                        dataSrc: ''
                    },
                    columns: [
                        {data: "id"},
                        {data: "name"}
                    ],
                    columnDefs: [
                        {
                            targets: 0, // your case first column
                            className: "text-center",
                            width: "20%"
                        }, {
                            targets: 1, // your case first column
                            className: "text-center",
                            width: "80%"
                        }
                    ]
                });
            }

            $('#tblTypecustomer tbody').on('click', 'tr', function (id) {
                var data = $('#tblTypecustomer').DataTable().row(this).data();
                if (data["id"] !== undefined && data["id"] !== null) {
                    $("#typecustomerid").val(data["id"]);
                    $("#typecustomername").val(data["name"]);
                }
            });

            $('#btnTypecustomerUpdate').click(function (e) {
                var id = $('#typecustomerid').val();
                var name = $('#typecustomername').val();
                if (name) {
                    $.ajax({
                        type: "POST",
                        url: "admin/controllers/customer/updateTypecustomer.php",
                        data: {
                            'id': id,
                            'name': name
                        },
                        success: function (data) {
                            if (data == '0') {
                                jAlert('Thực hiện không thành công', 'Thông báo');
                            } else {
                                jAlert('Thực hiện thành công', 'Thông báo');
                                $('#btnTypecustomerReset').click();
                                loadTypecustomer();
                            }
                        }
                    });
                } else {
                    jAlert('Chưa nhập tên loại khách hàng', 'Thông báo');
                }
            });

            $('#btnTypecustomerDelete').click(function (e) {
                var id = $('#typecustomerid').val();
                if (id) {
                    $.ajax({
                        type: "POST",
                        url: "admin/controllers/customer/deleteTypecustomer.php",
                        data: {
                            'id': id
                        },
                        success: function (data) {
                            if (data == '0') {
                                jAlert('Thực hiện không thành công', 'Thông báo');
                            } else {
                                jAlert('Thực hiện thành công', 'Thông báo');
                                $('#btnTypecustomerReset').click();
                                loadTypecustomer();
                            }
                        }
                    });
                } else {
                    jAlert('Chưa chọn loại khách hàng', 'Thông báo');
                }
            });
        });

    </script>
    </div>
<?php require('admin/views/shared/footer.php'); ?>