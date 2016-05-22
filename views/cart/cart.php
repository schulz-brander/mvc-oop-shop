<?php include ROOT . '/views/layouts/header.php'; ?>
	<div class="list col-sm-9">
		<h3 class="text-center">Корзина </h3>
		<?php if ($productsInCart): ?> 

			<?php if (isset($_POST['confirm_order']) && empty($errors)): ;?>
				<h4>Заказ оформлен. Мы c Вами свяжемся в кратчайшие сроки.</h4>
			<?php elseif (!isset($_POST['confirm_order']) || isset($errors)): ;?> 

				<a href="/cart/clear"><h4>Очистить корзину</h4></a>
				<table class="table">
					<thead>
						<tr>
							<th>Название</th>
							<th>Стоимость, грн</th>
							<th>Количество, шт</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($products as $product): ;?>
							<tr>
								<td><?php echo $product['name']; ?></td>
								<td><?php echo $product['price']; ?></td>
								<td><?php echo $productsInCart[$product['id']]; ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<th></th>
							<th class="text-right">На общую сумму:</th>
							<th><?php echo $totalPrice; ?> грн</th>
						</tr>
					</tbody>
				</table>
				<form role="form" class="col-sm-4" method="POST" action="">
					<div class="form-group">
						<label for="name">* Имя и фамилия:</label>
						<input type="text" class="form-control" name="userName" placeholder="Иван Иванов" required />
					</div>
					<div class="form-group">	
						<label for="phone">* Номер телефона:</label>
						<input type="text" class="form-control" name="userPhone" placeholder="+380933333333" required />
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" name="userEmail" placeholder="example@gmail.com" required />
					</div>
						<input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>" />
					<input type="submit" name="confirm_order" class="btn-block btn btn-success" value="Оформить заказ" />
				</form>

				<div id="errors" class="col-sm-8">
					<?php if (isset($errors) && is_array($errors)): ?>
			            <ul>
			                <?php foreach ($errors as $error): ?>
			                    <li> - <?php echo $error; ?></li>
			                <?php endforeach; ?>
			            </ul>
		        	<?php endif; ?>
		        </div>
			<?php endif ;?>
		<?php else: ?>
			<h4>Корзина пока пуста...<h4>
		<?php endif; ?>

		
		

	</div>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
