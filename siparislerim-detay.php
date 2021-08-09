<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle"><?php echo $_GET['siparis_id'] ?> Numaralı Sipariş Detayı  </div>
							<p >Vermiş olduğunuz siparişin detayını listeliyorsunuz</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-12">
				<div class="title-bg">
					<div class="title">Sipariş No: <?php echo $_GET['siparis_id'] ?>   </div>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered chart">
						<thead>
							<tr>
								

                  <th>Sipariş Tarihi</th>
                  <th>Sipariş Kodu</th>
                  <th>Ürün Kodu</th>

                  <th>Sipariş Tipi</th>
                  <th>Ürün Fiyat</th>
                  <th>Ürün Adet</th>
                  <th>Ürün Adı</th>
                  <th>Müşteri</th>
                  <th>Adres</th>
								
							</tr>
						</thead>
						<tbody>

							<?php 

               $kullanici_id=$kullanicicek['kullanici_id'];
           
                    $siparissor=$db->prepare("SELECT * FROM siparis_detay where siparis_id=:siparis_id ");

                  $siparissor->execute(array(
                    'siparis_id' => $_GET['siparis_id']
                  ));

// alan kişinin id gelmiyor toplu geliyor onu seçmen lazım
                      $say=0;

                while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++?>



                <tr>
                 <td><?php echo $sipariscek['siparis_zaman'] ?></td>
                 <td><?php echo $sipariscek['siparis_id'] ?></td>
                 <td><?php echo $sipariscek['urun_id'] ?></td>
                 <td><?php echo $sipariscek['siparis_tip'] ?></td>

                 <td width="20"><?php echo $sipariscek['urun_fiyat'] ?> TL</td>

                 <td width="20"><?php echo $sipariscek['urun_adet'] ?></td>
                 <td><?php echo $sipariscek['urun_ad'] ?></td>
                 <td><?php echo $sipariscek['kullanici_adsoyad'] ?></td>
                 <td><?php echo $sipariscek['kullanici_adres'] ?></td>



               </tr>


								<?php } ?>

							</tbody>
						</table>
					</div>











				</div>

			</div>
		</div>
	</form>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?> 