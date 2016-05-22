<?php

class Category
{
	public static function getCategory() 
	{
		$db = Db::getConnection();
		$categoryList = array();

		$result = $db->query('SELECT id, name, status FROM category');

		$i = 0;
		while ($row = $result->fetch()) {
			$categoryList[$i]['id'] = $row['id'];
			$categoryList[$i]['name'] = $row['name'];
			$categoryList[$i]['status'] = $row['status'];
			$i++;
		}
		return $categoryList;
	}

	public static function getAvailableCategory() 
	{
		$db = Db::getConnection();
		$categoryList = array();

		$result = $db->query('SELECT id, name FROM category WHERE status = 1');

		$i = 0;
		while ($row = $result->fetch()) {
			$categoryList[$i]['id'] = $row['id'];
			$categoryList[$i]['name'] = $row['name'];
			$i++;
		}
		return $categoryList;
	}

	public static function getCategoryById($categoryId) 
	{
		$categoryId = intval($categoryId);

		if ($categoryId)
		{
			$db = Db::getConnection();

			$result = $db->query("SELECT * FROM category WHERE id = '$categoryId'");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function getProductsListByCategory($categoryId = false)
	{	
		if ($categoryId)
		{
			$db = Db::getConnection();
			$products = array();
			$result = $db->query("SELECT id, name, price, image FROM product
								  WHERE status = '1' AND category_id = '$categoryId'
								  ORDER BY id DESC");

			$i = 0;
			while ($row = $result->fetch()) {
				$products[$i]['id'] = $row['id'];
				$products[$i]['name'] = $row['name'];
				$products[$i]['price'] = $row['price'];
				$products[$i]['image'] = $row['image'];
				$i++;
			}

			return $products;	
		}
	}

	public static function deleteCategoryById($categoryId)
	{
		$db = Db::getConnection();

		$sql = 'DELETE FROM category WHERE id = :id';

		$result = $db->prepare($sql);
		$result->bindParam(':id', $categoryId, PDO::PARAM_INT);
		return $result->execute();
	}

	public static function createNewCategory($options)
    {
    	$db = Db::getConnection();
        $sql = "INSERT INTO category (name, status)
        		VALUES (:name, :status)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateCategoryById($categoryId, $options)
    {
    	$db = Db::getConnection();
        
        $sql = "UPDATE category
        		SET 
        			name = :name, 
        			status = :status
        		WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        return $result->execute();
    }
}