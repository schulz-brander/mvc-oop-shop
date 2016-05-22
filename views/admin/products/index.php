<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8 well">
				<h4>Управление товарами</h4><hr>
				<a href="/admin/products/create/">+ Добавить новый товар<hr></a>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Название</th>
							<th>Категория</th>
							<th class="text-right">Цена</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($productsList as $product): ;?>
							<tr>
								<td><?php echo $product['id']; ?></td>
								<td><?php echo $product['name']; ?></td>
								<td><?php echo $product['category_id']; ?></td>
								<td class="text-right"><?php echo $product['price']; ?></td>
								<td class="text-center"><a href="/admin/products/update/<?php echo $product['id'];?>"> Редактировать</a></td>
								<td><a href="/admin/products/delete/<?php echo $product['id'];?>">Удалить</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</body>
</html>