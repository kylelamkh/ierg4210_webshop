<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
			<div class="col-sm">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Women</li>
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
		<div class="card-columns">
			<?php foreach ($womenProducts as $product): ?>
				<?php echo('<div class="card">') ?>
				<?= $this->Html->image($product->pid.".jpg", ['class' => 'card-img-top', 'url' => ['controller' => 'Products', 'action' => 'view', $product->pid]]) ?>
				<?php echo('<div class="card-body">') ?>
				<?= $this->Html->link($product->name, ['controller' => 'Products', 'action' => 'view', $product->pid], ['class' => 'card-title']) ?>
				<?php echo('<p class="card-text">$'.$product->price.'</p>') ?>
				<?php echo('<a href="#" class="btn btn-outline-dark">Add to Cart</a>') ?>
				<?php echo('</div>') ?>
				<?php echo('</div>') ?>
			<?php endforeach; ?>
		</div>
    
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->first('<< ' . __('first')) ?>
				<?= $this->Paginator->prev('< ' . __('previous')) ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next(__('next') . ' >') ?>
				<?= $this->Paginator->last(__('last') . ' >>') ?>
			</ul>
			<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
		</div>
	
	</div>
</div>