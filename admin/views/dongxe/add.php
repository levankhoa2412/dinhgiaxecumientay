<?php require('admin/views/shared/header.php'); ?>
<!-- Navigation -->
<div id="page-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <b><?php echo $title ?></b>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="panel-body">
                    <form id="category-form" class="form-horizontal" method="post" enctype="multipart/form-data"
                          role="form" action="admin.php?controller=dongxe&action=add">
                        <input name="id" type="hidden"/>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Hãng xe</label>
                            <div class="col-sm-9">
                                <select name="hangxe" class="form-control" id="hangxe" required>
                                    <option value="0" selected>Chọn hãng xe</option>
                                    <?php foreach ($groups as $group) {
                                        $selected = '';
                                        echo '<option value="' . $group['Id'] . '" ' . $selected . '>' . $group['Name'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Tên dòng xe</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Tên hãng xe"
                                       required=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                                <a class="btn btn-warning" href="admin.php?controller=group">Trở về</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
</div>
<!-- /#wrapper -->
<?php require('admin/views/shared/footer.php'); ?>
