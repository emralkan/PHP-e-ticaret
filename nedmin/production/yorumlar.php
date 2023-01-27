<?php 

include 'header.php'; 


$yorumsor=$db->prepare("SELECT * FROM yorumlar order by yorum_id DESC");
$yorumsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yorum Ayarları <small> İşlem Durumu:
              
            </small> </h2>
            
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Yorum İd</th>
                  <th>Kullanıcı İd</th>
                  <th>Yorum Detay</th>
                  <th>Yorum Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $yorumcek['yorum_id'] ?></td>
                  <td><?php echo $yorumcek['kullanici_id'] ?></td>
                  <td><?php echo $yorumcek['yorum_detay'] ?></td>
                  <td><?php 
                  if ($yorumcek['yorum_onay']==1) {?>
                    <button class="btn btn-success btn-xs">Aktif</button>
                  <?php } else { ?>
                    <button class="btn btn-danger btn-xs">Pasif</button>
                    <?php } ?>
                   </td>
                   <td><a href="yorum-duzenle.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></td>
                   <td><center><a class="btn btn-danger btn-xs" href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yorumsil=ok">Sil</a></center></td>
                  
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
