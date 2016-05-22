<?php

class Cart
{
	public static function addProduct($productId)
	{
		$productId = intval($productId);

		$productsInCart = array();

		if (isset($_SESSION['products'])) {
			$productsInCart = $_SESSION['products'];
		}

		if (array_key_exists($productId, $productsInCart)) {
			$productsInCart[$productId]++;
		} else {
			$productsInCart[$productId] = 1;
		}

		$_SESSION['products'] = $productsInCart;
	}

	public static function countCartItems()
	{
		if (isset($_SESSION['products'])) {
			$count = 0;
			foreach ($_SESSION['products'] as $id => $quantity) {
				$count += $quantity;
			}
			return $count;
		} else {
			return 0;
		}
	}

	public static function getProducts()
	{
		if (isset($_SESSION['products'])) {
			return $_SESSION['products'];
		}
		return false;
	}

	public static function getTotalPrice($products)
	{
		$productsInCart = self::getProducts();
		if ($productsInCart) {
			$total = 0;
			foreach ($products as $item) {
				$total += $item['price'] * $productsInCart[$item['id']];
			}
		}
		return $total;
	}

	public static function clearCart()
	{
		if (isset($_SESSION['products'])) {
			unset($_SESSION['products']);
		}
		return true;
	}
}