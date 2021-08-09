

		<div class="main-slide">
			<div id="sync1" class="owl-carousel">

<?php




$slidersor=$db->prepare("SELECT * FROM slider");
$slidersor->execute();


                while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {







?>



<form action="nedmin/netting/islem.php" method="POST" >


				<div class="item">
					<div class="slide-desc">
						<div class="inner">
							<h1><?php echo $slidercek['slider_ad'] ?></h1>
							<p>
								<?php echo $slidercek['slider_aciklama']; ?>
							</p>
							
<!--	sepete ekle butonunu kaldırdım sliderdan ürün çekemedim sepete ekleniyor ama boş ürün gelmedi

 	<button   type="submit"    name="sepetekle"   class="btn btn-default btn-red btn-lg">Sepete Ekle</button>  -->


						</div>
						<div class="inner">
							<div class="pro-pricetag big-deal">
								<div class="inner">
										<span class="oldprice"><?php echo $slidercek['slider_fiyat']*1.5 ?>TL</span>
										<span><?php echo $slidercek['slider_fiyat']; ?>TL</span>
										<span class="ondeal">En Uygun</span>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-type-1">
						<a href="<?php $slidercek['slider_link'] ?>" ><img src="<?php echo $slidercek['slider_resimyol'] ?>" alt="" class="img-responsive"></a>
					</div>
				</div>
			</form>

<?php } ?>




		<div class="bar"></div>
		<div id="sync2" class="owl-carousel">
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Nike Airmax</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Unique smaragd ring</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Nike Airmax</h3>
					<p>Description here here here</p>
				</div>
			</div>
		</div>
	</div>