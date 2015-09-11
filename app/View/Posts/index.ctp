<div class="posts index">
	<h2><?php echo "投稿リスト"; ?></h2>
	<table cellpadding="0" cellspacing="0">
	  <thead>
	    <tr>
        <th><?php echo $this->Form->input("checkAll", array("type" => "checkbox", "label" => "")); ?></th>
        <th><?php echo $this->Paginator->sort("created"); ?></th>
        <th><?php echo $this->Paginator->sort("modified"); ?></th>
			  <th><?php echo $this->Paginator->sort("item_id"); ?></th>
        <th><?php echo $this->Paginator->sort("value"); ?></th>
			  <th><?php echo $this->Paginator->sort("count"); ?></th>
        <th><?php echo $this->Paginator->sort("SubTotal"); ?></th>
			  <th class="actions"><?php echo __("Actions"); ?></th>
	    </tr>
	  </thead>

	  <tbody>
      <?php $total = 0; ?>
      <?php $count = 0; ?>
	    <?php foreach ($posts as $post): ?>
        <?php foreach ($post["Order"] as $index => $order): ?>
          <?php if($index == 0): ?>
            <?php $count++; ?>
          <?php endif; ?>
          <?php if($count % 2): ?>
            <?php echo '<tr class="evenData">'; ?>
          <?php else: ?>
            <?php echo '<tr>'; ?>
          <?php endif; ?>
            <?php if ($index == 0): ?>
              <td><?php echo $this->Form->input("deleteFlag.", array("type" => "checkbox", "value" => $post["Post"]["id"],
                                                                     "class" => "deleteFlag", "id" => "deleteFlag".$count,
                                                                     "hiddenField" => false, "label" => "")); ?></td>
              <td><?php echo h($this->Date->dateFormat($post["Post"]["created"])); ?>&nbsp;</td>
              <td><?php echo h($this->Date->dateFormat($post["Post"]["modified"])); ?>&nbsp;</td>
            <?php else: ?>
              <td></td>
              <td></td>
              <td></td>
            <?php endif; ?>
		        <td><?php echo h($order["Item"]["name"]); ?>&nbsp;</td>
            <td><?php echo h($order["Item"]["value"]); ?>&nbsp;</td>
		        <td><?php echo h($order["count"]); ?>&nbsp;</td>
		        <td><?php echo h($order["Item"]["value"] * $order["count"]); ?>&nbsp;</td>
            <?php if ($index == 0): ?>
		          <td class="actions">
			          <?php echo $this->Html->link(__("View"), array("action" => "view", $post["Post"]["id"])); ?>
			          <?php echo $this->Html->link(__("Edit"), array("action" => "edit", $post["Post"]["id"])); ?>
			          <?php echo $this->Form->postLink(__("Delete"), array("action" => "delete", $post["Post"]["id"]),
                                                 array("confirm" => __("Are you sure you want to delete # %s?", $post["Post"]["id"]))); ?>
		          </td>
            <?php else: ?>
              <td></td>
            <?php endif; ?>
      </tr>
      <?php $total += $order["Item"]["value"] * $order["count"]; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
	  </tbody>
	</table>

  <table class="totalTable">
    <tr>
      <td class="thead">合計</td>
      <td><?php echo $total; ?></td>
    </tr>
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
		<li><?php echo $this->Html->link(__("New Post"), array("action" => "add")); ?></li>
    <li><?php echo $this->Html->link(__("新規商品"), array("controller" => "items", "action" => "add")); ?></li>
    <li><?php echo $this->Html->link(__("商品リスト"), array("controller" => "items", "action" => "index")); ?></li>
    <li><?php echo $this->Html->link(__("グループ作成"), array("controller" => "organizations", "action" => "add")); ?></li>
    <li id="deleteNav"><a href="">選択した投稿を削除する</a></li>
	</ul>
</div>

<?php echo $this->Html->script("allCheck.js", array("inline" => true)); ?>
