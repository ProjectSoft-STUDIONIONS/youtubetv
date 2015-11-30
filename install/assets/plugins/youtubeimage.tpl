//<?php
/**
 * youtubeimage
 *
 * Get YouTube thumbnails and save assets/images/youtube
 *
 * @events:
 * - OnBeforeDocFormSave
 * @category    plugin
 * @version     1.0
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @package     modx
 * @author      ProjectSoft
 * @internal    @events OnBeforeDocFormSave
 * @internal    @modx_category YouTube
 * @internal    @properties &save_thimbs=Типы сохраняемых перевьюшек;list-multi;maxresdefault,sddefault,hqdefault,mqdefault,default;hqdefault,mqdefault &cache_thumbnail=Пересохранять перевьюшки при сохранении документа?;list;true,false;false &remove_sc=Удалять кавычки в pagetitle?;list;true,false;true
 * @internal    @installset base
 */

require(MODX_BASE_PATH. 'assets/plugins/youtubeimage/youtubeimage.plugin.php');