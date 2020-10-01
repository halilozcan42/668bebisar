<?php
include 'header.php'; 
include '../connect/config.php';  

if (isset($_POST['arama'])) {
  
  $aranan = $_POST['aranan'];

    $iceriksor = $conn->prepare("SELECT * FROM icerik WHERE icerik_ad LIKE '%$aranan%' ORDER BY icerik_id ASC LIMIT 25");
    $iceriksor->execute();
    $say =$iceriksor->rowCount();
}  else {

    $iceriksor = $conn->prepare("SELECT * FROM icerik ORDER BY icerik_id DESC LIMIT 25");
    $iceriksor->execute();
    $say = $iceriksor->rowCount();
}

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>icerik islemleri</h3>
              </div>

              <div class="title_right">
                <form action="" method="POST">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="aranan" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="arama" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </form>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title col-md-6">
                    <h2>Table design <small><?php

                    echo $say." Kayit bulundu";

                      if (@$_GET['durum']=='ok') { ?>
                          <b style="color: green;">Islem basarili</b>
                       
                       <?php } elseif (@$_GET['durum']=='no') { ?>
                        
                        <b style="color: red;">Islem yapilamadi</b>

                       <?php } ?> </small></h2></div>
                    <div align="right" class="col-md-6">
                      <a href="icerik-ekle.php"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Yeni ekle</button></a>
                    </div>
                    <div class="clearfix"></div>
                  

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Icerik tarih</th>
                            <th class="column-title">Ad</th>
                          
                            <th class="column-title">Durum</th>
                            <th width="80" class="column-title"></th>
                            <th width="80" class="column-title"></th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php
                          

                          while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>

                          <tr>
                            
                            <td class=" "><?php echo $icerikcek['icerik_zaman']; ?></td>
                            <td class=" "><?php echo $icerikcek['icerik_ad']; ?></td>
                            <td class=" "><?php 


                            if ($icerikcek['icerik_durum']== '1') {
                              echo "AKTIF";
                            } else {
                              echo "PASIF";
                            } ?></td>
                            

                            <td class=" "><a href="icerik-duzenle.php?icerik_id=<?php echo $icerikcek['icerik_id']; ?>"><button style="width: 80px;" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i>Düzenle</button></a></td>

                            <td class=" "><a href="../connect/islem.php?iceriksil=ok&icerik_id=<?php echo $icerikcek['icerik_id']; ?>"><button style="width: 80px;" class="btn btn-danger btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i>Sil</button></a></td>


                          </tr>
                          <?php } ?>
                          
                          
                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include 'footer.php'; ?>
