<?php
return array(
	
	'cart/add/([0-9]+)' => 'cart/add/$1', // CartController actionAdd
	'cart/clear'		=> 'cart/clearCart', // CartController actionClearCart
	'cart$' 			=> 'cart/cartIndex', // CartController actionCartIndex

	'category/([0-9]+)' => 'category/showByCategory/$1',
	'category$' 		=> 'category/index',
	'product/([0-9]+)'  => 'product/view/$1',
	
	'admin/products/update/([0-9]+)'	=> 'adminProduct/update/$1', // AdminProductController actionUpdate
	'admin/products/delete/([0-9]+)'	=> 'adminProduct/delete/$1', // AdminProductController actionDelete
	'admin/products/create'				=> 'adminProduct/create', // AdminProductController actionCreate
	'admin/products$'					=> 'adminProduct/index', // AdminProductController actionIndex
	
	'admin/categories/update/([0-9]+)'	=> 'adminCategory/update/$1', // AdminCategoryController actionUpdate
	'admin/categories/delete/([0-9]+)'	=> 'adminCategory/delete/$1', // AdminCategoryController actionDelete
	'admin/categories/create'			=> 'adminCategory/create', // AdminCategoryController actionCreate
	'admin/categories$'					=> 'adminCategory/index', // AdminCategoryController actionIndex

	'admin/orders/update/([0-9]+)'	=> 'adminOrder/update/$1', // AdminOrderController actionUpdate
	'admin/orders/delete/([0-9]+)'	=> 'adminOrder/delete/$1', // AdminOrderController actionDelete
	'admin/orders/view/([0-9]+)'	=> 'adminOrder/view/$1', // AdminOrderController actionView
	'admin/orders$'					=> 'adminOrder/index', // AdminOrderController actionIndex
	
	'admin$' => 'admin/index', // AdminController actionIndex
	
	'$' 	 => 'main/index' // MainController actionIndex
);


