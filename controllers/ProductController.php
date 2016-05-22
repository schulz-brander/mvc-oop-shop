<?php

class ProductController
{
	public function actionView($productId)
	{
		$categories = array();
		$categories = Category::getAvailableCategory();

		$product = Product::getProductById($productId);

		require_once (ROOT . '/views/product/view.php');
		return true;
	}
}