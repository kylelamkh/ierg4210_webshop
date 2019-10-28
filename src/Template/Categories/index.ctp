<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */	
$in_session = "0";
?>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
			<div class="col-sm">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">Home</li>
					</ol>
				</nav>
			</div>
			<div class="col-sm">
			  <div class="text-right">
				<div class="dropdown">
				  <button class="dropbtn btn-light">Shopping Cart</button>
				  <div class="dropdown-content">
					<div class="container-fluid">
						<div class="container-fluid" id="cartlist">
						
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
			<?php foreach ($products as $product): ?>
				<?php echo('<div class="card">') ?>
				<?= $this->Html->image($product->pid.".jpg", ['class' => 'card-img-top', 'url' => ['controller' => 'Products', 'action' => 'view', $product->pid]]) ?>
				<?php echo('<div class="card-body">') ?>
				<?= $this->Html->link($product->name, ['controller' => 'Products', 'action' => 'view', $product->pid], ['class' => 'card-title']) ?>
				<?php echo('<p class="card-text">$'.$product->price.'</p>') ?>
				<input type="button" id="add_<?php echo $product->pid; ?>" value="Add to cart" class="btn btn-outline-dark btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product->pid; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
				<input type="button" id="added_<?php echo $product->pid; ?>" value="Added" class="btn btn-outline-dark btnAdded" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
				<?php echo('</div>') ?>
				<?php echo('</div>') ?>
				<?php
					$in_session = "0";
					if(!empty($_SESSION["cart_item"])) {
						$session_code_array = array_keys($_SESSION["cart_item"]);
						if(in_array($product->pid,$session_code_array)) {
							$in_session = "1";
						}
					}
				?>
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