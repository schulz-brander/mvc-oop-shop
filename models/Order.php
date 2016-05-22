<?php

class Order
{
	public static function save($userName, $userPhone, $userEmail, $products, $totalPrice) 
	{
		$products = serialize($products);

		$db = Db::getConnection();

		$sql = 'INSERT INTO product_order (user_name, user_phone, user_email, products, total_price)
				VALUES (:user_name, :user_phone, :user_email, :products, :total_price)';
		$result = $db->prepare($sql);
		$result->bindParam(':user_name', $userName, PDO::PARAM_STR);
		$result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
		$result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
		$result->bindParam(':products', $products, PDO::PARAM_STR);
		$result->bindParam(':total_price', $totalPrice, PDO::PARAM_INT);

		return $result->execute();
	}

	public static function getOrdersList()
	{
		$db = Db::getConnection();
		$orders = array();
		$result = $db->query("SELECT id, user_name, user_phone, user_email, `date`, products, total_price, status FROM product_order
							  ORDER BY id");

		$i = 0;
		while ($row = $result->fetch()) {
			$products[$i]['id'] = $row['id'];
			$products[$i]['user_name'] = $row['user_name'];
			$products[$i]['user_phone'] = $row['user_phone'];
			$products[$i]['user_email'] = $row['user_email'];
			$products[$i]['date'] = $row['date'];
			$products[$i]['products'] = unserialize($row['products']);
			$products[$i]['total_price'] = $row['total_price'];
			$products[$i]['status'] = $row['status'];
			$i++;
		}

		return $products;	
	}

	public static function getOrderById($orderId) 
	{
		$orderId = intval($orderId);

		if ($orderId)
		{
			$db = Db::getConnection();

			$result = $db->query("SELECT * FROM product_order WHERE id = '$orderId'");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function deleteOrderById($orderId)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM product_order WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $orderId, PDO::PARAM_INT);
		return $result->execute();
	}

	public static function updateOrderById($orderId, $options)
    {
    	$db = Db::getConnection();
        
        $sql = "UPDATE product_order
        		SET 
        			user_name = :user_name, 
        			user_phone = :user_phone,
					user_email = :user_email,
					status = :status
        		WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $orderId, PDO::PARAM_INT);
        $result->bindParam(':user_name', $options['user_name'], PDO::PARAM_STR);
        $result->bindParam(':user_phone', $options['user_phone'], PDO::PARAM_STR);
        $result->bindParam(':user_email', $options['user_email'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }
}