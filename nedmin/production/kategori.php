<?php 

include 'header.php'; 

$kategorisor=$db->prepare("SELECT * FROM kategori");
$kategorisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Ayarları <small> İşlem Durumu:
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
              <a href="kategori-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Kategori Ad</th>
                  <th>Kategori Üst</th>
                  <th>Kategori SeoUrl</th>
                  <th>Kategori Sıra</th>
                  <th>Kategori Durum</th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $kategoricek['kategori_ad'] ?></td>
                  <td><?php echo $kategoricek['kategori_ust'] ?></td>
                  <td><?php echo $kategoricek['kategori_seourl'] ?></td>
                  <td><?php echo $kategoricek['kategori_sira'] ?></td>
                  <td><?php 
                  if ($kategoricek['kategori_durum']==1) {?>
                    <button class="btn btn-success btn-xs">Aktif</button>
                  <?php } else { ?>
                    <button class="btn btn-danger btn-xs">Pasif</button>
                    <?php } ?>
                   </td>
                   <td><center><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>"><button name="kategorisil" class="btn btn-danger btn-xs">Sil</button></a></center></td>



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
