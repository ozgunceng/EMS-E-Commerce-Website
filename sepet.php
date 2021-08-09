<?php include 'header.php'




 ?>

<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>
	<div class="title-bg">
		<div class="title">Alışveriş Sepetim</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Kaldır</th>
					<th>Ürün Resim</th>
					<th>Ürün ad</th>
					<th>Ürün Kodu</th>
					<th>-</th>
					<th>Adet</th>
					<th>+</th>
					<th> Fiyat</th>
				</tr>
			</thead>
			<tbody>


				<?php 


// ürün fotosu çıkartmak için ekledim sonra çıkarabilirim


	$urun_id=$uruncek['urun_id'];
					//ilk foto kapak fotosu olacak asc limitle limitledim
					$urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira  ");
					$urunfotosor->execute(array(
						'urun_id' => $urun_id
						));

					$urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC);

// buraya kadar yeni eklendi foto için


				$kullanici_id=$kullanicicek['kullanici_id'];
				$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
				$sepetsor->execute(array(
					'id' => $kullanici_id
					));

				while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

					$urun_id=$sepetcek['urun_id'];
					$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
					$urunsor->execute(array(
						'urun_id' => $urun_id
						));

//toplam fiyatı belirledim
					$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
                    //$toplam_fiyat=$toplam_fiyat+($uruncek['urun_fiyat']*$sepetcek['urun_adet']) ;
					//echo $topla=$uruncek['urun_fiyat']*$sepetcek['urun_adet'];

                                  $urun_id=$uruncek['urun_id'];
                                   $urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira ASC limit 1 ");
                                   $urunfotosor->execute(array(
                                          'urun_id' => $urun_id
                                          ));




                                   $urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC);

					?>

					<tr>

						<td><a href="nedmin/netting/islem.php?sepet_id=<?php echo $sepetcek['sepet_id']; ?>&sepetsil=ok"><button class="btn btn-danger ">Sil</button></a></td>



						<td><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad'] ?></td>
						<td><?php echo $uruncek['urun_id'] ?></td>
						

						<td><a href="nedmin/netting/islem.php?sepet_id=<?php echo $sepetcek['sepet_id']; ?>&sepetazalt=ok"><button class="btn btn-warning btn-xs">-</button></a></td>



                        <td><form><input type="text" class="form-control quantity" value="<?php echo $sepetcek['urun_adet'] ?>"></form></td>



						<td><a href="nedmin/netting/islem.php?sepet_id=<?php echo $sepetcek['sepet_id']; ?>&sepetart=ok"><button class="btn btn-success btn-xs">+</button></a></td>



						<td><?php echo $uruncek['urun_fiyat'] ?></td>
					</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">


			</div>
			<div class="col-md-3 col-md-offset-3">
				<div class="subtotal-wrap">
					<!--<div class="subtotal">
						<<p>Toplam Fiyat : $26.00</p>
						<p>Vat 17% : $54.00</p>
					</div>-->
					<div class="total">Toplam Fiyat : <span class="bigprice"><?php echo $toplam_fiyat ?> TL</span></div>
					<div class="clearfix"></div>

					<!-- TOPLAM FIYAT SIFIRSA ODEME SAYFASINA GONDERMEDIM-->
<?php
  if($toplam_fiyat!=0)  {?>
					<a href="odeme" class="btn btn-default btn-yellow">Ödeme Sayfası</a>
		<?php } ?>	



				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="spacer"></div>
	</div>

	<?php include 'footer.php' ?>