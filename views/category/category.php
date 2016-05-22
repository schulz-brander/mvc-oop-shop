<?php include ROOT . '/views/layouts/header.php'; ?>
	<div class="list col-sm-9">
		<?php foreach ($products as $productItem): ;?>
		<a href="/product/<?php echo $productItem['id']; ?>">
			<div class="product col-sm-4">
				<img src="<?php echo Product::getImage($productItem['id']); ?>" width="300" class="img-responsive">
				<h5 class="text-center"><?php echo $productItem['name']; ?></h4>
				<h5 class="text-center">Цена: <?php echo $productItem['price']; ?></h4>
				</br>
			</div>
		</a>
		<?php endforeach ;?>
	</div>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>		