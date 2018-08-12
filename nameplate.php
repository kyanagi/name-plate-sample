<!DOCTYPE html>
<html lang='ja'>
<head>
<meta charset='utf-8'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css' rel='stylesheet'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.0/paper.min.css' rel='stylesheet'>
<link href="https://fonts.googleapis.com/earlyaccess/notosansjp.css" rel="stylesheet">
<style>
  @page {
    size: A4 landscape
  }

  .print_pages {
    position: relative;
    width: 297mm;
    height: 210mm;
    page-break-after: always;
  }

  .name {
    position: relative;
    top: 70mm;
    text-align: center;

    font-family: "Noto Sans JP";
    font-size: 90px;
    font-weight: 700;
  }


  .name-1-1 { transform: scale(4.5, 5) }
  .name-1-2, .name-2-1 { transform: scale(3.4, 5) }
  .name-1-3, .name-3-1 { transform: scale(2.6, 5) }
  .name-2-2 { transform: scale(2.6, 5) }
  .name-2-3, .name-3-2 { transform: scale(2.1, 5) }
  .name-3-3 { transform: scale(1.8, 5) }
  .name-5-6 { transform: scale(1, 5) }

  .school {
    position: relative;
    top: 123mm;
    text-align: right;
    padding-right: 15mm;
    font-family: "Noto Sans JP";
    font-weight: 700;
    font-size: 120px;
  }

  .school-7 {
    font-size: 100px
  }

  .background {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(3, 3);
    filter: blur(1px) grayscale(100%);
    opacity: 0.2;
  }
</style>
</head>
<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$lines = explode("\n", $_POST['data']);
$lines = array_map('trim', $lines);
$lines = array_filter($lines, 'mb_strlen');
$players = array();
foreach($lines as $line) {
  $data = explode(",", $line);
  $player = array(
    'family_name' => $data[0],
    'given_name' => $data[1],
    'school_name' => $data[2],
    'school_grade' => $data[3],
  );
  $players[] = $player;
}

?>
<body class='A4 landscape'>
<?php foreach ($players as $player) { ?>
<section class='sheet'>
<div class='print_pages'>
  <div class='background'><img src='logo.png'></div>
  <div class='name
              name-<?php echo h(mb_strlen($player['family_name'], 'UTF-8')); ?>-<?php echo h(mb_strlen($player['given_name'], 'UTF-8')); ?>'
   ><?php echo h($player['family_name']); ?> <?php echo h($player['given_name']); ?></div>
  <div class='school'><?php echo h($player['school_name']); ?> <?php echo h($player['school_grade']); ?></div>
</div>
</section>
<?php  } ?>
</body>
</html>
