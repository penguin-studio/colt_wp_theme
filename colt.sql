-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 27 2016 г., 02:17
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `colt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Мистер WordPress', '', 'https://wordpress.org/', '', '2016-02-26 01:36:28', '2016-02-25 22:36:28', 'Привет! Это комментарий.\nЧтобы удалить его, авторизуйтесь и просмотрите комментарии к записи. Там будут ссылки для их изменения или удаления.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=167 ;

--
-- Дамп данных таблицы `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://colt', 'yes'),
(2, 'home', 'http://colt', 'yes'),
(3, 'blogname', 'Mr.Colt Bardershop &amp; Tattoo', 'yes'),
(4, 'blogdescription', 'Ещё один сайт на WordPress', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'rudenko.programmer@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'd.m.Y', 'yes'),
(24, 'time_format', 'H:i', 'yes'),
(25, 'links_updated_date_format', 'd.m.Y H:i', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'hack_file', '0', 'yes'),
(30, 'blog_charset', 'UTF-8', 'yes'),
(31, 'moderation_keys', '', 'no'),
(32, 'active_plugins', 'a:1:{i:0;s:23:"rustolat/rus-to-lat.php";}', 'yes'),
(33, 'category_base', '', 'yes'),
(34, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(35, 'comment_max_links', '2', 'yes'),
(36, 'gmt_offset', '3', 'yes'),
(37, 'default_email_category', '1', 'yes'),
(38, 'recently_edited', '', 'no'),
(39, 'template', 'colt_theme', 'yes'),
(40, 'stylesheet', 'colt_theme', 'yes'),
(41, 'comment_whitelist', '1', 'yes'),
(42, 'blacklist_keys', '', 'no'),
(43, 'comment_registration', '0', 'yes'),
(44, 'html_type', 'text/html', 'yes'),
(45, 'use_trackback', '0', 'yes'),
(46, 'default_role', 'subscriber', 'yes'),
(47, 'db_version', '35700', 'yes'),
(48, 'uploads_use_yearmonth_folders', '1', 'yes'),
(49, 'upload_path', '', 'yes'),
(50, 'blog_public', '0', 'yes'),
(51, 'default_link_category', '2', 'yes'),
(52, 'show_on_front', 'posts', 'yes'),
(53, 'tag_base', '', 'yes'),
(54, 'show_avatars', '1', 'yes'),
(55, 'avatar_rating', 'G', 'yes'),
(56, 'upload_url_path', '', 'yes'),
(57, 'thumbnail_size_w', '150', 'yes'),
(58, 'thumbnail_size_h', '150', 'yes'),
(59, 'thumbnail_crop', '1', 'yes'),
(60, 'medium_size_w', '300', 'yes'),
(61, 'medium_size_h', '300', 'yes'),
(62, 'avatar_default', 'mystery', 'yes'),
(63, 'large_size_w', '1024', 'yes'),
(64, 'large_size_h', '1024', 'yes'),
(65, 'image_default_link_type', 'none', 'yes'),
(66, 'image_default_size', '', 'yes'),
(67, 'image_default_align', '', 'yes'),
(68, 'close_comments_for_old_posts', '0', 'yes'),
(69, 'close_comments_days_old', '14', 'yes'),
(70, 'thread_comments', '1', 'yes'),
(71, 'thread_comments_depth', '5', 'yes'),
(72, 'page_comments', '0', 'yes'),
(73, 'comments_per_page', '50', 'yes'),
(74, 'default_comments_page', 'newest', 'yes'),
(75, 'comment_order', 'asc', 'yes'),
(76, 'sticky_posts', 'a:0:{}', 'yes'),
(77, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(78, 'widget_text', 'a:0:{}', 'yes'),
(79, 'widget_rss', 'a:0:{}', 'yes'),
(80, 'uninstall_plugins', 'a:0:{}', 'no'),
(81, 'timezone_string', '', 'yes'),
(82, 'page_for_posts', '0', 'yes'),
(83, 'page_on_front', '0', 'yes'),
(84, 'default_post_format', '0', 'yes'),
(85, 'link_manager_enabled', '0', 'yes'),
(86, 'finished_splitting_shared_terms', '1', 'yes'),
(87, 'site_icon', '0', 'yes'),
(88, 'medium_large_size_w', '768', 'yes'),
(89, 'medium_large_size_h', '0', 'yes'),
(90, 'initial_db_version', '35700', 'yes'),
(91, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:61:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(92, 'WPLANG', 'ru_RU', 'yes'),
(93, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(97, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 'sidebars_widgets', 'a:3:{s:19:"wp_inactive_widgets";a:0:{}s:18:"orphaned_widgets_1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:13:"array_version";i:3;}', 'yes'),
(100, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(101, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(102, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(103, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(104, 'cron', 'a:4:{i:1456569389;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1456612623;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1456615445;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(107, 'nonce_key', 'p`RcGtP_gK j-|ioDkj>fm4oV0}q&ZM>3huYPv3}b}_,V7}25%a.t`N}1H#vDMPU', 'yes'),
(108, 'nonce_salt', '-YBL[-wOkZcHT*)0AOJoi^=@+$#e`sB7m:2]m87~-d-?Bqdee~yhcQ`yvQ;Q6(d(', 'yes'),
(111, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:65:"https://downloads.wordpress.org/release/ru_RU/wordpress-4.4.2.zip";s:6:"locale";s:5:"ru_RU";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:65:"https://downloads.wordpress.org/release/ru_RU/wordpress-4.4.2.zip";s:10:"no_content";b:0;s:11:"new_bundled";b:0;s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.4.2";s:7:"version";s:5:"4.4.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.4";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1456526224;s:15:"version_checked";s:5:"4.4.2";s:12:"translations";a:0:{}}', 'yes'),
(113, '_site_transient_update_plugins', 'O:8:"stdClass":5:{s:12:"last_checked";i:1456529124;s:7:"checked";a:2:{s:9:"hello.php";s:3:"1.6";s:23:"rustolat/rus-to-lat.php";s:3:"0.3";}s:8:"response";a:0:{}s:12:"translations";a:0:{}s:9:"no_update";a:2:{s:9:"hello.php";O:8:"stdClass":6:{s:2:"id";s:4:"3564";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";}s:23:"rustolat/rus-to-lat.php";O:8:"stdClass":6:{s:2:"id";s:5:"18221";s:4:"slug";s:8:"rustolat";s:6:"plugin";s:23:"rustolat/rus-to-lat.php";s:11:"new_version";s:3:"0.3";s:3:"url";s:39:"https://wordpress.org/plugins/rustolat/";s:7:"package";s:55:"https://downloads.wordpress.org/plugin/rustolat.0.3.zip";}}}', 'yes'),
(116, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1456526231;s:7:"checked";a:4:{s:10:"colt_theme";s:0:"";s:13:"twentyfifteen";s:3:"1.4";s:14:"twentyfourteen";s:3:"1.6";s:13:"twentysixteen";s:3:"1.1";}s:8:"response";a:0:{}s:12:"translations";a:0:{}}', 'yes'),
(117, 'auth_key', ':S4SWD (;;R+qG3nWOtuNnH0UjWd<I=A!@C|ZIK!K>B/[(.Z|fOzoA>%F]`J)v*E', 'yes'),
(118, 'auth_salt', 'b%ID[5]=l;%i(&wdo1;/B`<>e[;]+_hO!iuMIItOcaok^veC>9*J%4iu>*0n/vGk', 'yes'),
(119, 'logged_in_key', 'Y!Be%z:!P,4YLu:-[0zbNlEK;w=~$IxURYXwt8.c3Tce[38M-T.L7gY$T$U5}V17', 'yes'),
(120, 'logged_in_salt', '-t5b&Y1Fq*Uc+`~zF)$6#PM{x}:]3<S1?(_]Y7HnqS|N~_vtLAmR|Fb0 _Xs&fY9', 'yes'),
(121, '_site_transient_timeout_browser_dee24e1cb8ffa5ebe8021356c173956d', '1457044623', 'yes'),
(122, '_site_transient_browser_dee24e1cb8ffa5ebe8021356c173956d', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:13:"48.0.2564.116";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(124, 'can_compress_scripts', '1', 'yes'),
(135, '_transient_timeout_plugin_slugs', '1456615538', 'no'),
(136, '_transient_plugin_slugs', 'a:1:{i:0;s:23:"rustolat/rus-to-lat.php";}', 'no'),
(139, 'theme_mods_twentysixteen', 'a:1:{s:16:"sidebars_widgets";a:2:{s:4:"time";i:1456439947;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}}', 'yes'),
(140, 'current_theme', 'Mr.Colt Bardershop &amp; Tattoo', 'yes'),
(141, 'theme_mods_colt_theme', 'a:2:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}}', 'yes'),
(142, 'theme_switched', '', 'yes'),
(144, 'recently_activated', 'a:0:{}', 'yes'),
(148, '_transient_timeout_dash_f69de0bbfe7eaa113146875f40c02000', '1456549377', 'no'),
(149, '_transient_dash_f69de0bbfe7eaa113146875f40c02000', '<div class="rss-widget"><p><strong>Ошибка RSS</strong>: WP HTTP Error: Could not resolve host: wordpress.org; Host not found</p></div><div class="rss-widget"><p><strong>Ошибка RSS</strong>: WP HTTP Error: Could not resolve host: planet.wordpress.org; Host not found</p></div><div class="rss-widget"><ul></ul></div>', 'no'),
(150, 'theme_settings', 'a:15:{s:4:"logo";s:0:"";s:7:"favicon";s:0:"";s:14:"menu_left_side";s:1:"2";s:15:"menu_right_side";s:1:"3";s:14:"contacts_adres";s:44:"Вул. Михайловська, буд. 13";s:17:"contacts_schedule";s:66:"Графік роботи: 10:00 — 21:00 без вихідних";s:14:"contacts_email";s:17:"mr_colt@gmail.com";s:14:"contacts_phone";a:2:{i:0;s:17:"+38 097 970 90 97";i:1;s:17:"+38 093 970 12 57";}s:13:"social_vk_url";s:1:"#";s:23:"social_facebook_visible";s:1:"1";s:19:"social_facebook_url";s:1:"#";s:24:"social_instagram_visible";s:1:"1";s:20:"social_instagram_url";s:1:"#";s:22:"social_twitter_visible";s:1:"1";s:18:"social_twitter_url";s:1:"#";}', 'yes'),
(160, '_site_transient_timeout_theme_roots', '1456530945', 'yes'),
(161, '_site_transient_theme_roots', 'a:4:{s:10:"colt_theme";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:14:"twentyfourteen";s:7:"/themes";s:13:"twentysixteen";s:7:"/themes";}', 'yes'),
(163, 'rewrite_rules', 'a:78:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:12:"robots\\.txt$";s:18:"index.php?robots=1";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:58:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:68:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:88:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:64:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:53:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$";s:91:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$";s:85:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1";s:77:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:65:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]";s:61:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]";s:47:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:57:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:77:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:53:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]";s:51:"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]";s:38:"([0-9]{4})/comment-page-([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&cpage=$matches[2]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";}', 'yes'),
(164, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(165, '_transient_timeout_settings_errors', '1456531641', 'no'),
(166, '_transient_settings_errors', 'a:1:{i:0;a:4:{s:7:"setting";s:7:"general";s:4:"code";s:16:"settings_updated";s:7:"message";s:38:"Настройки сохранены.";s:4:"type";s:7:"updated";}}', 'no');

-- --------------------------------------------------------

--
-- Структура таблицы `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Дамп данных таблицы `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 2, '_wp_trash_meta_status', 'publish'),
(3, 2, '_wp_trash_meta_time', '1456529042'),
(4, 5, '_edit_last', '1'),
(5, 5, '_edit_lock', '1456529055:1'),
(6, 5, '_wp_trash_meta_status', 'draft'),
(7, 5, '_wp_trash_meta_time', '1456529066'),
(8, 7, '_edit_last', '1'),
(9, 7, '_edit_lock', '1456529119:1'),
(10, 9, '_edit_last', '1'),
(11, 9, '_edit_lock', '1456529154:1'),
(12, 11, '_edit_last', '1'),
(13, 11, '_edit_lock', '1456529171:1'),
(14, 13, '_edit_last', '1'),
(15, 13, '_edit_lock', '1456529261:1'),
(16, 15, '_menu_item_type', 'post_type'),
(17, 15, '_menu_item_menu_item_parent', '0'),
(18, 15, '_menu_item_object_id', '13'),
(19, 15, '_menu_item_object', 'page'),
(20, 15, '_menu_item_target', ''),
(21, 15, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(22, 15, '_menu_item_xfn', ''),
(23, 15, '_menu_item_url', ''),
(25, 16, '_menu_item_type', 'post_type'),
(26, 16, '_menu_item_menu_item_parent', '0'),
(27, 16, '_menu_item_object_id', '11'),
(28, 16, '_menu_item_object', 'page'),
(29, 16, '_menu_item_target', ''),
(30, 16, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(31, 16, '_menu_item_xfn', ''),
(32, 16, '_menu_item_url', ''),
(34, 17, '_menu_item_type', 'post_type'),
(35, 17, '_menu_item_menu_item_parent', '0'),
(36, 17, '_menu_item_object_id', '9'),
(37, 17, '_menu_item_object', 'page'),
(38, 17, '_menu_item_target', ''),
(39, 17, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(40, 17, '_menu_item_xfn', ''),
(41, 17, '_menu_item_url', ''),
(43, 18, '_edit_last', '1'),
(44, 18, '_edit_lock', '1456529275:1'),
(45, 20, '_edit_last', '1'),
(46, 20, '_edit_lock', '1456529298:1'),
(47, 22, '_edit_last', '1'),
(48, 22, '_edit_lock', '1456529351:1'),
(49, 24, '_edit_last', '1'),
(50, 24, '_edit_lock', '1456529363:1'),
(51, 26, '_edit_last', '1'),
(52, 26, '_edit_lock', '1456529376:1'),
(53, 28, '_edit_last', '1'),
(54, 28, '_edit_lock', '1456529402:1'),
(55, 30, '_edit_last', '1'),
(56, 30, '_edit_lock', '1456529476:1'),
(57, 32, '_menu_item_type', 'post_type'),
(58, 32, '_menu_item_menu_item_parent', '0'),
(59, 32, '_menu_item_object_id', '20'),
(60, 32, '_menu_item_object', 'page'),
(61, 32, '_menu_item_target', ''),
(62, 32, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(63, 32, '_menu_item_xfn', ''),
(64, 32, '_menu_item_url', ''),
(66, 33, '_menu_item_type', 'post_type'),
(67, 33, '_menu_item_menu_item_parent', '0'),
(68, 33, '_menu_item_object_id', '18'),
(69, 33, '_menu_item_object', 'page'),
(70, 33, '_menu_item_target', ''),
(71, 33, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(72, 33, '_menu_item_xfn', ''),
(73, 33, '_menu_item_url', ''),
(75, 34, '_menu_item_type', 'post_type'),
(76, 34, '_menu_item_menu_item_parent', '0'),
(77, 34, '_menu_item_object_id', '22'),
(78, 34, '_menu_item_object', 'page'),
(79, 34, '_menu_item_target', ''),
(80, 34, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(81, 34, '_menu_item_xfn', ''),
(82, 34, '_menu_item_url', ''),
(84, 35, '_menu_item_type', 'post_type'),
(85, 35, '_menu_item_menu_item_parent', '0'),
(86, 35, '_menu_item_object_id', '24'),
(87, 35, '_menu_item_object', 'page'),
(88, 35, '_menu_item_target', ''),
(89, 35, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(90, 35, '_menu_item_xfn', ''),
(91, 35, '_menu_item_url', ''),
(93, 36, '_menu_item_type', 'post_type'),
(94, 36, '_menu_item_menu_item_parent', '0'),
(95, 36, '_menu_item_object_id', '26'),
(96, 36, '_menu_item_object', 'page'),
(97, 36, '_menu_item_target', ''),
(98, 36, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(99, 36, '_menu_item_xfn', ''),
(100, 36, '_menu_item_url', ''),
(102, 37, '_menu_item_type', 'post_type'),
(103, 37, '_menu_item_menu_item_parent', '0'),
(104, 37, '_menu_item_object_id', '28'),
(105, 37, '_menu_item_object', 'page'),
(106, 37, '_menu_item_target', ''),
(107, 37, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(108, 37, '_menu_item_xfn', ''),
(109, 37, '_menu_item_url', ''),
(111, 38, '_menu_item_type', 'post_type'),
(112, 38, '_menu_item_menu_item_parent', '0'),
(113, 38, '_menu_item_object_id', '30'),
(114, 38, '_menu_item_object', 'page'),
(115, 38, '_menu_item_target', ''),
(116, 38, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(117, 38, '_menu_item_xfn', ''),
(118, 38, '_menu_item_url', '');

-- --------------------------------------------------------

--
-- Структура таблицы `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2016-02-26 01:36:28', '2016-02-25 22:36:28', 'Добро пожаловать в WordPress. Это ваша первая запись. Отредактируйте или удалите её, затем пишите!', 'Привет, мир!', '', 'publish', 'open', 'open', '', '%d0%bf%d1%80%d0%b8%d0%b2%d0%b5%d1%82-%d0%bc%d0%b8%d1%80', '', '', '2016-02-26 01:36:28', '2016-02-25 22:36:28', '', 0, 'http://colt/?p=1', 0, 'post', '', 1),
(2, 1, '2016-02-26 01:36:28', '2016-02-25 22:36:28', 'Это пример страницы. От записей в блоге она отличается тем, что остаётся на одном месте и отображается в меню сайта (в большинстве тем). На странице &laquo;Детали&raquo; владельцы сайтов обычно рассказывают о себе потенциальным посетителям. Например, так:\n\n<blockquote>Привет! Днём я курьер, а вечером &#8212; подающий надежды актёр. Это мой блог. Я живу в Ростове-на-Дону, люблю своего пса Джека и пинаколаду. (И ещё попадать под дождь.)</blockquote>\n\n...или так:\n\n<blockquote>Компания &laquo;Штучки XYZ&raquo; была основана в 1971 году и с тех пор производит качественные штучки. Компания находится в Готэм-сити, имеет штат из более чем 2000 сотрудников и приносит много пользы жителям Готэма.</blockquote>\n\nПерейдите <a href="http://colt/wp-admin/">в консоль</a>, чтобы удалить эту страницу и создать новые. Успехов!', 'Пример страницы', '', 'trash', 'closed', 'open', '', 'sample-page', '', '', '2016-02-27 02:24:02', '2016-02-26 23:24:02', '', 0, 'http://colt/?page_id=2', 0, 'page', '', 0),
(3, 1, '2016-02-26 01:37:04', '0000-00-00 00:00:00', '', 'Черновик', '', 'auto-draft', 'open', 'open', '', '', '', '', '2016-02-26 01:37:04', '0000-00-00 00:00:00', '', 0, 'http://colt/?p=3', 0, 'post', '', 0),
(4, 1, '2016-02-27 02:24:02', '2016-02-26 23:24:02', 'Это пример страницы. От записей в блоге она отличается тем, что остаётся на одном месте и отображается в меню сайта (в большинстве тем). На странице &laquo;Детали&raquo; владельцы сайтов обычно рассказывают о себе потенциальным посетителям. Например, так:\n\n<blockquote>Привет! Днём я курьер, а вечером &#8212; подающий надежды актёр. Это мой блог. Я живу в Ростове-на-Дону, люблю своего пса Джека и пинаколаду. (И ещё попадать под дождь.)</blockquote>\n\n...или так:\n\n<blockquote>Компания &laquo;Штучки XYZ&raquo; была основана в 1971 году и с тех пор производит качественные штучки. Компания находится в Готэм-сити, имеет штат из более чем 2000 сотрудников и приносит много пользы жителям Готэма.</blockquote>\n\nПерейдите <a href="http://colt/wp-admin/">в консоль</a>, чтобы удалить эту страницу и создать новые. Успехов!', 'Пример страницы', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2016-02-27 02:24:02', '2016-02-26 23:24:02', '', 2, 'http://colt/2016/02/27/2-revision-v1/', 0, 'revision', '', 0),
(5, 1, '2016-02-27 02:24:15', '2016-02-26 23:24:15', '', 'Главная', '', 'trash', 'closed', 'closed', '', '%d0%b3%d0%bb%d0%b0%d0%b2%d0%bd%d0%b0%d1%8f', '', '', '2016-02-27 02:24:26', '2016-02-26 23:24:26', '', 0, 'http://colt/?page_id=5', 0, 'page', '', 0),
(6, 1, '2016-02-27 02:24:26', '2016-02-26 23:24:26', '', 'Главная', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2016-02-27 02:24:26', '2016-02-26 23:24:26', '', 5, 'http://colt/2016/02/27/5-revision-v1/', 0, 'revision', '', 0),
(7, 1, '2016-02-27 02:27:38', '0000-00-00 00:00:00', '', 'Главная', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-02-27 02:27:38', '2016-02-26 23:27:38', '', 0, 'http://colt/?page_id=7', 0, 'page', '', 0),
(8, 1, '2016-02-27 02:27:38', '2016-02-26 23:27:38', '', 'Главная', '', 'inherit', 'closed', 'closed', '', '7-revision-v1', '', '', '2016-02-27 02:27:38', '2016-02-26 23:27:38', '', 7, 'http://colt/2016/02/27/7-revision-v1/', 0, 'revision', '', 0),
(9, 1, '2016-02-27 02:28:14', '2016-02-26 23:28:14', '', 'Про нас', '', 'publish', 'closed', 'closed', '', 'pro-nas', '', '', '2016-02-27 02:28:14', '2016-02-26 23:28:14', '', 0, 'http://colt/?page_id=9', 0, 'page', '', 0),
(10, 1, '2016-02-27 02:28:14', '2016-02-26 23:28:14', '', 'Про нас', '', 'inherit', 'closed', 'closed', '', '9-revision-v1', '', '', '2016-02-27 02:28:14', '2016-02-26 23:28:14', '', 9, 'http://colt/2016/02/27/9-revision-v1/', 0, 'revision', '', 0),
(11, 1, '2016-02-27 02:28:31', '2016-02-26 23:28:31', '', 'Барбер майстри', '', 'publish', 'closed', 'closed', '', 'barber-majstri', '', '', '2016-02-27 02:28:31', '2016-02-26 23:28:31', '', 0, 'http://colt/?page_id=11', 0, 'page', '', 0),
(12, 1, '2016-02-27 02:28:31', '2016-02-26 23:28:31', '', 'Барбер майстри', '', 'inherit', 'closed', 'closed', '', '11-revision-v1', '', '', '2016-02-27 02:28:31', '2016-02-26 23:28:31', '', 11, 'http://colt/2016/02/27/11-revision-v1/', 0, 'revision', '', 0),
(13, 1, '2016-02-27 02:28:45', '2016-02-26 23:28:45', '', 'Тату майстри', '', 'publish', 'closed', 'closed', '', 'tatu-majstri', '', '', '2016-02-27 02:28:45', '2016-02-26 23:28:45', '', 0, 'http://colt/?page_id=13', 0, 'page', '', 0),
(14, 1, '2016-02-27 02:28:45', '2016-02-26 23:28:45', '', 'Тату майстри', '', 'inherit', 'closed', 'closed', '', '13-revision-v1', '', '', '2016-02-27 02:28:45', '2016-02-26 23:28:45', '', 13, 'http://colt/2016/02/27/13-revision-v1/', 0, 'revision', '', 0),
(15, 1, '2016-02-27 02:29:11', '2016-02-26 23:29:11', ' ', '', '', 'publish', 'closed', 'closed', '', '15', '', '', '2016-02-27 02:33:28', '2016-02-26 23:33:28', '', 0, 'http://colt/?p=15', 3, 'nav_menu_item', '', 0),
(16, 1, '2016-02-27 02:29:11', '2016-02-26 23:29:11', ' ', '', '', 'publish', 'closed', 'closed', '', '16', '', '', '2016-02-27 02:33:28', '2016-02-26 23:33:28', '', 0, 'http://colt/?p=16', 2, 'nav_menu_item', '', 0),
(17, 1, '2016-02-27 02:29:11', '2016-02-26 23:29:11', ' ', '', '', 'publish', 'closed', 'closed', '', '17', '', '', '2016-02-27 02:33:28', '2016-02-26 23:33:28', '', 0, 'http://colt/?p=17', 1, 'nav_menu_item', '', 0),
(18, 1, '2016-02-27 02:30:15', '2016-02-26 23:30:15', '', 'Послуги', '', 'publish', 'closed', 'closed', '', 'poslugi', '', '', '2016-02-27 02:30:15', '2016-02-26 23:30:15', '', 0, 'http://colt/?page_id=18', 0, 'page', '', 0),
(19, 1, '2016-02-27 02:30:15', '2016-02-26 23:30:15', '', 'Послуги', '', 'inherit', 'closed', 'closed', '', '18-revision-v1', '', '', '2016-02-27 02:30:15', '2016-02-26 23:30:15', '', 18, 'http://colt/2016/02/27/18-revision-v1/', 0, 'revision', '', 0),
(20, 1, '2016-02-27 02:30:27', '2016-02-26 23:30:27', '', 'Контакти', '', 'publish', 'closed', 'closed', '', 'kontakti', '', '', '2016-02-27 02:30:27', '2016-02-26 23:30:27', '', 0, 'http://colt/?page_id=20', 0, 'page', '', 0),
(21, 1, '2016-02-27 02:30:27', '2016-02-26 23:30:27', '', 'Контакти', '', 'inherit', 'closed', 'closed', '', '20-revision-v1', '', '', '2016-02-27 02:30:27', '2016-02-26 23:30:27', '', 20, 'http://colt/2016/02/27/20-revision-v1/', 0, 'revision', '', 0),
(22, 1, '2016-02-27 02:31:21', '2016-02-26 23:31:21', '', 'Школа барберів і тату', '', 'publish', 'closed', 'closed', '', 'shkola-barberiv-i-tatu', '', '', '2016-02-27 02:31:21', '2016-02-26 23:31:21', '', 0, 'http://colt/?page_id=22', 0, 'page', '', 0),
(23, 1, '2016-02-27 02:31:21', '2016-02-26 23:31:21', '', 'Школа барберів і тату', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2016-02-27 02:31:21', '2016-02-26 23:31:21', '', 22, 'http://colt/2016/02/27/22-revision-v1/', 0, 'revision', '', 0),
(24, 1, '2016-02-27 02:31:43', '2016-02-26 23:31:43', '', 'Блог', '', 'publish', 'closed', 'closed', '', 'blog', '', '', '2016-02-27 02:31:43', '2016-02-26 23:31:43', '', 0, 'http://colt/?page_id=24', 0, 'page', '', 0),
(25, 1, '2016-02-27 02:31:43', '2016-02-26 23:31:43', '', 'Блог', '', 'inherit', 'closed', 'closed', '', '24-revision-v1', '', '', '2016-02-27 02:31:43', '2016-02-26 23:31:43', '', 24, 'http://colt/2016/02/27/24-revision-v1/', 0, 'revision', '', 0),
(26, 1, '2016-02-27 02:31:56', '2016-02-26 23:31:56', '', 'Магазин', '', 'publish', 'closed', 'closed', '', 'magazin', '', '', '2016-02-27 02:31:56', '2016-02-26 23:31:56', '', 0, 'http://colt/?page_id=26', 0, 'page', '', 0),
(27, 1, '2016-02-27 02:31:56', '2016-02-26 23:31:56', '', 'Магазин', '', 'inherit', 'closed', 'closed', '', '26-revision-v1', '', '', '2016-02-27 02:31:56', '2016-02-26 23:31:56', '', 26, 'http://colt/2016/02/27/26-revision-v1/', 0, 'revision', '', 0),
(28, 1, '2016-02-27 02:32:15', '2016-02-26 23:32:15', '', 'Франшиза', '', 'publish', 'closed', 'closed', '', 'franshiza', '', '', '2016-02-27 02:32:15', '2016-02-26 23:32:15', '', 0, 'http://colt/?page_id=28', 0, 'page', '', 0),
(29, 1, '2016-02-27 02:32:15', '2016-02-26 23:32:15', '', 'Франшиза', '', 'inherit', 'closed', 'closed', '', '28-revision-v1', '', '', '2016-02-27 02:32:15', '2016-02-26 23:32:15', '', 28, 'http://colt/2016/02/27/28-revision-v1/', 0, 'revision', '', 0),
(30, 1, '2016-02-27 02:32:38', '2016-02-26 23:32:38', '', 'Змі про нас', '', 'publish', 'closed', 'closed', '', 'zmi-pro-nas', '', '', '2016-02-27 02:32:38', '2016-02-26 23:32:38', '', 0, 'http://colt/?page_id=30', 0, 'page', '', 0),
(31, 1, '2016-02-27 02:32:38', '2016-02-26 23:32:38', '', 'Змі про нас', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2016-02-27 02:32:38', '2016-02-26 23:32:38', '', 30, 'http://colt/2016/02/27/30-revision-v1/', 0, 'revision', '', 0),
(32, 1, '2016-02-27 02:33:28', '2016-02-26 23:33:28', ' ', '', '', 'publish', 'closed', 'closed', '', '32', '', '', '2016-02-27 02:33:28', '2016-02-26 23:33:28', '', 0, 'http://colt/?p=32', 5, 'nav_menu_item', '', 0),
(33, 1, '2016-02-27 02:33:28', '2016-02-26 23:33:28', ' ', '', '', 'publish', 'closed', 'closed', '', '33', '', '', '2016-02-27 02:33:28', '2016-02-26 23:33:28', '', 0, 'http://colt/?p=33', 4, 'nav_menu_item', '', 0),
(34, 1, '2016-02-27 02:34:45', '2016-02-26 23:34:45', ' ', '', '', 'publish', 'closed', 'closed', '', '34', '', '', '2016-02-27 02:34:45', '2016-02-26 23:34:45', '', 0, 'http://colt/?p=34', 1, 'nav_menu_item', '', 0),
(35, 1, '2016-02-27 02:34:45', '2016-02-26 23:34:45', ' ', '', '', 'publish', 'closed', 'closed', '', '35', '', '', '2016-02-27 02:34:45', '2016-02-26 23:34:45', '', 0, 'http://colt/?p=35', 2, 'nav_menu_item', '', 0),
(36, 1, '2016-02-27 02:34:45', '2016-02-26 23:34:45', ' ', '', '', 'publish', 'closed', 'closed', '', '36', '', '', '2016-02-27 02:34:45', '2016-02-26 23:34:45', '', 0, 'http://colt/?p=36', 3, 'nav_menu_item', '', 0),
(37, 1, '2016-02-27 02:34:45', '2016-02-26 23:34:45', ' ', '', '', 'publish', 'closed', 'closed', '', '37', '', '', '2016-02-27 02:34:45', '2016-02-26 23:34:45', '', 0, 'http://colt/?p=37', 4, 'nav_menu_item', '', 0),
(38, 1, '2016-02-27 02:34:45', '2016-02-26 23:34:45', ' ', '', '', 'publish', 'closed', 'closed', '', '38', '', '', '2016-02-27 02:34:45', '2016-02-26 23:34:45', '', 0, 'http://colt/?p=38', 5, 'nav_menu_item', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_termmeta`
--

CREATE TABLE IF NOT EXISTS `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Без рубрики', '%d0%b1%d0%b5%d0%b7-%d1%80%d1%83%d0%b1%d1%80%d0%b8%d0%ba%d0%b8', 0),
(2, 'Верхнее меню левая половина', 'verxnee-menyu-levaya-polovina', 0),
(3, 'Верхнее меню правая половина', 'verxnee-menyu-pravaya-polovina', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(15, 2, 0),
(16, 2, 0),
(17, 2, 0),
(32, 2, 0),
(33, 2, 0),
(34, 3, 0),
(35, 3, 0),
(36, 3, 0),
(37, 3, 0),
(38, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'nav_menu', '', 0, 5),
(3, 3, 'nav_menu', '', 0, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', ''),
(13, 1, 'show_welcome_panel', '1'),
(14, 1, 'session_tokens', 'a:1:{s:64:"25cac0951525785974b8931a881720c4967d838f973a2af87ec5cf5d76d1cdd1";a:4:{s:10:"expiration";i:1457649422;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:102:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36";s:5:"login";i:1456439822;}}'),
(15, 1, 'wp_dashboard_quick_press_last_post_id', '3'),
(16, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";i:4;s:15:"title-attribute";}'),
(17, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:"add-post_tag";}'),
(18, 1, 'nav_menu_recently_edited', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BGUvzglWwwAxiq7IbZvVmePSf8gL8O0', 'admin', 'rudenko.programmer@gmail.com', '', '2016-02-25 22:36:27', '', 0, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
