<div class="organizations form">
  <h2><?php echo "Edit User"; ?></h2>
  <?php echo $this->Form->create("Organization"); ?>
	<fieldset>
	  <?php
		echo $this->Form->input("id", array("label" => array("for" => false)));
		echo $this->Form->input("name", array("label" => array("for" => false)));
	  ?>
	</fieldset>
  <?php echo $this->Form->end(__("Submit")); ?>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__("List Organizations"), array("action" => "index")); ?></li>
		<li><?php echo $this->Form->postLink(__("Delete"), array("action" => "delete", $this->Form->value("Organization.id")), array("confirm" => __("Are you sure you want to delete # %s?", $this->Form->value("Organization.id")))); ?></li>
	</ul>
</div>

<?php echo $this->Html->script("selectEffect.js", array("inline" => true)); ?>
