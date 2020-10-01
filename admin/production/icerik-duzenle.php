<?php include 'header.php'; 
include '../connect/config.php';

$iceriksor = $conn->prepare("SELECT * FROM icerik WHERE icerik_id=:icerik_id");
$iceriksor->execute(array(
'icerik_id' => $_GET['icerik_id']
));
$icerikduzenle=$iceriksor->fetch(PDO::FETCH_ASSOC);


?>

<head>
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

</head>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Icerik islemleri</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>icerik Duzenle <small>
                      <?php

                      if (@$_GET['durum']=='ok') { ?>
                          <b style="color: green;">Güncelleme basarili</b>
                       
                       <?php } elseif (@$_GET['durum']=='no') { ?>
                        
                        <b style="color: red;">Güncelleme yapilamadi</b>

                       <?php } ?> 
                       
                      </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form action="../connect/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="icerik_id" value="<?php echo $icerikduzenle['icerik_id']; ?>">
                      <input type="hidden" name="icerik_resimyol" value="<?php echo $icerikduzenle['icerik_resimyol']; ?>">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img width="200" height="100" src="../../<?php echo $icerikduzenle['icerik_resimyol']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Sec <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" name="slider_resimyol" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">icerik tarih <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="col-md-4">
                            <input type="date" id="first-name" required="required" value="<?php echo date('Y-m-d'); ?>" name="icerik_tarih" class="form-control col-md-7 col-xs-12">
                          </div>
                          <div class="col-md-4">
                            <input type="time" id="first-name" required="required" value="<?php echo date('H:i:s'); ?>" name="icerik_saat" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">icerik Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="icerik_ad" value="<?php echo $icerikduzenle['icerik_ad']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">icerik detay <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="icerik_detay" value="<?php echo $icerikduzenle['icerik_detay']; ?>" class="form-control col-md-7 col-xs-12">
                          <textarea class="ckeditor" id="editor1" name="icerik_detay"><?php echo $icerikduzenle['icerik_detay']; ?></textarea>
                        </div>
                      </div>

                      <script type="text/javascript">
                        CKEDITOR.replace('editor1',{
                          filebrowserBrowseUrl = '/ckfinder/ckfinder.html'.
                          filebrowserImageBrowseUrl = '/ckfinder/ckfinder.html?type=Images',
                          filebrowserFlashBrowseUrl = '/ckfinder/ckfinder.html?type=Flash',
                          filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                          filebrowserImageUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                          filebrowserFlashUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                          forcePasteAsPlainText: true
                        
                        });

                      </script>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">icerik Kaynak <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="icerik_kaynak" value="<?php echo $icerikduzenle['icerik_kaynak']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">icerik Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="icerik_durum" id="heard" required>
                            
                          <?php if ($_GET['icerik_durum'] == 1) { ?>
                            
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                          <?php } else { ?>

                            <option value="0">Pasif</option>
                            <option value="1">Aktif</option>

                            <?php } ?>
                            
                            
                            


                          </select>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="icerikduzenle" class="btn btn-success">Save</button>
                        </div>
                      </div>
                      

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include 'footer.php'; ?>
