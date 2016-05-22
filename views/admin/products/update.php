<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4 well">
				<a href="/admin/products/">&larr; Вернуться к товарам</a>
				<h4>Редактирование товара ID - <?php echo $productId; ?> </h4><hr>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Название товара:</label>
						<input type="text" class="form-control" name="name" value="<?php echo $product['name']; ?>" required />
					</div>
					<div class="form-group">
						<label>Цена, грн:</label>
						<input type="text" class="form-control" name="price" value="<?php echo $product['price']; ?>" required />
					</div>
					<div class="form-group">
						<label>Категория товара:</label>
						<select name="category_id" class="form-control">
							<?php if (is_array($categoryList)): ;?>
								<?php foreach($categoryList as $category): ;?>
									<option <?php if ($category['id'] === $product['category_id']) echo 'selected'; ?> value="<?php echo $category['id']; ?>">
										<?php echo $category['name']; ?>
									</option>
								<?php endforeach ;?>
							<?php endif ;?>
						</select>
					</div>
					<div class="form-group">
						<label>Бренд:</label>
						<input type="text" class="form-control" name="brand" value="<?php echo $product['brand']; ?>" required />
					</div>
					<div class="form-group">
						<label>Добавить изображение:</label>
						<img src="<?php echo Product::getImage($product['id']); ?>" width="400" alt="image" />
						<input type="file" name="image" placeholder="" value="" />
					</div>
					<div class="form-group">	
						<label>Есть в наличии:</label>
						<select name="status" class="form-control" required />	
							<option <?php if ($product['status'] == 0) echo 'selected '; ?>value="0">Нет</option>
							<option <?php if ($product['status'] == 1) echo 'selected '; ?>value="1">Да</option>
						</select>
					</div>
					<div class="form-group">
						<label>Детальное описание:</label>
						<textarea class="form-control" name="description" required><?php echo  $product['description']; ?></textarea>
					</div>

					<input type="submit" name="update_product" class="btn-block btn btn-success" value="Сохранить товар">
				</form>

			</div>
			<div class="col-sm-6"></div>
		</div>
	</body>
</html>