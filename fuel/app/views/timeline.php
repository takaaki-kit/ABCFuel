<?php echo Asset::css("timeline.css"); ?>

<!doctype html>
<html lang="ja">
  <head>
  </head>
  <body>
    <div class="all-item">
      <div class="header">
        <div class="home">
          <a href="/"><i><span>ホーム</span></i></a>
        </div>
        <div class="mentions">
          <a href=""><i><span>メンション</span></i></a>
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
      </div>

      <div class="sub-bar">
        <div class="sub-bar-head">
          <div class="image">
              <img src="<: $user_image :>">
          </div>
          <div class=username_id>
            <div class="name">
              <span><: $name :></span>
            </div>
            <div class="screen_name">
              <span>@<: $screen_name :></span>
            </div>
          </div>
        </div>
        <div class="profile">
          <span><: $profile :></span>
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

        : for $messages -> $content{
        <div class="content" id="post_id_<:$content.get('id'):>">
          <div class="image">
              <img src="<: $content.get('uimage') :>">
          </div>
          <div class="content-post">
            <div class="content-post-header">
              <div class="name">
                <: $content.get('name') :>
              </div>
              <div class="screen_name">
                @<: $content.get('screen_name') :>
              </div>
              <div class="post-date">
                <span><: $content.get('created_at') :></span>
              </div>
            </div>
            <div class="text">
              <p><:  $content.get('text') :></p>
            </div>
            :if $content.get('image') != nil{
            <div class="picture">
              <img src="<: $content.get('image') :>">
            </div>
            :}
            :if $content.get('user_id') ==  $login_id {
            <div class="edit">
              <a onclick="edit_text(this)" id="<: $content.get('id') :>" data-remodal-target="edit_modal"><i class="fa fa-pencil"></i>編集</a>
            </div>
            <div class="delete">
              <a onclick="delete_text(this)" id="<: $content.get('id') :>" data-remodal-target="delete_modal"><i class="fa fa-trash"></i>削除</a>
            </div>
            :}
          </div>
        </div>
        :  }
      </div>
    </div>

    <: block edit_modal -> { } :>
    <: block delete_modal -> { } :>
  </body>
</html>
