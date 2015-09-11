<div class="organizations index">
	<h2><?php echo "グループ"; ?></h2>
	<table cellpadding="0" cellspacing="0">
	  <thead>
	    <tr>
        <th><?php echo $this->Form->input("checkAll", array("type" => "checkbox", "label" => "")); ?></th>
        <th><?php echo $this->Paginator->sort("created"); ?></th>
			  <th><?php echo $this->Paginator->sort("modified"); ?></th>
			  <th><?php echo $this->Paginator->sort("グループ名"); ?></th>
        <th><?php echo $this->Paginator->sort("管理者"); ?></th>
			  <th class="actions"><?php echo __("Actions"); ?></th>
	    </tr>
	  </thead>
	  <tbody>
      <?php $count = 0; ?>
      <?php foreach ($organizations as $count => $organization): ?>
        <?php if($count % 2): ?>
          <?php echo '<tr class="evenData">'; ?>
        <?php else: ?>
          <?php echo '<tr>'; ?>
        <?php endif; ?>
          <td><?php echo $this->Form->input("deleteFlag.", array("type" => "checkbox", "value" => $organization["Organization"]["id"],
                                                                 "class" => "deleteFlag", "id" => "deleteFlag".$count,
                                                                 "hiddenField" => false, "label" => "")); ?></td>
		      <td><?php echo h($organization["Organization"]["created"]); ?>&nbsp;</td>
		      <td><?php echo h($organization["Organization"]["modified"]); ?>&nbsp;</td>
		      <td><?php echo h($organization["Organization"]["name"]); ?>&nbsp;</td>
          <td><?php echo h($organization["User"]["name"]); ?>&nbsp;</td>
		      <td class="actions">
			      <?php echo $this->Html->link(__("View"), array("action" => "view", $organization["Organization"]["id"])); ?>
			      <?php echo $this->Html->link(__("Edit"), array("action" => "edit", $organization["Organization"]["id"])); ?>
			      <?php echo $this->Form->postLink(__("Delete"),
                                             array("action" => "delete", $organization["Organization"]["id"]),
                                             array("confirm" => __("Are you sure you want to delete # %s?", $organization["Organization"]["id"]))); ?>
		      </td>
	      </tr>
      <?php endforeach; ?>
	  </tbody>
	</table>
	<p>

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
		<li><?php echo $this->Html->link(__("新規グループ"), array("action" => "add")); ?></li>
    <li id="deleteNav"><a href="">選択したグループを削除する</a></li>
	</ul>
</div>

<?php echo $this->Html->script("allCheck.js", array("inline" => true)); ?>
