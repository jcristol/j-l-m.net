<?php
include '../database.php';
include '../_g.php';

$type = $_GET['type'];

if($type == 'post_note') {
  $title = $_POST['title'];
  $date =  date("m-d-y");
  $content = $_POST['content'];
  $content = limit_html($content);
  $reftitle = strip_char($title);
  $stmt = $db->prepare("INSERT INTO `notes` (title, reftitle, dates, content)
                         VALUES (:title, :reftitle, :dates, :content)");

  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':reftitle', $reftitle);
  $stmt->bindParam(':dates', $date);
  $stmt->bindParam(':content', $content);
  $stmt->execute();
  exit;
}
elseif($type == 'delete_note') {

$id = $_POST['id'];
$db->exec("DELETE FROM `notes` WHERE `id` = $id");

}

$notes_q = $db->prepare("SELECT * FROM `notes` ORDER BY `id` DESC");
$notes_q->execute();
$notes_count = $db->query("SELECT count(*) FROM `notes`")->fetchColumn();
?>
<!DOCTYPE html>
<head>
  <meta name="author" content="Jake Martinez" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="../css/sass.scss" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css" />
  <link rel="icon" href="../images/icons/icon.png" type="image/x-icon"/>
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <title>Jake Martinez - Notes</title>
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="/js/script.js"></script>
</head>
<body id="notes">

  <?php include '../header.php'; ?>

  <div class="main-content">

    <div class="top-bar">Admin</div>

    <div class="left">

    <form>
      <input id="title" type="text" name="title" placeholder="title..." />
      <br>
      <textarea id="content" name="content" placeholder="text..."></textarea>
      <br>
      <input type="submit" value="submit" />
    </form>

  </div>

  <div class="right-note">

    <?php
    for($i = 0;$i < $notes_count ;++$i) {
  		$notes = $notes_q->fetch();
    ?>
    <div class="title-container_input" style="cursor:default;">
      <span class="title-txt"><?php echo $notes['title']; ?></span>
      <span class="sub-txt"><a id="delete" style="cursor:pointer;" onclick="delete_note(<?php echo $notes['id'];?>);">delete</a></span>
    </div>
  <?php } ?>

  </div>

  </div>

  <script>
    $(function () {

      $('form').on('submit', function (e) {

        e.preventDefault();

        $.ajax({
          type: 'post',
          url: '/notes/input.php?type=post_note',
          data: $('form').serialize(),
          success: function () {
            alert('form was submitted');
          }
        });

      });
    });

    function delete_note(id) {

      var deletePost = prompt("Are you sure?\n\nEnter 'DELETE' below");
      if(deletePost == "DELETE") {

      $.ajax({
        type: 'post',
        url: '/notes/input.php?type=delete_note',
        data: {'id': id},
        success: function () {
          alert('note deleted. refresh.');
        }
      });

      }
      else {
    		alert("note not deleted");
    	}
    }
  </script>

</body>
</html>
