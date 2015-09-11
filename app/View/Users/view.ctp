<div class="users view">
  <h2><?php echo "ユーザ"; ?></h2>
	<dl>
    <dt><?php echo __("Id"); ?></dt>
		<dd><?php echo h($user["User"]["id"]); ?>&nbsp;</dd>
		<dt><?php echo __("Created"); ?></dt>
		<dd><?php echo h($this->Date->dateFormat($user["User"]["created"])); ?>&nbsp;</dd>
		<dt><?php echo __("Modified"); ?></dt>
    <dd><?php echo h($this->Date->dateFormat($user["User"]["modified"])); ?>&nbsp;</dd>
		<dt><?php echo __("Name"); ?></dt>
		<dd><?php echo h($user["User"]["name"]); ?>&nbsp;</dd>
		<dt><?php echo __("権限"); ?></dt>
		<dd><?php echo h($user["User"]["role"]); ?>&nbsp;</dd>
    <?php if($user["OrgGroup"]): ?>
    <dt><?php echo __("グループ"); ?></dt>
		<dd><?php echo h($user["OrgGroup"][0]["Organization"]["name"]); ?>&nbsp;</dd>
    <?php endif; ?>
	</dl>
</div>

<div class="actions">
	<h3><?php echo __("Actions"); ?></h3>
	<ul>
    <li><?php echo $this->Html->link(__("ホーム"), array("controller" => "posts", "action" => "index")); ?></li>
    <li><?php echo $this->Html->link(__("グループ情報"), array("controller" => "organizations", "action" => "view", $user["OrgGroup"][0]["organization_id"])); ?> </li>
		<li><?php echo $this->Html->link(__("ユーザ情報の変更"), array("action" => "edit", $user["User"]["id"])); ?> </li>
		<li><?php echo $this->Form->postLink(__("ユーザの削除"), array("action" => "delete", $user["User"]["id"]),
                                         array("confirm" => __("本当に削除しますか - %s?", $session["name"]))); ?></li>
	</ul>
</div>
