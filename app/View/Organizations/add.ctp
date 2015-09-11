<div class="organizations form">
  <h2><?php echo "新規グループ"; ?></h2>
  <?php echo $this->Form->create("Organization"); ?>
	<fieldset>
	<?php
		echo $this->Form->input("name", array("label" => array("for" => false)));
	?>
	</fieldset>
<?php echo $this->Form->end(__("Submit")); ?>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("ホーム"), array("controller" => "posts", "action" => "index")); ?></li>
	</ul>
</div>
