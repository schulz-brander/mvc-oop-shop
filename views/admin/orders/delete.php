<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8 well">
				<a href="/admin/orders/">&larr; Вернуться к заказам</a>
				<h4>Удалить категорию № <?php echo $orderId ;?> <hr></h4>
				<h6>Вы действительно хотите удалить этот заказ?</h6>
				<br>
				<form method="POST">
					<input type="submit" name="back" class="btn btn-info" value="&nbsp Нет &nbsp" />
					&nbsp &nbsp
					<input type="submit" name="confirm_delete" class="btn btn-danger" value="Удалить" />
				</form>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</body>
</html>