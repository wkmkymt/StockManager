<div class="users form login">
  <h2><?php echo "Login"; ?></h2>
  <?php echo $this->Form->create("User"); ?>
  <fieldset>
    <?php
    echo $this->Form->input("name");
    echo $this->Form->input("password");
    ?>
  </fieldset>
  <?php echo $this->Html->link("Create Account", array("action" => "add"), array("class" => "subBtn")); ?>
  <?php echo $this->Form->end(__("Login")); ?>
</div>
