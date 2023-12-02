<?php
if (!empty($_POST)) {

  $top_banner = !empty(get_option('top_banner')) ? get_option('top_banner') : [];
  $edit_type = $_POST['edit_type'];

  switch ($edit_type) {
    case 'add':
      // バナー登録
      $banner = [];
      $banner['slider'] = !empty($_POST['slider']) ? $_POST['slider'] : '';
      $banner['slider_src'] = !empty($_POST['slider_src']) ? $_POST['slider_src'] : '';
      $banner['view'] = !empty($_POST['view']) ? $_POST['view'] : '0';
      $top_banner[] = $banner;
      update_option('top_banner', $top_banner);
      break;
    case 'edit':
      // バナー更新
      $update_banner = [];
      foreach ($top_banner as $key => $banner) {
        $temporary_banner['slider'] = $_POST['slider' . $key];
        $temporary_banner['slider_src'] = $_POST['slider_src' . $key];
        $temporary_banner['view'] = $_POST['view' . $key];
        $update_banner[$key] = $temporary_banner;
      }
      update_option('top_banner', $update_banner);
      break;
    case 'delete':
      // バナー削除
      $delete_key = $_POST['delete_key'];
      //削除実行
      unset($top_banner[$delete_key]);
      update_option('top_banner', $top_banner);
      break;
  }
}

$top_banner = get_option('top_banner');
?>

<style>
  #wp-form{
    margin-bottom: 50px;
  }

  .wrap h1.wp-heading-inline{
    margin-bottom: 20px;
  }

  .flex{
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 20px;
  }

  .flex-row{
    flex-direction: row;
    gap: 36px;
  }

  .flex.flex-row{
    width: 70%;
  }

  .flex.flex-row .flex{
    width: 25%;
  }

  .flex.flex-row .flex .input_box{
    width: 100%;
  }

  .flex.flex-row .flex .input_box input[type="text"]{
    width: 100%;
  }

  .flex p{
    margin: 0;
    font-size: 16px;
    text-align: left;
  }

  .edit_btn{
    color: #00ab25 !important;
    border-color: #0ec515 !important;
  }

  .add_table{
    width: 70%;
    border: solid 1px #666666;
    border-collapse: collapse;
    margin-bottom: 30px;
  }

  th{
    background: #778ca3;
    color: #fff;
    padding: 10px 16px;
    border-right: solid 1px #666666;
    border-bottom: solid 1px #666666;
  }

  td{
    border-right: solid 1px #666666;
    border-bottom: solid 1px #666666;
    background: #fff;
    padding: 12px 16px;
    text-align: center;
  }

  .mv_img{
    width: 32%;
  }
  
  .mv_view{
    width: 20%
  }

  .mv_delete{
    width: 10%;
  }

  td .add_img{
    max-height: 160px;
    margin-bottom: 10px;
  }

  td input{
    width: 100%
  }

  .mv_delete a{
    color: #fb0f0f !important; 
    border-color: #fb0f0f !important; 
    background: #ffffff !important;
  }

  img{
    max-height: 150px;
  }
</style>

<div class="wrap">
  <h1 class="wp-heading-inline">TOP MV スライダー画像</h1>

  <form method="POST" action="admin.php?page=top_slider" id="wp-form">
    <input type="hidden" value="edit" name="edit_type" />

    <h1 class="wp-heading-inline">TOP MV スライダー登録</h1>

    <?php if (!empty($top_banner)) : ?>
      <table class="add_table">
        <thead>
          <tr>
            <th>MV画像</th>
            <th>MV画像タイトル（src）</th>
            <th>公開・非公開</th>
            <th>削除</th>
          </tr>

          <?php foreach ($top_banner as $key => $banner) : ?>
            <?php if (!empty($banner)) : ?>
            <tr>
              <td class="mv_img">
                <img class="add_img" id="img-src<?= $key ?>" src="<?= !empty($banner['slider']) ? $banner['slider'] : wp_upload_dir()['baseurl'].'/img/common/no_img.png' ?>" />
                <input type="hidden" value="<?= $banner['slider'] ?>" id="image-url<?= $key ?>" name="slider<?= $key ?>" />
                <div><a class="button media-button upload-button" data-id="<?= $key ?>" href="javascript:void(0);">画像を選択</a></div>
              </td>

              <td class="mv_title">
                <input type="text" name="slider_src<?= $key ?>" value="<?php echo $banner['slider_src']; ?>">
              </td>

              <td class="mv_view">
                <input type="radio" name="view<?= $key ?>" value="1" <?= $banner['view'] == '1' ? 'checked' : '' ?>>
                <label for="公開">公開</label>

                <input type="radio" name="view<?= $key ?>" value="0" <?= $banner['view'] == '0' ? 'checked' : '' ?>>
                <label for="非公開">非公開</label>
              </td>

              <td class="mv_delete">
                <a class="button media-button" onclick="banner_delete(<?= $key ?>)">削除する</a>
              </td>
            </tr>
          <?php endif; endforeach; ?>

        </thead>
      </table>
    <?php endif; ?>

    <input class="button media-button edit_btn" type="submit" value="設定済みバナーを更新" />

  </form>
  <br>

  <form method="POST" action="admin.php?page=top_slider" onsubmit="return input_check()" id="wp-form">
    <h1 class="wp-heading-inline">MV画像登録</h1>

    <div class="flex flex-row">
      <div class="flex">
          <p>MV画像</p>
          <img id='img-src' src="<?= wp_upload_dir()['baseurl'] ?>/img/common/no_img.png" />
          <input type="hidden" value="add" name="edit_type" />
          <input type="hidden" value="" id="image-url" name="slider" />
          <a class="button media-button upload-button" data-id="" data-id href="javascript:void(0);">画像を選択</a>
      </div>

      <div class="flex">
          <p>MV画像タイトル(src)</p>
          <div class="input_box">
              <input type="text" name="slider_src" value="">
          </div>
      </div>

      <div class="flex">
        <p>バナーを表示</p>

        <div class="input_box">
          <input type="radio" name="view" value="1">
          <label for="公開">公開</label>

          <input type="radio" name="view" value="0" checked>
          <label for="非公開">非公開</label>
        </div>
      </div>
    </div>

    <input class="button media-button edit_btn" type="submit" value="新規登録" />

    <br>

  </form>

</div>

<script>
  // 新規登録時の入力確認
  function input_check() {
    var image = document.getElementById('image-url').value;
    if (image == '') {
      alert('画像を選択してください。');
      return false; // submitをキャンセル
    }
  }

  jQuery(document).ready(function($) {
    var mediaUploader;
    // Upload Main Image
    $('.upload-button').click(function(e) {
      key = $(this).data('id'); // グローバル変数扱いに

      e.preventDefault();
      // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
        mediaUploader.open();
        return;
      }
      // Extend the wp.media object
      mediaUploader = wp.media.frames.file_frame = wp.media({
        title: '選択してください',
        button: {
          text: '選択'
        },
        multiple: false
      });

      // When a file is selected, grab the URL and set it as the text field's value
      mediaUploader.on('select', function() {
        attachment = mediaUploader.state().get('selection').first().toJSON();
        $('#image-url' + key).val(attachment.url);
        $('#img-src' + key).attr("src", attachment.url);
      });
      // Open the uploader dialog
      mediaUploader.open();
    });
  });

  // 削除処理
  function banner_delete(key) {
    var result = window.confirm("バナーを削除しますか?");
    if (result == true) {

      var form = document.createElement('form');
      var edit_type = document.createElement('input');
      var delete_key = document.createElement('input');

      form.method = 'POST';
      form.action = 'admin.php?page=top_slider';

      edit_type.type = 'hidden'; //入力フォームが表示されないように
      edit_type.name = 'edit_type';
      edit_type.value = 'delete';

      delete_key.type = 'hidden';
      delete_key.name = 'delete_key';
      delete_key.value = key;

      form.appendChild(edit_type);
      form.appendChild(delete_key);
      document.body.appendChild(form);

      // jsでpost送信
      form.submit();

    }
  }
</script>
