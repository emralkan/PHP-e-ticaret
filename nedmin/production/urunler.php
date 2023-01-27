<?php 

include 'header.php'; 


$urunsor=$db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Ayarları <small> İşlem Durumu:
              
            </small> </h2>
            <div align="right">
              <a href="urun-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Ürün Ad</th>
                  <th>Ürün İd</th>
                  <th>Ürün Fiyat</th>
                  <th>Ürün Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $uruncek['urun_ad'] ?></td>
                  <td><?php echo $uruncek['urun_id'] ?></td>
                  <td><?php echo $uruncek['urun_fiyat'] ?></td>
                  <td><?php 
                  if ($uruncek['urun_durum']==1) {?>
                    <button class="btn btn-success btn-xs">Aktif</button>
                  <?php } else { ?>
                    <button class="btn btn-danger btn-xs">Pasif</button>
                    <?php } ?>
                   </td>
                   <td><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></td>
                  <td><center><a class="btn btn-danger btn-xs" href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok">Sil</a></center></td>
                  </tr>



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
