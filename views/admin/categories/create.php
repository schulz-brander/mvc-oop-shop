<?php include ROOT . '/views/layouts/admin_header.php'; ?>

		<div id="admin-section" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4 well">
				<h4>Добавление новой категории</h4><hr>
				
				<form action="" method="POST">
					<div class="form-group">
						<label>Имя категории:</label>
						<input type="text" class="form-control" name="name" required />
					</div>
					<div class="form-group">
						<label>Отображать категорию на сайте?</label>
						<select name="status" class="form-control" required />	
							<option value="1">Да</option>
							<option value="0">Нет</option>
						</select>
					</div>
					<input type="submit" name="create_category" class="btn-block btn btn-success" value="Добавить категорию">
				</form>

			</div>
			<div class="col-sm-6"></div>
		</div>
	</body>
</html>