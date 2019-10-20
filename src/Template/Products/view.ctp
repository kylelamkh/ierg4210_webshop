<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<style>
.card{
  width: auto;
  height: auto;
  margin: 10px
}
.card-body, .card-text{
  font-size: 20px;
  text-align: center;
}
#description{
  font-size: 20px;
  text-align: justify;
}
.card-title{
  color: #000;
  font-size: 30px;
}
</style>

<div class="container-fluid">
  <div class="container-fluid">
        <div class="row">
			<div class="col-sm">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<?= $this->Html->link(ucwords($product[0]['category']), ['controller' => 'Categories', 'action' => $product[0]['category']], ['class' => 'breadcrumb-item']) ?>
						<?php echo('<li class="breadcrumb-item active" aria-current="page">'.$product[0]['name'].'</li>')?>
					</ol>
				</nav>
				</div>
			<div class="col-sm">
			  <div class="text-right">
				<div class="dropdown">
				  <button class="dropbtn btn-light">Shopping Cart</button>
				  <div class="dropdown-content">
					<div class="container-fluid" id="cartlist">
					  <div class="row">
						<div class="col-sm">
						  <img src="image/173690470-front-pdp.jpg" class="img-thumbnail">
						</div>
						<div class="col-sm">
						  <label class="control-label">Quantity:</label>
						  <input type="number" value="1" min="1">
						</div>
					  </div>
					  <div class="text-center">
						<button class="btn btn-light btn-block">Checkout</button>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>

	<div class="container">
	  <div class="card">
		<?= $this->Html->image($product[0]['pid'].".jpg", ['class' => 'card-img-top']);?>
		<div class="card-body">
		  <?php echo('<h3 class="card-title">'.$product[0]['name'].'</h3>');?>
		  <?php echo('<p class="card-text" id="description">'.$product[0]['description'].'</p>') ?>
		  <?php echo('<p class="card-text">$'.$product[0]['price'].'</p>') ?>
		  <a href="#" class="btn btn-outline-dark">Add to Cart</a>
		</div>
	  </div>
	</div>
</div>
