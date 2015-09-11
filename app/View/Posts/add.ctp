<div class="posts form">
  <h2><?php echo "新規投稿"; ?></h2>
  <?php echo $this->Form->create("Post"); ?>
	<fieldset>
    <div id="itemArea">
      <div class="itemForm">
        <?php echo $this->Form->input("Order.0.item_id", array("type" => "select", "options" => $itemList, "label" => array("for" => false))); ?>
        <?php echo $this->Form->input("Order.0.count", array("label" => array("for" => false))); ?>
      </div>
    </div>
    <input id="addFormBtn" class="subBtn" type="button" value="追加" />
	</fieldset>
  <?php echo $this->Form->end(__("Submit")); ?>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("ホーム"), array("controller" => "posts", "action" => "index")); ?></li>
    <li><?php echo $this->Html->link(__("商品リスト"), array("controller" => "items", "action" => "index")); ?></li>
	</ul>
</div>

<?php echo $this->Html->script("addForm.js", array("inline" => true)); ?>
<?php echo $this->Html->script("selectEffect.js", array("inline" => true)); ?>
