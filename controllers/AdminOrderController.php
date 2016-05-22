<?php

class AdminOrderController
{
	public function actionIndex()
	{
		$ordersList = Order::getOrdersList();

		require_once ROOT . '/views/admin/orders/index.php';
		return true;
	}

	public function actionView($orderId)
	{
		$order = Order::getOrderById($orderId);

		$productsInOrderArray = unserialize($order['products']);
		$idsArray = array_keys($productsInOrderArray);
		$products = Product::getProductsInCartById($idsArray);

		if (isset($_POST['ok_order'])) {
			header("Location: /admin/orders/");
		}

		require_once ROOT . '/views/admin/orders/view.php';
		return true;
	}

	public function actionUpdate($orderId)
	{
		$order = Order::getOrderById($orderId);

		$productsInOrderArray = unserialize($order['products']);
		$idsArray = array_keys($productsInOrderArray);
		$products = Product::getProductsInCartById($idsArray);

		if (isset($_POST['update_order'])) {
			$options['user_name'] = $_POST['user_name'];
			$options['user_phone'] = $_POST['user_phone'];
			$options['user_email'] = $_POST['user_email'];
			$options['status'] = $_POST['status'];

			if (Order::updateOrderById($orderId, $options)) {
				header("Location: /admin/orders/");
			}
		}

		require_once ROOT . '/views/admin/orders/update.php';
		return true;
	}

	public function actionDelete($orderId)
	{
		if (isset($_POST['back'])) {
			header("Location: /admin/orders/");
		}

		elseif (isset($_POST['confirm_delete'])) {
			Order::deleteOrderById($orderId);
			header("Location: /admin/orders/");
		}

		require_once ROOT . '/views/admin/orders/delete.php';
		return true;
	}
}