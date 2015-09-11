<div class="users form">
  <h2><?php echo "Add User"; ?></h2>
  <?php echo $this->Form->create("User"); ?>
	<fieldset>
	  <?php
		echo $this->Form->input("name", array("label" => array("for" => false)));
		echo $this->Form->input("password", array("label" => array("for" => false)));
    ?>
    <div class="input password required">
      <?php
      echo $this->Form->label(false, "パスワード(再入力)", array("for" => false));
      echo $this->Form->password("repassword");
      ?>
    </div>
	</fieldset>
  <?php echo $this->Form->end(__("Submit")); ?>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__("List Users"), array("action" => "index")); ?></li>
	</ul>
</div>

<?php echo $this->Html->script("selectEffect.js", array("inline" => true)); ?>
