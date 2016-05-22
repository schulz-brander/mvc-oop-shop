<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-3 well">
				<a href="/admin/orders/">&larr; Вернуться к заказам</a>
				<h4>Редактирование заказа - ID <?php echo $orderId ;?></h4><hr>
				<form action="" method="POST">
					<div class="form-group">
						<label>Имя клиента:</label>
						<input type="text" class="form-control" name="user_name" value="<?php echo $order['user_name']; ?>" required />
					</div>
					<div class="form-group">
						<label>Номер телефона:</label>
						<input type="text" class="form-control" name="user_phone" value="<?php echo $order['user_phone']; ?>" required />
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" class="form-control" name="user_email" value="<?php echo $order['user_email']; ?>" required />
					</div>
					<div class="form-group">
						<label>Статус:</label>
						<select name="status" class="form-control" required />	
							<option value="0">Новый</option>
							<option value="1">Обработан</option>
							<option value="2">Доставлен</option>
							<option value="3">Отменен</option>
						</select>
					</div>
					<input type="submit" name="update_order" class="btn-block btn btn-success" value="Сохранить изменения">
			</div>
			<div class="col-sm-5">
				<div class="form-group">
					<table class="table">
					<thead>
						<tr>
							<th>Товар</th>
							<th>Цена, грн</th>
							<th>Кол-во, шт</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($products as $product): ;?>
							<tr>
								<td><?php echo $product['name']; ?></td>
								<td><?php echo $product['price']; ?></td>
								<td><?php echo $productsInOrderArray[$product['id']]; ?></td> <!-- берем количество - смотри AdminOrderController->actionUpdate -->
							</tr>
						<?php endforeach; ?>
						<tr>
							<th>Дата заказа: <?php echo $order['date']; ?></th>
							<th>На сумму: </th>
							<th><?php echo $order['total_price']; ?> грн</th>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
			<div class="col-sm-2"></div>
				</form> <!-- Форма закрыта только ТУТ, что бы можно было редактировать товары в заказе -->
		</div>
	</body>
</html>