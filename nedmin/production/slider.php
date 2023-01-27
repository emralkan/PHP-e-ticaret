<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();




?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Ayarları <small> İşlem Durumu:
              <?php 
              if (isset($_GET['sil'])&& $_GET['sil']=="ok") {?>

                <div class="alert alert-success" role="alert">
                  işlem Başarılı
                  </div>  
                
              <?php }elseif (isset($_GET['sil']) && $_GET['sil']=="no") {?>
                <div class="alert alert-success" role="alert">
                  İşlem Başarısız
                  </div>  
              <?php } ?>
            </small> </h2>
            <div align="right">
              <a href="slider-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Slider Ad</th>
                  <th>Slider Sıra</th>
                  <th>Slider Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $slidercek['slider_ad'] ?></td>
                  <td><?php echo $slidercek['slider_sira'] ?></td>
                  <td><?php 
                  if ($slidercek['slider_durum']==1) {?>
                    <button class="btn btn-success btn-xs">Aktif</button>
                  <?php } else { ?>
                    <button class="btn btn-danger btn-xs">Pasif</button>
                    <?php } ?>
                   </td>
                   <td><center><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?slider_id=<?php echo $slidercek['slider_id']; ?>&slidersil=ok&slider_resimyol=<?php echo $slidercek['slider_resimyol'] ?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>




                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
