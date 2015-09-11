<div class="posts form">
  <h2><?php echo "Edit Post"; ?></h2>
  <?php echo $this->Form->create("Post"); ?>
	<fieldset>
	  <?php	echo $this->Form->input("Post.id", array("label" => array("for" => false))); ?>
    <?php echo $this->Form->input("Post.user_id", array("type" => "select", "options" => $userList, "label" => array("for" => false))); ?>
    <div id="itemArea">
      <?php foreach ($post["Order"] as $index => $order): ?>
        <div class="itemForm">
		      <?php echo $this->Form->input("Order.$index.item_id", array("type" => "select", "options" => $itemList, "label" => array("for" => false))); ?>
		      <?php echo $this->Form->input("Order.$index.count", array("label" => array("for" => false))); ?>
        </div>
      <?php endforeach; ?>
    </div>
    <input id="addFormBtn" type="button" value="Add" />
	</fieldset>
  <?php echo $this->Form->end(__("Submit")); ?>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__("List Posts"), array("action" => "index")); ?></li>
    <li><?php echo $this->Form->postLink(__("Delete"), array("action" => "delete", $this->Form->value("Post.id")),
                                         array("confirm" => __("Are you sure you want to delete # %s?", $this->Form->value("Post.id")))); ?></li>
	</ul>
</div>

<?php echo $this->Html->script("addForm.js", array("inline" => true)); ?>
<?php echo $this->Html->script("selectEffect.js", array("inline" => true)); ?>
