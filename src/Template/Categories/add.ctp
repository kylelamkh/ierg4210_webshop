<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<style>
	button{
		margin-left: 15px;
	}
	input{
		text-align: left;
	}
</style>

<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
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
    </fieldset>
	<br>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
