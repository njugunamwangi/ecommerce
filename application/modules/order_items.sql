CREATE TABLE `order_items` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `order_id` int(11) unsigned NOT NULL,
 `product_id` int(11) unsigned NOT NULL,
 `quantity` int(5) unsigned NOT NULL,
 `sub_total` float(10,2) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `order_id` (`order_id`),
 CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;