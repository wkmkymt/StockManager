<div class="users form">
  <h2><?php echo "ユーザ情報の編集"; ?></h2>
  <?php echo $this->Form->create("User"); ?>
	<fieldset>
	  <?php
		echo $this->Form->input("name", array("label" => array("for" => false)));
		echo $this->Form->input("pssword", array("label" => array("for" => false)));
	  ?>
	</fieldset>
  <?php echo $this->Form->end(__("Submit")); ?>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("ユーザ情報"), array("action" => "view", $session["id"])); ?></li>
		<li><?php echo $this->Form->postLink(__("Delete"), array("action" => "delete", $this->Form->value("User.id")),
                                         array("confirm" => __("本当に削除しますか？ - %s?", $session["name"]))); ?></li>
         	</ul>
</div>

<?php echo $this->Html->script("selectEffect.js", array("inline" => true)); ?>
