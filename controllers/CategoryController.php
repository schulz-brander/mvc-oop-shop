<?php

class CategoryController
{
	public function actionIndex()
	{
		$categories = array();
		$categories = Category::getAvailableCategory();

		$products = array();
		$products = Product::getAvailableProductsList();

		require_once (ROOT . '/views/category/category.php');
		return true;
	}

	public function actionShowByCategory($categoryId)
	{
		$categories = array();
		$categories = Category::getAvailableCategory();

		$products = array();
		$products = Product::getProductsListByCategory($categoryId);

		require_once (ROOT . '/views/category/category.php');
		return true;
	}
}