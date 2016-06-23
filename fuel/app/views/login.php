<!doctype html>
<html lang="ja">
  <head>
      <title>ログインページ</title>
    <?php echo Asset::css("login.css"); ?>
  </head>
    <body>
        <div class="login_form">
                <form method="POST" action="/login">
          <?php if (isset($error)): ?>
          <p><?php echo $error ?></p>
          <?php endif ?>
                      <div class="screen_name">
                            <p>ログインID</p>
                            <input type="text" name="screen_name" value="<?php echo $postParams->screen_name ?>" placeholder="screen_name">
                      </div>
                     <div class="password">
                          <p>パスワード</p>
                          <input type="password" name="password" value="<?php echo $postParams->name ?>" placeholder="password">
                                    </div>

        <div class="submit">
                  <input type="submit" value="ログイン">
                          </div>
                                </form>
                                    </div>
                                      </body>
 </html>
