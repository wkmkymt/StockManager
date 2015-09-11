<div class="items form">
  <h2><?php echo "商品編集"; ?></h2>
  <?php echo $this->Form->create("Item"); ?>
	<fieldset>
	  <?php
		echo $this->Form->input("name", array("label" => array("for" => false)));
		echo $this->Form->input("value", array("label" => array("for" => false)));
	  ?>
	</fieldset>
  <?php echo $this->Form->end(__("Submit")); ?>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("List Items"), array("action" => "index")); ?></li>
		<li><?php echo $this->Form->postLink(__("Delete"), array("action" => "delete", $this->Form->value("Item.id")),
                                         array("confirm" => __("本当に削除しますか - %s?", $item["Item"]["name"]))); ?></li>
	</ul>
</div>

<?php echo $this->Html->script("selectEffect.js", array("inline" => true)); ?>
