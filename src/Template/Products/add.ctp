<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<style>
	button{
		margin-left: 15px;
	}
	input{
		text-align: left;
	}
	.custom-file{
		margin-left: 15px;
		margin-top : 15px
	}
</style>

<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
		<div class="row">
			<div class="input text required">
				<div class="col">
					<label for="name">Name</label>
				</div>
				<div class="col">
					<input type="text" name="name" required="required" maxlength="255" id="name"/>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="input number required">
				<div class="col">
					<label for="cid">Category</label>
				</div>
				<div class="col">
					<select name="cid" required="required" id="cid" class="custom-select">
						<option value="1">Men</option>
						<option value="1">Women</option>
						<option value="1">Accessories</option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="input number required">
				<div class="col">
					<label for="price">Price</label>
				</div>
				<div class="col">
					<input type="number" name="price" required="required" id="price"/>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="input text required">
				<div class="col">
					<label for="description">Description</label>
				</div>
				<div class="col">
					<input type="text" name="description" required="required" maxlength="255" id="description"/>
				</div>
			</div>
		</div>
		
		<div class="custom-file">
			<input type="file" class="custom-file-input" name="photo" id="photo">
			<label class="custom-file-label" for="photo">Choose file</label>
		</div>
		
    </fieldset>
	<br>
	<?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


