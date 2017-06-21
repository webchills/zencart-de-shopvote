##########################################################################
# Shopvote 1.0.0 Uninstall - 2017-06-21- webchills
# NUR AUSFÜHREN WENN SIE DAS MODUL AUS DER DATENBANK ENTFERNEN WOLLEN!!!!!
##########################################################################

DELETE FROM configuration WHERE configuration_key = 'SHOPVOTE_MODUL_VERSION';
DELETE FROM configuration WHERE configuration_key = 'SHOPVOTE_STATUS';
DELETE FROM configuration WHERE configuration_key = 'SHOPVOTE_EASY_REVIEWS_SNIPPET';
DELETE FROM configuration WHERE configuration_key = 'SHOPVOTE_RATING_STARS_SNIPPET';
DELETE FROM configuration_group WHERE configuration_group_title = 'Shopvote';
DELETE FROM admin_pages WHERE page_key='configShopvote';