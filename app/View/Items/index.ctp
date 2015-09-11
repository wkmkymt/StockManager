<?php echo $this->Form->create(false, array("action" => "delete")); ?>
<div class="items index">
	<h2><?php echo "商品リスト"; ?></h2>
	<table cellpadding="0" cellspacing="0">
	  <thead>
	    <tr>
        <th><?php echo $this->Form->input("checkAll", array("type" => "checkbox", "label" => "")); ?></th>
        <th><?php echo $this->Paginator->sort("created"); ?></th>
			  <th><?php echo $this->Paginator->sort("modified"); ?></th>
			  <th><?php echo $this->Paginator->sort("name"); ?></th>
			  <th><?php echo $this->Paginator->sort("value"); ?></th>
			  <th class="actions"><?php echo __("Actions"); ?></th>
	    </tr>
	  </thead>
	  <tbody>
      <?php $count = 0; ?>
      <?php foreach ($items as $count => $item): ?>
        <?php if($count % 2): ?>
          <?php echo '<tr class="evenData">'; ?>
        <?php else: ?>
          <?php echo '<tr>'; ?>
        <?php endif; ?>
          <td><?php echo $this->Form->input("deleteFlag.", array("type" => "checkbox", "value" => $item["Item"]["id"],
                                                                 "class" => "deleteFlag", "id" => "deleteFlag".$count,
                                                                 "hiddenField" => false, "label" => "")); ?></td>
          <td><?php echo h($this->Date->dateFormat($item["Item"]["created"])); ?>&nbsp;</td>
          <td><?php echo h($this->Date->dateFormat($item["Item"]["modified"])); ?>&nbsp;</td>
		      <td><?php echo h($item["Item"]["name"]); ?>&nbsp;</td>
		      <td><?php echo h($item["Item"]["value"]); ?>&nbsp;</td>
		      <td class="actions">
			      <?php echo $this->Html->link(__("View"), array("action" => "view", $item["Item"]["id"])); ?>
			      <?php echo $this->Html->link(__("Edit"), array("action" => "edit", $item["Item"]["id"])); ?>
			      <?php echo $this->Form->postLink(__("Delete"), array("action" => "delete", $item["Item"]["id"]),
                                             array("confirm" => __("Are you sure you want to delete # %s?", $item["Item"]["id"]))); ?>
		      </td>
	      </tr>
      <?php endforeach; ?>
	  </tbody>
	</table>

	<div class="paging">
	  <?php
		echo $this->Paginator->prev("< " . __("previous"), array(), null, array("class" => "prev disabled"));
		echo $this->Paginator->numbers(array("separator" => ""));
		echo $this->Paginator->next(__("next") . " >", array(), null, array("class" => "next disabled"));
	  ?>
    <span class="pageData">
      <?php echo $this->Paginator->counter(array(
        "format" => __("[ Page: {:page} / {:pages} ]  [ Data: {:current} / {:count} ]")
      )); ?>
    </span>
	</div>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("ホーム"), array("controller" => "posts", "action" => "index")); ?></li>
		<li><?php echo $this->Html->link(__("New Item"), array("action" => "add")); ?></li>
    <li id="deleteNav"><a href="">選択した商品を削除する</a></li>
	</ul>
</div>
</form>

<?php echo $this->Html->script("allCheck.js", array("inline" => true)); ?>
