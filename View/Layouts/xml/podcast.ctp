<?php // /app/views/layouts/xml/podcast.ctp

echo $this->Rss->header();
if (!isset($documentData)) {
    $documentData = array();
}
if (!isset($channelData)) {
    $channelData = array();
}
if (!isset($channelData['title'])) {
    $channelData['title'] = $title_for_layout;
}
$before = "";
 if (!empty($beforeContent) && is_array($beforeContent)){
  foreach ( $beforeContent as $i ){
   $before .= $i;
  }
 }
$channel = $this->Rss->channel(array(), $channelData, $before . $content_for_layout);
echo $this->Rss->document($documentData,$channel);
?>
