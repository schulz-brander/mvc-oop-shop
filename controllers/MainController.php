<?php

class MainController
{
	public function actionIndex()
	{
		$categories = array();
		$categories = Category::getAvailableCategory();

		require_once (ROOT . '/views/main/index.php');
		return true;
	}
}