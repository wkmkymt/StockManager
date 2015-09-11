<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Mt.K" />

    <!-- ===== Style Sheet ===== -->
    <?php echo $this->Html->css("style"); ?>

    <!-- ===== Script ===== -->
    <?php echo $this->Html->script("lib/jquery.min.js", array("inline" => true)); ?>


    <title><?php echo $this->fetch("title"); ?> - Stock Manager</title>
  </head>

  <body>
    <header class="site-header site-section">
      <h1><?php echo $this->Html->link("Stock Manager", array("controller" => "posts", "action" => "index")) ?></h1>

      <div class="top-nav">
        <?php if (isset($session)): ?>
          <p>ユーザ名: <?php echo $session["name"]; ?></p>
        <?php else: ?>
          <p>ログインされていません</p>
        <?php endif; ?>

        <ul>
          <?php if (isset($session)): ?>
          <li><?php echo $this->Html->link("新規投稿", array("controller" => "posts", "action" => "add")); ?></li>
          <li><?php echo $this->Html->link("ログアウト", array("controller" => "users", "action" => "logout")); ?></li>
          <li>
            <a>管理画面</a>
            <ul>
              <?php if ($session["role"] == "master"): ?>
              <li><?php echo $this->Html->link("ユーザ管理", array("controller" => "users", "action" => "index")) ?></li>
              <li><?php echo $this->Html->link("投稿管理", array("controller" => "posts", "action" => "index")) ?></li>
              <li><?php echo $this->Html->link("商品管理", array("controller" => "items", "action" => "index")) ?></li>
              <li><?php echo $this->Html->link("グループ管理", array("controller" => "organizations", "action" => "index")) ?></li>
              <?php else: ?>
              <li><?php echo $this->Html->link("ユーザ情報", array("controller" => "users", "action" => "view", $session["id"])) ?></li>
              <li><?php echo $this->Html->link("投稿リスト", array("controller" => "posts", "action" => "index")) ?></li>
              <li><?php echo $this->Html->link("商品リスト", array("controller" => "items", "action" => "index")) ?></li>
              <?php if ($session["role"] == "admin"): ?>
              <li><?php echo $this->Html->link("グループ情報", array("controller" => "organizations", "action" => "index")) ?></li>
              <?php endif; ?>
              <?php endif; ?>
            </ul>
          </li>
          <?php else: ?>
            <li><?php echo $this->Html->link("ログイン", array("controller" => "users", "action" => "login")) ?></li>
          <?php endif; ?>
        </ul>
      </div>
    </header>

    <div class="container">
      <div class="content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch("content"); ?>
      </div>
    </div>

    <footer class="site-footer site-section">
      <p><small>&copy; 2015 <a href="">Mt.K - Stock Manager</a></small></p>
    </footer>
  </body>
</html>
