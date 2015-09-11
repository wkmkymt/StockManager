<div class="posts form">
  <?php echo $this->Form->create("Post"); ?>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__("List Posts"), array("action" => "index")); ?></li>
	</ul>
</div>
