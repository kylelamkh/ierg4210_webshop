<style>
	.col-sm{
		padding-left: 150px;
	}
</style>

<div class="container-fluid">
	<br><br>
	<div class="row">
		<div class="col-sm">
			<h3>Modify Categories</h3>
			<ul>
				<li><?= $this->Html->link('Add New Category', ['controller' => 'Categories', 'action' => 'add'])?></li>
				<li><?= $this->Html->link('Modify Categories', ['controller' => 'Categories', 'action' => 'list'])?></li>
			</ul>
		</div>
		<div class="col-sm">
			<h3>Modify Products</h3>
			<ul>
				<li><?= $this->Html->link('Add New Product', ['controller' => 'Products', 'action' => 'add'])?></li>
				<li><?= $this->Html->link('Modify Products', ['controller' => 'Products', 'action' => 'list'])?></li>
			</ul>
		</div>
	</div>
</div>