<?php
include '../database.php';
include '../_g.php';

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

  <div class="bg-photo-container">
    <div class="b-o">
      <!-- peace be upon him -->
    </div>
  </div>

  <?php include '../header.php'; ?>

  <div class="main-content">

    <div class="top-bar">Thoughts & Notes</div>

    <?php
    for($i = 0;$i < $notes_count ;++$i) {
  		$notes = $notes_q->fetch();
      $reftitle = $notes['reftitle'];
    ?>
    <a href="../<?php echo $reftitle?>"><div class="title-container">
      <span class="title-txt"><?php echo $notes['title']; ?></span>
      <span class="sub-txt"><?php echo $notes['dates']; ?></span>
    </div></a>
  <?php } ?>

  </div>


</body>
</html>
