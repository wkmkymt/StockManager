<div class="posts view">
  <h2><?php echo "Post"; ?></h2>
	<dl>
    <dt><?php echo __("Post Id"); ?></dt>
		<dd><?php echo h($post["Post"]["id"]); ?>&nbsp;</dd>
		<dt><?php echo __("Created"); ?></dt>
		<dd><?php echo h($this->Date->dateFormat($post["Post"]["created"])); ?>&nbsp;</dd>
		<dt><?php echo __("Modified"); ?></dt>
		<dd><?php echo h($this->Date->dateFormat($post["Post"]["modified"])); ?>&nbsp;</dd>
  </dl>

  <dl>
    <dt><?php echo __("User Id"); ?></dt>
		<dd><?php echo h($post["User"]["id"]); ?>&nbsp;</dd>
    <dt><?php echo __("User Name"); ?></dt>
		<dd><?php echo h($post["User"]["name"]); ?>&nbsp;</dd>
  </dl>

  <?php foreach ($post["Order"] as $index => $order): ?>
  <dl>
		<dt><?php echo __("Item [%d] Id", $index + 1); ?></dt>
		<dd><?php echo h($order["Item"]["id"]); ?>&nbsp;</dd>
    <dt><?php echo __("Item [%d] Name", $index + 1); ?></dt>
		<dd><?php echo h($order["Item"]["name"]); ?>&nbsp;</dd>
		<dt><?php echo __("Item [%d] Value", $index + 1); ?></dt>
		<dd><?php echo h($order["Item"]["value"]); ?>&nbsp;</dd>
    <dt><?php echo __("Item [%d] Count", $index + 1); ?></dt>
		<dd><?php echo h($order["count"]); ?>&nbsp;</dd>
	</dl>
  <?php endforeach; ?>
</div>

<div class="actions">
	<h3><?php echo "Actions"; ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("ホーム"), array("controller" => "posts", "action" => "index")); ?></li>
    <li><?php echo $this->Html->link(__("List Posts"), array("action" => "index")); ?> </li>
    <li><?php echo $this->Html->link(__("New Post"), array("action" => "add")); ?> </li>
		<li><?php echo $this->Html->link(__("Edit Post"), array("action" => "edit", $post["Post"]["id"])); ?> </li>
		<li><?php echo $this->Form->postLink(__("Delete Post"), array("action" => "delete", $post["Post"]["id"]),
                                         array("confirm" => __("Are you sure you want to delete # %s?", $post["Post"]["id"]))); ?> </li>
	</ul>
</div>
