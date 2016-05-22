<?php include ROOT . '/views/layouts/header.php'; ?>	
		<div class="list col-sm-9">
			<div class="col-sm-5">
				<img src="<?php echo Product::getImage($product['id']); ?>" class="img-responsive">
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-6">
				<h3><?php echo $product['name']; ?></h3>
				<h2>Цена: <?php echo $product['price']; ?> грн.</h2>
				<h5>Наличие: На складе</h5>
				<h5>Бренд: <?php echo $product['brand']; ?></h5>
				<a href="/cart/add/<?php echo $product['id']; ?>">

				<br>
					<button type="button" class="btn btn-success">&nbsp &nbsp &nbsp Купить &nbsp &nbsp &nbsp</button>
				</a>
			</div>
		</div>
		<div class="ca col-sm-3"></div>
		<div id="description" class="ca col-sm-9">
			<br>
			<p><?php echo $product['description']; ?>
			</p>
		</div>
	</div>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>