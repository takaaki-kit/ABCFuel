<?php echo Asset::css("signup.css"); ?>

<!doctype html>
<html lang="ja">
  <head>
  </head>
  <body>
    <p>fieldset</p>
    

    <div class="signup_form">
      <form method="POST" action="/appbootcamp/signup">
        <div class="screen_name">
          <input type="text" name="screen_name" value="<?php echo $screen_name ?>">
        </div>

        <div class="name">
          <input type="text" name="name" value="<?php echo $name ?>">
        </div>

        <div class="password">
          <input type="text" name="password" value="<?php echo $password ?>">
        </div>

        <div class="submit">
          <input type="submit" value="登録する">
        </div>
      </form>
    </div>
  </body>
</html>
