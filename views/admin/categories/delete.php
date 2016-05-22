<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8 well">
				<a href="/admin/categories/">&larr; Вернуться к категориям</a>
				<h4>Удалить категорию № <?php echo $category['id'] ;?> <hr></h4>
				<h6>Вы действительно хотите удалить категорию "<?php echo $category['name'] ;?>" ?</h6>
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