<div class="users index">
	<h2><?php echo "Users"; ?></h2>
	<table cellpadding="0" cellspacing="0">
	  <thead>
	    <tr>
        <th><?php echo $this->Form->input("checkAll", array("type" => "checkbox", "label" => "")); ?></th>
        <th><?php echo $this->Paginator->sort("created"); ?></th>
			  <th><?php echo $this->Paginator->sort("modified"); ?></th>
			  <th><?php echo $this->Paginator->sort("name"); ?></th>
			  <th><?php echo $this->Paginator->sort("role"); ?></th>
			  <th class="actions"><?php echo __("Actions"); ?></th>
	    </tr>
	  </thead>
	  <tbody>
      <?php $count = 0; ?>
	    <?php foreach ($users as $count => $user): ?>
        <?php if($count % 2): ?>
          <?php echo '<tr class="evenData">'; ?>
        <?php else: ?>
          <?php echo '<tr>'; ?>
        <?php endif; ?>
          <td><?php echo $this->Form->input("deleteFlag.", array("type" => "checkbox", "value" => $user["User"]["id"],
                                                                 "class" => "deleteFlag", "id" => "deleteFlag".$count,
                                                                 "hiddenField" => false, "label" => "")); ?></td>
          <td><?php echo h($this->Date->dateFormat($user["User"]["created"])); ?>&nbsp;</td>
          <td><?php echo h($this->Date->dateFormat($user["User"]["modified"])); ?>&nbsp;</td>
		      <td><?php echo h($user["User"]["name"]); ?>&nbsp;</td>
		      <td><?php echo h($user["User"]["role"]); ?>&nbsp;</td>
		      <td class="actions">
			      <?php echo $this->Html->link(__("View"), array("action" => "view", $user["User"]["id"])); ?>
			      <?php echo $this->Html->link(__("Edit"), array("action" => "edit", $user["User"]["id"])); ?>
			      <?php echo $this->Form->postLink(__("Delete"), array("action" => "delete", $user["User"]["id"]),
                                             array("confirm" => __("本当に削除しますか - %s?", $session["name"]))); ?></li>
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
		<li><?php echo $this->Html->link(__("New User"), array("action" => "add")); ?></li>
    <li><?php echo $this->Html->link(__("新規グループ"), array("controller" => "organizations", "action" => "add")); ?></li>
    <li id="deleteNav"><a href="">選択した投稿を削除する</a></li>
	</ul>
</div>

<?php echo $this->Html->script("allCheck.js", array("inline" => true)); ?>
