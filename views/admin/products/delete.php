<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8 well">
				<a href="/admin/products/">&larr; Вернуться к товарам</a>
				<h4>Удалить товар № <?php echo $productId ;?> <hr></h4>
				<h6>Вы действительно хотите удалить этот товар?</h6>
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