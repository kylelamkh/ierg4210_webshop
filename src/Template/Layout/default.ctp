<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'IERG 4210 Clothing Shop';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
    .jumbotron{
      margin-bottom: 0;
      width: 100%;
    }
    .nav-link{
      font-size: 20px;
    }
    .breadcrumb{
      background-color: #FFF;
      padding: 0px 0px 0px 0px;
    }
    .card{
      width: 200px;
    }
    .card-body, .card-text{
      text-align: center;
    }
    .card-title{
      color: #000;
	  font-size: 20px
    }
    .dropbtn{
      background-color: #CCC;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }
    .dropdown{
      position: relative;
      display: inline-block;
    }
    .dropdown-content{
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      right: 0;
      width: 100%;
      width: 400px;
    }
    #cartlist{
        text-align: justify;
    }
    .dropdown:hover .dropdown-content{
      display: block;
    }
    .dropdown:hover .dropbtn{
      background-color: #FFF;
    }
    .row, .col{
      margin: 0;
    }
    input{
      text-align: center;
    }
</style>
</head>

<body>
    <div class="jumbotron jumbotron-fluid text-center">
      <h1>IERG 4210 Clothing Shop</h1>
    </div>
    <?= $this->Flash->render() ?>
	<ul class="nav nav-tabs nav-justified">
		<li class="nav-item ">
			<?= $this->Html->link(__('Men'), ['class' => 'nav-link', 'controller'=>'Categories', 'action' => 'men']) ?>
		</li>
		<li class="nav-item">
			<?= $this->Html->link(__('Women'), ['class' => 'nav-link', 'controller'=>'Categories', 'action' => 'women']) ?>
		</li>
		<li class="nav-item">
			<?= $this->Html->link(__('Accessories'), ['class' => 'nav-link', 'controller'=>'Categories', 'action' => 'accessories']) ?>
		</li>
	</ul>
    <div class="container fluid">
		<br>
        <?= $this->fetch('content') ?>
    </div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		// Add the following code if you want the name of the file appear on select
		$(".custom-file-input").on("change", function() {
		  var fileName = $(this).val().split("\\").pop();
		  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>
</body>
</html>
