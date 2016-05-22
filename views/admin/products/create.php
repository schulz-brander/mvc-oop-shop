<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4 well">
				<h4>Добавление нового товара</h4><hr>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Название товара:</label>
						<input type="text" class="form-control" name="name" required />
					</div>
					<div class="form-group">
						<label>Цена, грн:</label>
						<input type="text" class="form-control" name="price" required />
					</div>
					<div class="form-group">
						<label>Категория товара:</label>
						<select name="category_id" class="form-control">
							<?php if (is_array($categoryList)): ;?>
								<?php foreach($categoryList as $category): ;?>
									<option value="<?php echo $category['id']; ?>">
										<?php echo $category['name']; ?>
									</option>
								<?php endforeach ;?>
							<?php endif ;?>
						</select>
					</div>
					<div class="form-group">
						<label>Бренд:</label>
						<input type="text" class="form-control" name="brand" required />
					</div>
					<div class="form-group">
						<label>Добавить изображение:</label>
						<input type="file" name="image" placeholder="" value="" required />
					</div>
					<div class="form-group">	
						<label>Есть в наличии:</label>
						<select name="status" class="form-control" required />	
							<option value="1">Да</option>
							<option value="0">Нет</option>
						</select>
					</div>
					<div class="form-group">
						<label>Детальное описание:</label>
						<textarea class="form-control" name="description" required></textarea>
					</div>

					<input type="submit" name="create_product" class="btn-block btn btn-success" value="Сохранить товар">
				</form>

			</div>
			<div class="col-sm-6"></div>
		</div>
	</body>
</html>