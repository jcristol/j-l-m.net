<?php
error_reporting(0);
date_default_timezone_set('America/Chicago');

// Pinaki's function to eliminate tags from input
function allow_tag($tag,$html) { return preg_replace('%&lt;'.$tag.'[ \t\n]*&gt;(.*?)&lt;/'.$tag.'[ \t\n]*&gt;%s',"<$tag>$1</$tag>",$html); }
// blog all HTML except for certain allowed tags
function limit_html($html) {
  $html = preg_replace("/\r/",'',$html); // remove all pesky \r characters
  $html = allow_tag('b',$html);
  $html = allow_tag('i',$html);
  $html = allow_tag('q',$html);
  $html = allow_tag('p',$html);
  $html = allow_tag('em',$html);
  $html = allow_tag('code',$html);
  $html = allow_tag('del',$html);
  $html = allow_tag('ins',$html);
  $html = allow_tag('strong',$html);
  $html = allow_tag('small',$html);
  $html = allow_tag('blockquote',$html);
  $html = allow_tag('dfn',$html);
  $html = allow_tag('samp',$html);
  $html = allow_tag('kbd',$html);
  $html = allow_tag('var',$html);
  $html = allow_tag('cite',$html);
  $html = allow_tag('img',$html);
  // $html = allow_tag('strike',$html); // depreciated

  // <u> must be replaced with <span class="underline">
  $html = preg_replace("%&lt;u[ \t\n]*&gt;(.*?)&lt;/u[ \t\n]*&gt;%s",'<span class="underline">$1</span>',$html);

  // allow <abbr title=""> tags
  $html = preg_replace('%&lt;abbr[ \t\n]+title=(&quot;|&#039;)(.+?)(&quot;|&#039;)[ \t\n]*&gt;(.*?)&lt;/abbr[ \t\n]*&gt;%s','<abbr title="$2">$4</abbr>',$html);
  $html = preg_replace('%&lt;acronym[ \t\n]+title=(&quot;|&#039;)(.+?)(&quot;|&#039;)[ \t\n]*&gt;(.*?)&lt;/acronym[ \t\n]*&gt;%s','<acronym title="$2">$4</acronym>',$html);

  // allow <a href="href" title="title">...</a>, but check ref closely
  $html = preg_replace('%&lt;a[ \t\n]+href=(&quot;|&#039;)((?:ht|f)tps?://.+?\..+?|mailto:.+?@.+?)(&quot;|&#039;)([ \t\n]+title=(&quot;|&#039;)(.+?)(&quot;|&#039;))?[ \t\n]*&gt;(.*?)&lt;/a[ \t\n]*&gt;%s','<a href="$2" title="$6">$8</a>',$html);

  $html = preg_replace("%&lt;br[ \t\n]*/?&gt;%s",'<br/>',$html); // allow <br /> tags
  $html = str_replace("\n","<br/>",$html); // newlines will be automatically changed to <br/> tags

  return $html;

}



class Post_ { // ALL posting functions

	function post_film($title, $summary, $yt, $rawImgUrl, $rawImgName, $type, $d, $p, $w, $dp, $pd) { // add film to database
    require "database.php";

		$allowedExts = array("jpg", "jpeg", "png");
		$fileName = $rawImgName;
		$extension = substr($fileName, strrpos($fileName, '.') + 1); // grabbing extension

    $title_dash = strip_char($title);
		$content = limit_html($summary);

		move_uploaded_file($rawImgUrl,"images/films/" . $title_dash .".".$extension."");
		$imgUrl = "images/films/" . $title_dash .".".$extension."";

		$stmt = $db->prepare("INSERT INTO `films` (title, summary, yt, img, type, d, p, w, dp, pd)
	                         VALUES (:title, :summary, :yt, :img, :type, :d, :p, :w, :dp, :pd)");

		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':summary', $summary);
		$stmt->bindParam(':yt', $yt);
		$stmt->bindParam(':img', $imgUrl);
    $stmt->bindParam(':type', $type);
		$stmt->bindParam(':d', $d);
		$stmt->bindParam(':p', $p);
		$stmt->bindParam(':w', $w);
		$stmt->bindParam(':dp', $dp);
    $stmt->bindParam(':pd', $pd);
		$stmt->execute();
    exit;

	}

	function post_update($title, $summary, $yt, $imgUrl, $d, $p, $w, $dp, $pd, $f_id) {

    require "database.php";

		$allowedExts = array("jpg", "jpeg", "png");
		$fileName = $_FILES['image-file']['name'];
		$extension = substr($fileName, strrpos($fileName, '.') + 1); // grabbing extension

		$oldPostq = $db->prepare("SELECT * FROM `films` WHERE `id` = '$f_id'");
		$oldPostq->execute();
		$oldPost = $oldPostq->fetch();

		$oldTitle = $oldPost['title'];
    $oldTitle = strip_char($oldTitle);
    $title = strip_char($title);
    $summary = limit_html($summary);

		$oldImgUrl = $oldPost['img'];
		$oldExtension = substr($oldImgUrl, strrpos($oldImgUrl, '.') + 1);
		$renameOne = "../images/films/".$oldTitle.".".$oldExtension."";
		$renameTwo = "../images/films/".$title.".".$oldExtension."";

		// if there is a new title execute
		if($title != $oldTitle && $_FILES['image-file']['size'] == 0) {
			rename($renameOne, $renameTwo);
			$static_imgUrl = "images/films/" . $title_dash .".".$oldExtension."";
		}
		elseif($title == $oldTitle && $_FILES['image-file']['size'] > 0 && $oldPost['imgUrl'] == "") {
			move_uploaded_file($imgUrl,"../images/films/" . $title_dash .".".$extension."");
			$static_imgUrl = "images/films/" . $title_dash .".".$extension."";
		}
		// if there is no image uploaded, else move the file/set static imgUrl
		elseif($_FILES['image-file']['size'] == 0) {
			$static_imgUrl = $oldPost['img'];
		}
		else {
			unlink("../images/films/" . $oldTitle_dash . "." . $oldExtension."");
			move_uploaded_file($imgUrl,"../images/films/" . $title_dash .".".$extension."");
			$static_imgUrl = "images/films/" . $title_dash .".".$extension."";
		}
		$stmt = $db->prepare("UPDATE `films` SET title=?, summary=?, yt=?, img=?, d=?, p=?, w=?, dp=?, pd=? WHERE id=?");
		$stmt->execute(array($title,$summart,$yt,$img,$d,$p,$w,$dp,$pd,$f_id));
		//header('Location: ../film.php?id='.$f_id.'');
		exit;

	}
}



function strip_char($input) {

  $input = str_replace('-', ' ', $input);
  $input = str_replace(' ', '-', $input);
  $input = str_replace('"', "", $input);
  $input = str_replace("'", "", $input);
  $input = str_replace('/', '', $input);
  $input = str_replace(':', '', $input);
  $input = str_replace(';', '', $input);
  $input = str_replace('.', '', $input);
  $input = str_replace('?', '', $input);
  $input = str_replace('#', '', $input);
  $input = str_replace('@', '', $input);
  $input = str_replace('!', '', $input);
  $input = str_replace('$', '', $input);
  $input = str_replace('%', '', $input);
  $input = str_replace('^', '', $input);
  $input = str_replace('&', '', $input);
  $input = str_replace('*', '', $input);
  $input = str_replace('(', '', $input);
  $input = str_replace(')', '', $input);
  $input = str_replace('+', '', $input);

  return $input;

}

// return relative time
function rel_time($seconds){
	if($seconds < 60){
		if($seconds < 0){ $seconds = 0; }
		switch($seconds){
			case 1:
				return "1 second";
				break;
			default:
				return "$seconds seconds";
				break;
		}
	} else {
		$date_push = array();
		$time_units = array(	'year'		=> (365*24*60*60),
					'month'		=> (30*24*60*60),
					'week'		=> (7*24*60*60),
					'day'		=> (24*60*60),
					'hour'		=> (60*60),
					'minute'	=> (60));
		foreach($time_units as $unit=>$unit_time){
			$total = 0;
			if($unit=='day' && count($date_push) && ($seconds < $time_units['day'])){
				$seconds = 0;
			}
			while($seconds >= $unit_time){
				$seconds -= $unit_time;
				$total++;
			}
			switch ($total){
				case 0:
					break;
				case 1:
					$date_push[] = "1 $unit";
					break;
				default:
					$date_push[] = "$total {$unit}s";
					break;
			}
			if(count($date_push) == 2){
				break;
			}
		}
		return implode(" and ", $date_push);
	}
}

// date begins at day 0 to inf.
function popularPost($views, $shares, $datePosted) {
	$datePosted = time() - $datePosted;
	if($views == $shares) {
		$shares--;
	}
	$C = ($views * $shares) * (1/($views-$shares));
	$P = $C * (1 - exp($C * (1/-$datePosted)));
	$C = $C + $P;
	return $C;
}























?>
