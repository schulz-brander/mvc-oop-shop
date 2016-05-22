<?php

class AdminCategoryController
{
	public function actionIndex()
	{
		$categoryList = Category::getCategory();
		
		require_once ROOT . '/views/admin/categories/index.php';
		return true;
	}

	public function actionCreate()
	{
		if (isset($_POST['create_category'])) {
			$options['name'] = $_POST['name'];
			$options['status'] = $_POST['status'];
			//Валидация бы не помешала вот тут тоже!

			if (Category::createNewCategory($options)) {
				header("Location: /admin/categories/");
			}
		}

		require_once ROOT . '/views/admin/categories/create.php';
		return true;
	}

	public function actionUpdate($categoryId)
	{
		$category = Category::getCategoryById($categoryId);

		if (isset($_POST['update_category'])) {
			$options['name'] = $_POST['name'];
			$options['status'] = $_POST['status'];
			//Валидация бы не помешала вот тут тоже!

			if (Category::updateCategoryById($categoryId, $options)) {
				header("Location: /admin/categories/");
			}
		}

		require_once ROOT . '/views/admin/categories/update.php';
		return true;
	}

	public function actionDelete($categoryId)
	{
		$category = Category::getCategoryById($categoryId);

		if (isset($_POST['back'])) {
			header("Location: /admin/categories/");
		}

		elseif (isset($_POST['confirm_delete'])) {
			Category::deleteCategoryById($categoryId);

			header("Location: /admin/categories/");
		}

		require_once ROOT . '/views/admin/categories/delete.php';
		return true;
	}
}