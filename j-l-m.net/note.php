<?php
require 'database.php';
include '_g.php';
error_reporting(E_ALL);

//$id = $_GET['id'];
$title = $_GET['title'];

$note_q = $db->prepare("SELECT * FROM notes WHERE reftitle=?");
$note_q->execute([$title]);
$note = $note_q->fetch();
?>
<!DOCTYPE html>
<head>
  <meta name="author" content="Jake Martinez" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="css/sass.scss" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css" />
  <link rel="icon" href="images/icons/icon.png" type="image/x-icon"/>
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <title>Jake Martinez - <?php echo $title; ?></title>
  <script src="https://use.fontawesome.com/80ad235f22.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="/js/script.js"></script>
</head>
<body id="notes">

  <div class="bg-photo-container">
    <div class="b-o">
      <!-- peace be upon him -->
    </div>
  </div>

  <?php include 'header.php'; ?>

  <a href="/notes"><div class="back-button">&larr;</div></a>

  <div class="main-content">

    <div class="top-bar"><?php echo $note['title']; ?></div>

    <div class="note-main">

      <?php echo $note['content']; ?>

    </div>

  </div>


</body>
</html>
