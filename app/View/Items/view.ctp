<div class="items view">
  <h2><?php echo "商品"; ?></h2>
  <dl>
    <dt><?php echo __("Id"); ?></dt>
		<dd><?php echo h($item["Item"]["id"]); ?>&nbsp;</dd>
		<dt><?php echo __("Created"); ?></dt>
		<dd><?php echo h($this->Date->dateFormat($item["Item"]["created"])); ?>&nbsp;</dd>
		<dt><?php echo __("Modified"); ?></dt>
		<dd><?php echo h($this->Date->dateFormat($item["Item"]["modified"])); ?>&nbsp;</dd>
		<dt><?php echo __("Name"); ?></dt>
		<dd><?php echo h($item["Item"]["name"]); ?>&nbsp;</dd>
		<dt><?php echo __("Value"); ?></dt>
		<dd><?php echo h($item["Item"]["value"]); ?>&nbsp;</dd>
	</dl>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("ホーム"), array("controller" => "posts", "action" => "index")); ?></li>
		<li><?php echo $this->Html->link(__("List Items"), array("action" => "index")); ?> </li>
		<li><?php echo $this->Html->link(__("New Item"), array("action" => "add")); ?> </li>
		<li><?php echo $this->Html->link(__("Edit Item"), array("action" => "edit", $item["Item"]["id"])); ?> </li>
		<li><?php echo $this->Form->postLink(__("商品削除"), array("action" => "delete", $item["Item"]["id"]),
                                         array("confirm" => __("本当に削除しますか - %s?", $item["Item"]["name"]))); ?></li>
	</ul>
</div>
