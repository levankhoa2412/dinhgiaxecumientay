<?php require('car/main/include/head.php'); ?>
<?php require('car/main/include/menu.php'); ?>
<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="text-center">
                        <div class="section-title">
                            <h2>Định giá xe <small><b>Hình ảnh xe</b></small><small>Bạn vui lòng gửi kèm các hình ảnh
                                    bên trái, phải, trước, sau và bên trong xe.</small></h2>
                        </div>
                        <div class="file-loading">
                            <input id="input-21" type="file" accept="image/*" multiple>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="text-center">
                        <input type="text" class="form-control" id="idguiban" hidden
                               value="<?php echo $_GET["idguiban"]; ?>">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="text-center">
                        <input type="button" class="section-btn btn btn-primary" id="hoantat"
                               value="Hoàn tất thông tin và nhờ tư vấn">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php require('car/main/include/featured.php'); ?>
    <?php require('car/main/include/blog.php'); ?>
    <?php require('car/main/include/testimonial.php'); ?>
</main>
<?php require('car/main/include/contact.php'); ?>
<?php require('car/main/include/footer.php'); ?>

<script>
    $(document).ready(function () {

        $("#input-21").fileinput({
            theme: 'fas',
            showRemove: false,
            showZoom: true,
            showDrag: false,
            showCaption: false,
            dropZoneEnabled: true,
            browseOnZoneClick: true,
            overwriteInitial: true,
            initialPreviewAsData: true,
            uploadUrl: "car.php?controller=dinhgia&action=hinhanhxeC&idguiban=" + $("#idguiban").val(),
            deleteUrl: "car.php?controller=dinhgia&action=xoahinhanhxeC&idguiban=" + $("#idguiban").val(),
            initialPreview: [<?php if (isset($preview)) echo $preview; else null;?>],
            initialPreviewConfig:<?php if (isset($previewconfig)) echo $previewconfig; else echo '[]';?>
        }).on('filebatchuploadcomplete', function () {
            location.href = "car.php?controller=dinhgia&action=reloadhinhanhxeC&idguiban=" + $("#idguiban").val();
        });
        //     .on('fileremoved', function (event, previewId, fileId) {
        //     location.href = "car.php?controller=dinhgia&action=xoagiaydangkiemC&idguiban=" + $("#idguiban").val() + "&fileId=" + fileId;
        // }).on('filedeleted', function (event, id, index) {
        //     jAlert(3);
        // }).on('filecleared', function (event, previewId, fileId) {
        //     location.href = "car.php?controller=dinhgia&action=xoagiaydangkiemC&idguiban=" + $("#idguiban").val() + "&fileId=" + fileId;
        // });

        $('#hoantat').click(function (e) {
            $.ajax({
                url: "car.php?controller=dinhgia&action=hoantathosoC",
                type: "POST",
                data: {
                    idguiban: $("#idguiban").val()
                },
                success: function (response) {
                    if (response > 0) {
                        jAlert("Gửi thông tin thành công", "Thông báo", function (e) {
                            location.href = "car.php?controller=dinhgia&action=hosoguibanxeC&idguiban=" + $("#idguiban").val();
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="car/themes/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<link href="car/themes/fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
<script src="car/themes/js/bootstrap.min.js"></script>
<script src="car/themes/fileinput/js/plugins/piexif.js" type="text/javascript"></script>
<script src="car/themes/fileinput/js/plugins/sortable.js" type="text/javascript"></script>
<script src="car/themes/fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="car/themes/fileinput/js/locales/fr.js" type="text/javascript"></script>
<script src="car/themes/fileinput/js/locales/es.js" type="text/javascript"></script>
<script src="car/themes/fileinput/themes/fas/theme.js" type="text/javascript"></script>
<script src="car/themes/fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>
</body>
</html>
