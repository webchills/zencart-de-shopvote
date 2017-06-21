<?php
/**
 * @package Shopvote
 * @copyright Copyright 2003-2017 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * @version $Id: 1_0_0.php 2017-06-21 15:13:51Z webchills $
 */
 
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Shopvote'
LIMIT 1;");


$db->Execute("INSERT INTO ".TABLE_CONFIGURATION." (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
('Shopvote - Ist das Modul aktiv?', 'SHOPVOTE_STATUS', 'nein', 'Wollen Sie Shopvote EasyReviews und RatingStars aktivieren?<br/>Bitte erst dann aktivieren, wenn Sie von Shopvote die entsprechenden Javascript Snippets bekommen und unten eingetragen haben.', @gid, 1, NULL, NOW(), NULL, 'zen_cfg_select_option(array(''ja'', ''nein''),'),
('Shopvote - Javascript Snippet für Easy Reviews', 'SHOPVOTE_EASY_REVIEWS_SNIPPET', '', 'Kopieren Sie hier den Javascript Code für Easy Reviews hinein. Der Code wird Ihnen in Ihrem Shopvote Händlerbereich unter Easy Reviews angezeigt.', @gid, 2, NULL, NOW(), NULL, 'zen_cfg_textarea('),
('Shopvote - Javascript Snippet für RatingStars', 'SHOPVOTE_RATING_STARS_SNIPPET', '', 'Kopieren Sie hier den Javascript Code für RatingStars hinein. Der Code wird Ihnen in Ihrem Shopvote Händlerbereich bei der Grafik angezeigt, die Sie für die Anzeige der Bewertungen nutzen wollen.', @gid, 3, NULL, NOW(), NULL, 'zen_cfg_textarea(');");


$admin_page = 'configShopvote';
// delete configuration menu
$db->Execute("DELETE FROM " . TABLE_ADMIN_PAGES . " WHERE page_key = '" . $admin_page . "' LIMIT 1;");
// add configuration menu
if (!zen_page_key_exists($admin_page)) {
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Shopvote'
LIMIT 1;");

$db->Execute("INSERT INTO " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES 
('configShopvote','BOX_CONFIGURATION_SHOPVOTE','FILENAME_CONFIGURATION',CONCAT('gID=',@gid),'configuration','Y',@gid)");
$messageStack->add('Shopvote Konfiguration erfolgreich hinzugefügt.', 'success');  
}
