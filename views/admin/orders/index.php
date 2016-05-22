<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8 well">
				<h4>Управление заказами</h4><hr>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Имя клиента</th>
							<th>Номер телефона</th>
							<th>Email</th>
							<th>Дата заказа</th>
							<th>Сумма заказа</th>
							<th>Статус</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($ordersList as $order): ;?>
							<tr>
								<td><?php echo $order['id']; ?></td>
								<td><?php echo $order['user_name']; ?></td>
								<td><?php echo $order['user_phone']; ?></td>
								<td><?php echo $order['user_email']; ?></td>
								<td><?php echo $order['date']; ?></td>
								<td><?php echo $order['total_price'] ?></td>
								<td><?php echo $order['status']; ?></td>

								<td><a href="/admin/orders/view/<?php echo $order['id']; ?>">Подробнее</a></td>
								<td><a href="/admin/orders/update/<?php echo $order['id']; ?>">Редактировать</a></td>
								<td><a href="/admin/orders/delete/<?php echo $order['id']; ?>">Удалить</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</body>
</html>