<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=="News") {
  $xml=("https://flipboard.com/@raimoseero/feed-nii8kd0sz?rss");
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;
/*$channel_image = $xmlDoc->getElementsByTagName('image')
->item(0);*/

//output elements from "<channel>"
/*echo("<p><a href='" . $channel_link
  . "'>" . $channel_image . "</a>");*/
echo("<div class=col-md-6><p><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br>");
echo($channel_desc . "</p></div>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=28; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  /*$item_image=$x->item($i)->getElementsByTagName('image')
  ->item(0);*/
  /*echo ("<p><a href='" . $item_link
  . "'>" . $item_image . "</a>");*/
  echo ("<div class=col-md-4><p><h3><a href='" . $item_link . "'>" . $item_title . "</a></p></h3>");
  echo ("<p>".$item_desc ."</p></div>");
}
?>