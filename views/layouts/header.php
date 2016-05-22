<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8" />
    	<title>Тестовое задание - интернет-магазин</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet" />
        <!-- <link href="style.css" rel="stylesheet" /> -->
    </head>
    <body>
	    <div id="wrapper" class="container">
		    
		    <div id="header" class="row">
				<div id="phone" class="col-sm-3">
					<div></br><h4>Номер телефона - 937 99 92</h4></div>
				</div>
				<div id="header-content" class="col-sm-9">
					<div class="text-right">
						<a href="/cart/"><br>
							<button type="button" class="btn btn-info">Корзина <?php if (isset($_SESSION['products'])) echo '(' . Cart::countCartItems() . ')';?></button>
						</a>
					</div>
				</div>
			</div>

			<div id="navigation" class="row">
				<div class="col-sm-12 well">	
					<ul class="nav navbar-nav">
				      <li class="active"><a href="/">Главная</a></li>
				      <li><a href="/category/">Каталог</a></li>
				      <li><a href="#">Новости</a></li>
				      <li><a href="#">Контакты</a></li>
				    </ul>
				</div>
			</div>

			<div id="section-middle" class="row">
				<div class="col-sm-12">
					<div id="category" class="ca col-sm-3 well">
						<ul class="nav nav-list">
							<li class="nav-header"><h4>Категории товаров</h4></li>
						    </br>
						    <?php foreach ($categories as $categoryItem): ;?>
						    <li class="active"><a href="/category/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name']; ?></a></li>
						    <?php endforeach; ?>
						</ul>
					</div>