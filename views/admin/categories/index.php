<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8 well">
				<h4>Управление категориями<hr></h4>
				<a href="/admin/categories/create/">+ Добавить новую категорию<hr></a>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Название</th>
							<th class="text-right">Статус</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($categoryList as $category): ;?>
							<tr>
								<td><?php echo $category['id']; ?></td>
								<td><?php echo $category['name']; ?></td>
								<td class="text-right"><?php echo $category['status']; ?></td>
								<td class="text-center"><a href="/admin/categories/update/<?php echo $category['id'];?>"> Редактировать</a></td>
								<td><a href="/admin/categories/delete/<?php echo $category['id'];?>">Удалить</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</body>
</html>