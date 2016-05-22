<?php

class AdminProductController
{
	public function actionIndex()
	{
		$productsList = Product::getProductsList();

		require_once ROOT . '/views/admin/products/index.php';
		return true;
	}

	public function actionCreate()
	{
		$categoryList = Category::getCategory();

		if (isset($_POST['create_product'])) {
			$options['name'] = $_POST['name'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['brand'] = $_POST['brand'];
			$options['description'] = $_POST['description'];
			$options['status'] = $_POST['status'];
			//Валидация бы не помешала вот тут!

			$id = Product::createNewProduct($options);

			if ($id) {
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/uploads/images/{$id}.jpg");
				}
			}

			header("Location: /admin/products/");
		}

		require_once ROOT . '/views/admin/products/create.php';
		return true;
	}

	public function actionUpdate($productId)
	{
		$categoryList = Category::getCategory();
		$product = Product::getProductById($productId);

		if (isset($_POST['update_product'])) {
			$options['name'] = $_POST['name'];
			$options['price'] = $_POST['price'];
			$options['category_id'] = $_POST['category_id'];
			$options['brand'] = $_POST['brand'];
			$options['description'] = $_POST['description'];
			$options['status'] = $_POST['status'];

			if (Product::updateProductById($productId, $options)) {
				
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/uploads/images/{$productId}.jpg");
				}

				header("Location: /admin/products/");
			}
		}

		require_once ROOT . '/views/admin/products/update.php';
		return true;
	}

	public function actionDelete($productId)
	{
		if (isset($_POST['back'])) {
			header("Location: /admin/products/");
		}

		elseif (isset($_POST['confirm_delete'])) {
			Product::deleteProductById($productId);
			header("Location: /admin/products/");
		}

		require_once ROOT . '/views/admin/products/delete.php';
		return true;
	}
}