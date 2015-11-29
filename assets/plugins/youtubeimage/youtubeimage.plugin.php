<?php
/**
 * @name        youtubeimage
 * @description Get YouTube thumbnails and save assets/images/youtube
 *
 * @released    21 10, 2015
 *
 * @required    MODX 0.9.6.3
 *
 * @confirmed   MODX Evolution 1.0.15
 *
 * @author      ProjectSoft 
 */
if(!defined('MODX_BASE_PATH')) die('What are you doing? Get out of here!');
global $pagetitle;
$e =& $modx->event;
$regexp = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";
$urlimg = 'http://i2.ytimg.com/vi/%idvideo%/%typeimage%.jpg';
$dir = MODX_BASE_PATH."assets/images/youtube/";
$type_array = array("maxresdefault","sddefault","hqdefault","mqdefault","default");
switch ($e->name ) {
    case 'OnBeforeDocFormSave':
		/* 
		* Замена ковычек " в pagetitle
		** PS: Вынести в параметры
		** Вынести сохранение определённых форматов изображений?
		*/
		$req = '%(")(.*)(")%Usi';
		$pagetitle = preg_replace($req, "«$2»", $pagetitle);
		$pagetitle = trim(preg_replace('%"%', "", $pagetitle));
		foreach($_POST as $key=>$value){
			$url = trim($value);
			/*
			* Проверяем все $_POST параметры на присутствие ссылки на видео YouTube
			*/
			preg_match($regexp, $url, $matches);
			if(count($matches)){
				/*
				* Получить файл и сохранить
				*/
				$idvideo = $matches[1];
				foreach($type_array as $k=>$typeimage){
					@mkdir($dir.$typeimage, 0755, true);
					$url = str_replace(array("%idvideo%","%typeimage%"), array($idvideo, $typeimage), $urlimg);
					$image = @file_get_contents($url);
					if($image) @file_put_contents($dir.$typeimage."/".$idvideo.".jpg", $image);
				}
			}
		}
	break;
}
?>