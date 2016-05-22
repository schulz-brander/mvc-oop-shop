<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4 well">
				<a href="/admin/categories/">&larr; Вернуться к категориям</a>
				<h4>Изменение категории - ID <?php echo $category['id'] ;?></h4><hr>
				<form action="" method="POST">
					<div class="form-group">
						<label>Имя категории:</label>
						<input type="text" class="form-control" name="name" value="<?php echo $category['name'] ;?>" required />
					</div>
					<div class="form-group">
						<label>Отображать категорию на сайте?</label>
						<select name="status" class="form-control" required />	
							<option <?php if ($category['status'] == 0) echo 'selected '; ?>value="0">Нет</option>
							<option <?php if ($category['status'] == 1) echo 'selected '; ?>value="1">Да</option>
						</select>
					</div>
					<input type="submit" name="update_category" class="btn-block btn btn-success" value="Сохранить изменения">
				</form>

			</div>
			<div class="col-sm-6"></div>
		</div>
	</body>
</html>