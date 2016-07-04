
<!doctype html>
<html lang="ja">
  <head>
    <?php echo Asset::css('signup.css'); ?>
  </head>
  <body>

    <div class="signup_form">
      <form method="POST" action="/signup">
          <?php if (isset($error['screen_name'])): ?>
          <p><?php echo $error['screen_name'] ?></p>
          <?php endif ?>
        <div class="screen_name">
          <input type="text" name="screen_name" value="<?php echo $post_params->screen_name ?>" placeholder="screen_name">
        </div>
          <?php if (isset($error['name'])): ?>
          <p><?php echo $error['name'] ?></p>
          <?php endif ?>

        <div class="name">
          <input type="text" name="name" value="<?php echo $post_params->name ?>" placeholder="name">
        </div>

          <?php if (isset($error['password'])): ?>
          <p><?php echo $error['password'] ?></p>
          <?php endif ?>
        <div class="password">
          <input type="password" name="password" value="<?php echo $post_params->password ?>" placeholder="password">
        </div>

        <div class="submit">
          <input type="submit" value="登録する">
        </div>
      </form>
    </div>
  </body>
</html>
