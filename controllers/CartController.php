<?php

class CartController
{
	public function actionCartIndex()
	{
		$categories = array();
		$categories = Category::getAvailableCategory();

		$productsInCart = false;
		$productsInCart = Cart::getProducts();

		if ($productsInCart) {
			$productsIds = array_keys($productsInCart);
			$products = Product::getProductsInCartById($productsIds);
			$totalPrice = Cart::getTotalPrice($products);
		}
		// При оформлении заказа
        if (isset($_POST['confirm_order'])) {

            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userEmail = $_POST['userEmail'];
            $totalPrice = $_POST['totalPrice'];

            $errors = false;
            // Валидация полей
            if (!Validation::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!Validation::checkPhone($userPhone)) {
                $errors[] = 'Неправильно указан телефон';
            }
            if (!Validation::checkEmail($userEmail)) {
                $errors[] = 'Неправильно указан Email';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Order::save($userName, $userPhone, $userEmail, $productsInCart, $totalPrice);
                if ($result) {
                    
                    // Можно подключить оповещение админа по почте (но не на локальном сервере)        
                    /*
	                    $adminEmail = 'rambler@mail.ru';
	                    $message = '<a href="http://>Список заказов</a>';
	                    $subject = 'Новый заказ!';
	                    mail($adminEmail, $subject, $message);
                    */
                    Cart::clearCart();
                }
            }
        }
		// Конец блока оформления заказа

		require_once ROOT . '/views/cart/cart.php';
		return true;
	}	

	public function actionAdd($productId)
	{
		Cart::addProduct($productId);

		header("Location: /cart/");
		return true;
	}

	public function actionClearCart()
	{
		Cart::clearCart();

		$referrer = $_SERVER['HTTP_REFERER'];
		header("Location: $referrer");
	}
}