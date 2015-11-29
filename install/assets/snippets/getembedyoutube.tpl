//<?php
/**
 * GetEmbedYoutube
 * 
 * Получение ссылки на видео YouTube для iframe
 *
 * @category    snippet
 * @version 	2.1.1
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal    @properties 
 * @internal    @modx_category YouTube
 * @internal    @installset base, sample
 */

$regexp = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";
$url = isset($url) ? $url : "";
$output = "https://www.youtube.com/embed/";
preg_match($regexp, $url, $matches);
if(count($matches)){
	$idvideo = $matches[1];
	$output .= $idvideo."?rel=0";
}
return $output;