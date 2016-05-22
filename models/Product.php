<?php

class Product
{
	public static function getProductsList() // Метод для админки
	{	
		$db = Db::getConnection();
		$products = array();
		$result = $db->query("SELECT id, name, price, category_id FROM product
							  ORDER BY id");

		$i = 0;
		while ($row = $result->fetch()) {
			$products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			$products[$i]['category_id'] = $row['category_id'];
			$i++;
		}
		return $products;	
	}

	public static function getAvailableProductsList()
	{	
		$db = Db::getConnection();
		$products = array();
		$result = $db->query("SELECT id, name, price FROM product
							  WHERE status = '1'
							  ORDER BY id");

		$i = 0;
		while ($row = $result->fetch()) {
			$products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			$i++;
		}
		return $products;	
	}

	public static function getProductsListByCategory($categoryId = false)
	{	
		if ($categoryId)
		{
			$db = Db::getConnection();
			$products = array();
			$result = $db->query("SELECT id, name, price FROM product
								  WHERE status = '1' AND category_id = '$categoryId'
								  ORDER BY id DESC");

			$i = 0;
			while ($row = $result->fetch()) {
				$products[$i]['id'] = $row['id'];
				$products[$i]['name'] = $row['name'];
				$products[$i]['price'] = $row['price'];
				$i++;
			}
			return $products;	
		}
	}

	public static function getProductById($productId)
	{
		$productId = intval($productId);

		if ($productId)
		{
			$db = Db::getConnection();

			$result = $db->query("SELECT * FROM product WHERE id = '$productId'");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function getProductsInCartById($idsArray)
    {

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT id, name, price FROM product WHERE status='1' AND id IN ($idsString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    public static function createNewProduct($options)
    {
    	$db = Db::getConnection();
        $sql = "INSERT INTO product (name, price, category_id, brand, description, status)
        		VALUES (:name, :price, :category_id, :brand, :description, :status)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($result->execute()) {
        	return $db->lastInsertId();
        }

        return 0;
    }

	public static function updateProductById($productId, $options)
    {
    	$db = Db::getConnection();
        
        $sql = "UPDATE product 
        		SET 
        			name = :name, 
        			price = :price, 
        			category_id = :category_id, 
        			brand = :brand, 
        			description = :description, 
        			status = :status
        		WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $productId, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }

    public static function deleteProductById($productId)
    {
		$db = Db::getConnection();

		$sql = 'DELETE FROM product WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $productId, PDO::PARAM_INT);
		return $result->execute();
    }

    public static function getImage($productId)
	{
		$defaultImage = "/uploads/images/noimage.jpg";

		if (is_file(ROOT . "/uploads/images/{$productId}.jpg")) {
			return "/uploads/images/{$productId}.jpg";
		}
		return $defaultImage;
	}
}

































