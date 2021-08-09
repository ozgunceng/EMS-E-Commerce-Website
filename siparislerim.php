<?php include 'header.php';

$siparissor=$db->prepare("SELECT * FROM siparis order by siparis_id DESC");
$siparissor->execute();



$urunsor=$db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();


 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Sipariş Bilgilerim</div>
							<p >Vermiş olduğunuz siparişlerinizi listeliyorsunuz</p>
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
					<div class="title">Sipariş Bilgileri</div>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered chart">
						<thead>
							<tr>
								<
								<th>Sipariş No</th>
								<th>Kullanıcı</th>
								<th>Kullanıcı Adres</th>

								<th>Tarih</th>
								<th>Tutar</th>
								<th>Ödeme Tip</th>
								<th>Durum</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>

							<?php 
							 $kullanici_id=$kullanicicek['kullanici_id'];
							$siparissor=$db->prepare("SELECT * FROM siparis where kullanici_id=:id");
							$siparissor->execute(array(
								'id' => $kullanici_id
								));


								while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {?>
								<tr>

									<td><?php echo $sipariscek['siparis_id']; ?></td>
									<td><?php echo $kullanicicek['kullanici_adsoyad']; ?></td>
									<td><?php echo $kullanicicek['kullanici_adres']; ?></td>

									<td><?php echo $sipariscek['siparis_zaman']; ?></td>
									<td><?php echo $sipariscek['siparis_toplam']; ?></td>
									<td><?php echo $sipariscek['siparis_tip']; ?></td>

									<td><?php echo $sipariscek['siparis_durum']; ?></td>

                 <td >  <a  class="btn btn-warning" href="siparislerim-detay?siparis_id=<?php echo $sipariscek['siparis_id']?>"  > Detay </a></td>

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