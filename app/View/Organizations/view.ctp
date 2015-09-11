<div class="organizations view">
  <h2><?php echo "グループ"; ?></h2>
	<dl>
		<dt><?php echo __("Id"); ?></dt>
		<dd>
			<?php echo h($organization["Organization"]["id"]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __("Created"); ?></dt>
		<dd>
			<?php echo h($organization["Organization"]["created"]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __("Modified"); ?></dt>
		<dd>
			<?php echo h($organization["Organization"]["modified"]); ?>
			&nbsp;
		</dd>
    <dt><?php echo __("Name"); ?></dt>
		<dd>
			<?php echo h($organization["Organization"]["name"]); ?>
			&nbsp;
		</dd>
	</dl>

  <section>
    <h3><?php echo "メンバー リスト" ?></h3>
    <dl>
      <?php foreach($organization["OrgGroup"] as $user ): ?>
        <?php if($user["User"]["id"] === $organization["Organization"]["user_id"]): ?>
          <dt><?php echo "管理者"; ?></dt>
        <?php else: ?>
          <dt><?php echo "名前" ?></dt>
        <?php endif; ?>
      <dd><?php echo h($user["User"]["name"]); ?></dd>
      <?php endforeach; ?>
    </dl>
</div>
<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("ホーム"), array("controller" => "posts", "action" => "index")); ?></li>
		<li><?php echo $this->Html->link(__("グループ編集"), array("action" => "edit", $organization["Organization"]["id"])); ?> </li>
		<li><?php echo $this->Form->postLink(__("グループ削除"), array("action" => "delete", $organization["Organization"]["id"]), array("confirm" => __("Are you sure you want to delete # %s?", $organization["Organization"]["id"]))); ?> </li>
	</ul>
</div>
