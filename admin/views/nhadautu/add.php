<?php require('admin/views/shared/header.php'); ?>
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading bg-primary text-center"><b>THÊM NHÀ ĐẦU TƯ</b></div>
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <form id="user-form" class="form-horizontal" method="post"
                      action="admin.php?controller=nhadautu&action=add" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                        <label for="Name" class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-8">
                            <input name="tennhadautu" type="text" class="form-control" id="tennhadautu"
                                   placeholder="Tên nhà đầu tư"
                                   required=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sodienthoai" class="col-sm-3 control-label">Số điện thoại</label>
                        <div class="col-sm-8">
                            <input name="sodienthoai" type="text" class="form-control" id="sodienthoai"
                                   placeholder="Số điện thoại"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="diachi" class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-8">
                            <input name="diachi" type="text" class="form-control" id="diachi"
                                   placeholder="Địa chỉ"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image1" class="col-sm-3 control-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            <a class="btn btn-warning" href="admin.php?controller=nhadautu&action=list">Trở về</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php require('admin/views/shared/footer.php'); ?>