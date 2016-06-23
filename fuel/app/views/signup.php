
<!doctype html>
<html lang="ja">
  <head>
    <?php echo Asset::css('signup.css'); ?>
  </head>
  <body>

    <div class="signup_form">
          <?php if (isset($error)): ?>
          <p><?php echo $error ?></p>
          <?php endif ?>
      <form method="POST" action="/signup">
        <div class="screen_name">
          <input type="text" name="screen_name" value="<?php echo $user->screen_name ?>" placeholder="screen_name">
        </div>

        <div class="name">
          <input type="text" name="name" value="<?php echo $user->name ?>" placeholder="name">
        </div>

        <div class="password">
          <input type="password" name="password" value="<?php echo $user->password ?>" placeholder="password">
        </div>

        <div class="submit">
          <input type="submit" value="登録する">
        </div>
      </form>
    </div>
  </body>
</html>
