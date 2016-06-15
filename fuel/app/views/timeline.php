<?php echo Asset::css("timeline.css"); ?>

<!doctype html>
<html lang="ja">
  <head>
  </head>
  <body>
  <p><?php echo $aaa; ?></p>
  <p><?php echo $type; ?></p>
    <div class="all-item">
      <div class="header">
        <div class="home">
          <a href="/timeline"><i><span>ホーム</span></i></a>
        </div>
        <div class="mentions">
          <a href="/mentions"><i><span>メンション</span></i></a>
        </div>
        <div class="all-post">
          <a href="/discover"><i><span>すべての投稿</span></i></a>
        </div>
        <div class="setting" onclick="obj=document.getElementById('dropmenu').style; obj.display=(obj.display=='none')?'block':'none';">
          <a style="cursor:pointer;"><i></i></a>
        <div id="dropmenu" style="display:none;clear:both;">
          <div class="edit_profile"><a href="/profile">プロフィール編集</a></div>
          <div class="logout"><a href="/logout">ログアウト</a></div>
        </div>
        </div>
        <div class="search">
          <input type="text" value="検索"><i class="fa fa-search"></i>
        </div>
        <div class="logout">
          <a href="/logout"><i><span>ログアウト</span></i></a>
        </div>
      </div>

      <div class="sub-bar">
        <div class="sub-bar-head">
          <div class="image">
              <img src="<: $user_image :>">
          </div>
          <div class=username_id>
            <div class="name">
            <span><?php echo $user->name ?></span>
            </div>
            <div class="screen_name">
            <span>@<?php echo $user->screen_name ?></span>
            </div>
          </div>
        </div>
        <div class="profile">
        <span><?php echo $user->text ?></span>
        </div>
        <form action="/message/new" method="POST" enctype="multipart/form-data">
          <div class="post-text">
            <input  name="post_text">
          </div>
          <div class="post-picture">
            <label for="file_button"><i class="fa fa-camera"></i></label>
            <input type="file" style="display:none;" id="file_button" name="image">
          </div>
          <div class="post-confirm">
            <input type="submit" value="投稿する">
          </div>
        </form>
      </div>

      <div class="timeline">

        <div class="content" id="post_id_<:$content.get('id'):>">
<?php foreach($messages as $m)
{
?>
          <div class="image">
          <img src="iamge url">
          </div>
          <div class="content-post">
            <div class="content-post-header">
              <div class="name">
                <?php echo $user->name ?>
              </div>
              <div class="screen_name">
                @<?php echo $user->screen_name ?>
              </div>
              <div class="post-date">
              <span><?php echo $m->created_at ?></span>
              </div>
            </div>
            <div class="text">
              <span><?php echo $m->text ?></span>
            </div>
            <div class="picture">
              <img src="<: $content.get('image') :>">
            </div>
            <div class="edit">
              <a onclick="edit_text(this)" id="<: $content.get('id') :>" data-remodal-target="edit_modal"><i class="fa fa-pencil"></i>編集</a>
            </div>
            <div class="delete">
              <a onclick="delete_text(this)" id="<: $content.get('id') :>" data-remodal-target="delete_modal"><i class="fa fa-trash"></i>削除</a>
            </div>
          </div>
        </div>
<?php } ?>
      </div>
    </div>

  </body>
</html>
