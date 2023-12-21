<?php
/**
 * @file				db_schema.php
 * @author			Park Kitae
 * @homepage	www.mangboard.com
 * 
 * Copyright (c) hometory.com All Rights Reserved.
 */
if(defined('DB_CHARSET') && DB_CHARSET=="utf8"){
	$db_charset	= "DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
}else{
	if(empty($wpdb)) global $wpdb;
	$db_charset	= $wpdb->get_charset_collate();
}

$mb_schema					= array();
//회원 스키마 설정
$mb_schema["users"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wp_user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` varchar(150) NOT NULL DEFAULT '',
  `passwd` varchar(255) NOT NULL DEFAULT '',
  `user_name` varchar(100) NOT NULL DEFAULT '',
  `user_state` varchar(255) NOT NULL DEFAULT '',
  `user_level` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `user_group` varchar(255) NOT NULL DEFAULT 'home',
  `user_platform` VARCHAR(100) NOT NULL DEFAULT 'mb',
  `user_email` varchar(255) NOT NULL DEFAULT '',
  `user_point` int(10) unsigned NOT NULL DEFAULT '0',
  `user_money` int(10) unsigned NOT NULL DEFAULT '0',
  `user_coin` int(10) unsigned NOT NULL DEFAULT '0',
  `payment_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `payment_total` int(10) unsigned NOT NULL DEFAULT '0',
  `user_birthday` varchar(50) NOT NULL DEFAULT '',
  `user_phone` varchar(50) NOT NULL DEFAULT '',
  `user_picture` varchar(255) NOT NULL DEFAULT '',
  `user_icon` varchar(255) NOT NULL DEFAULT '',
  `user_messenger` varchar(255) NOT NULL DEFAULT '',
  `user_homepage` varchar(255) NOT NULL DEFAULT '',
  `user_blog` varchar(255) NOT NULL DEFAULT '',
  `user_sex` TINYINT(3) NOT NULL DEFAULT '0',
  `home_postcode` varchar(20) NOT NULL DEFAULT '',
  `home_address1` varchar(255) NOT NULL DEFAULT '',
  `home_address2` varchar(255) NOT NULL DEFAULT '',
  `home_tel` varchar(50) NOT NULL DEFAULT '',    
  `office_postcode` varchar(20) NOT NULL DEFAULT '',
  `office_address1` varchar(255) NOT NULL DEFAULT '',
  `office_address2` varchar(255) NOT NULL DEFAULT '',
  `office_tel` varchar(50) NOT NULL DEFAULT '',
  `office_fax` varchar(50) NOT NULL DEFAULT '',
  `company_name` varchar(255) NOT NULL DEFAULT '',
  `job_title` varchar(255) NOT NULL DEFAULT '',  
  `gps_latitude` DECIMAL(10,8) NOT NULL DEFAULT '0.00000000',
  `gps_longitude` DECIMAL(11,8) NOT NULL DEFAULT '0.00000000',
  `allow_mailing` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `allow_message` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `allow_push` TINYINT(3) UNSIGNED NOT NULL DEFAULT '1',
  `allow_sms` TINYINT(3) UNSIGNED NOT NULL DEFAULT '1',
  `followers` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `following` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `new_memo` smallint(5) unsigned NOT NULL DEFAULT '0',
  `login_count` int(10) unsigned NOT NULL DEFAULT '0',
  `write_count` int(10) unsigned NOT NULL DEFAULT '0',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0',  
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0',
  `send_count` int(10) unsigned NOT NULL DEFAULT '0',
  `api_count` int(10) unsigned NOT NULL DEFAULT '0',
  `item1_count` int(10) unsigned NOT NULL DEFAULT '0',
  `item2_count` int(10) unsigned NOT NULL DEFAULT '0',
  `item3_count` int(10) unsigned NOT NULL DEFAULT '0',
  `review_count` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `review_star_sum` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `reg_mail` TINYINT(3) NOT NULL DEFAULT '0',
  `reg_phone` TINYINT(3) NOT NULL DEFAULT '0',
  `push_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_memo` varchar(255) NOT NULL DEFAULT '',
  `admin_memo` varchar(255) NOT NULL DEFAULT '',
  `recommender_id` varchar(255) NOT NULL DEFAULT '',
  `user_auth_key` varchar(255) NOT NULL DEFAULT '',
  `user_access_token` VARCHAR(255) NOT NULL DEFAULT '',
  `ext1` varchar(255) NOT NULL DEFAULT '',
  `ext2` varchar(255) NOT NULL DEFAULT '',
  `ext3` varchar(255) NOT NULL DEFAULT '',
  `ext4` varchar(255) NOT NULL DEFAULT '',
  `ext5` varchar(255) NOT NULL DEFAULT '',
  `ext6` varchar(255) NOT NULL DEFAULT '',
  `ext7` varchar(255) NOT NULL DEFAULT '',
  `ext8` varchar(255) NOT NULL DEFAULT '',
  `ext9` varchar(255) NOT NULL DEFAULT '',
  `ext10` varchar(255) NOT NULL DEFAULT '',
  `ext11` varchar(255) NOT NULL DEFAULT '',
  `ext12` varchar(255) NOT NULL DEFAULT '',
  `ext13` varchar(255) NOT NULL DEFAULT '',
  `ext14` varchar(255) NOT NULL DEFAULT '',
  `ext15` varchar(255) NOT NULL DEFAULT '',
  `ext16` varchar(255) NOT NULL DEFAULT '',
  `ext17` varchar(255) NOT NULL DEFAULT '',
  `ext18` varchar(255) NOT NULL DEFAULT '',
  `ext19` varchar(255) NOT NULL DEFAULT '',
  `ext20` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `user_group` (`user_group`),
  KEY `reg_date` (`reg_date`),
  KEY `last_login` (`last_login`),  
  KEY `allow_mailing` (`allow_mailing`)
) ".$db_charset.";";


//파일 관리 스키마
$mb_schema["files"]			= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` varchar(100) NOT NULL DEFAULT '',
  `board_name` varchar(50) NOT NULL DEFAULT '',
  `table_name` VARCHAR(100) NOT NULL DEFAULT '',
  `board_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL DEFAULT '',
  `file_path` varchar(255) NOT NULL DEFAULT '',
  `file_type` varchar(255) NOT NULL DEFAULT '',
  `file_caption` varchar(255) NOT NULL DEFAULT '',
  `file_alt` varchar(255) NOT NULL DEFAULT '',
  `file_description` text NOT NULL,
  `file_size` int(10) unsigned NOT NULL DEFAULT '0',
  `link_count` int(10) unsigned NOT NULL DEFAULT '0',
  `download_count` int(10) unsigned NOT NULL DEFAULT '0',
  `file_sequence` smallint(5) unsigned NOT NULL DEFAULT '1',
  `is_download` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `agent` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `board_pid` (`board_pid`),
  KEY `user_name` (`user_name`),
  KEY `file_name` (`file_name`),
  KEY `file_size` (`file_size`),
  KEY `reg_date` (`reg_date`),
  KEY `file_path` (`file_path`),
  KEY `file_type` (`file_type`),
  KEY `file_sequence` (`file_sequence`),
  KEY `board_name` (`board_name`),
  KEY `table_name` (`table_name`)
) ".$db_charset.";";


//옵션 스키마 설정
$mb_schema["options"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option_load` varchar(50) NOT NULL DEFAULT 'init',
  `option_category` varchar(50) NOT NULL DEFAULT '',
  `option_title` varchar(255) NOT NULL DEFAULT '',
  `option_name` varchar(100) NOT NULL DEFAULT '',
  `option_value` varchar(255) NOT NULL DEFAULT '',
  `option_data` varchar(255) NOT NULL DEFAULT '',
  `option_label` varchar(255) NOT NULL DEFAULT '',
  `option_class` varchar(255) NOT NULL DEFAULT '',
  `option_style` varchar(255) NOT NULL DEFAULT '',
  `option_event` varchar(255) NOT NULL DEFAULT '',
  `option_attribute` varchar(255) NOT NULL DEFAULT '',
  `option_type` varchar(50) NOT NULL DEFAULT 'text',
  `option_sequence` int(10) unsigned NOT NULL DEFAULT '0',
  `is_show` TINYINT(3) UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  UNIQUE KEY `option_name` (`option_name`),
  INDEX `option_sequence` (`option_sequence`),
  INDEX `option_load` (`option_load`),
  INDEX `option_category` (`option_category`),
  INDEX `is_show` (`is_show`)
) ".$db_charset.";";

//Meta 스키마 설정
$mb_schema["meta"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meta_table` varchar(100) NOT NULL DEFAULT '',
  `meta_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_value` text NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `meta_table` (`meta_table`),
  KEY `meta_pid` (`meta_pid`)  
) ".$db_charset.";";


//게시판 관리 옵션 스키마
$mb_schema["board_options"]	= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `board_name` varchar(50) NOT NULL DEFAULT '',
  `description` VARCHAR(255) NOT NULL DEFAULT '',
  `image_path` VARCHAR(255) NOT NULL DEFAULT '',
  `skin_name` varchar(100) NOT NULL DEFAULT '',
  `model_name` varchar(100) NOT NULL DEFAULT '',
  `table_link` varchar(100) NOT NULL DEFAULT '',
  `mobile_skin_name` varchar(100) NOT NULL DEFAULT '',
  `post_id` BIGINT(20) NOT NULL DEFAULT '0',
  `board_header` text NOT NULL,
  `board_footer` text NOT NULL,
  `board_content_form` text NOT NULL,
  `editor_type` varchar(50) NOT NULL DEFAULT 'N',
  `api_type` varchar(50) NOT NULL DEFAULT 'mb',
  `page_size` smallint(5) unsigned NOT NULL DEFAULT '20',
  `comment_size` smallint(5) unsigned NOT NULL DEFAULT '50',
  `block_size` tinyint(3) unsigned NOT NULL DEFAULT '10',
  `category_type` varchar(50) NOT NULL DEFAULT 'NONE',
  `category_data` text NOT NULL,
  `use_board_vote_good` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `use_board_vote_bad` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `use_comment` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `use_comment_vote_good` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `use_comment_vote_bad` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `use_secret` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `use_notice` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `use_list_title` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `use_list_search` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `list_level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `view_level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `write_level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `reply_level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `delete_level` tinyint(3) unsigned NOT NULL DEFAULT '8',
  `modify_level` tinyint(3) unsigned NOT NULL DEFAULT '8',
  `secret_level` tinyint(3) unsigned NOT NULL DEFAULT '8',
  `manage_level` tinyint(3) unsigned NOT NULL DEFAULT '8',
  `comment_level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `point_board_read` int(10) NOT NULL DEFAULT '0',
  `point_board_write` int(10) NOT NULL DEFAULT '0',
  `point_board_reply` int(10) NOT NULL DEFAULT '0',
  `point_comment_write` int(10) NOT NULL DEFAULT '0',
  `board_type` varchar(50) NOT NULL DEFAULT 'board',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `ext1` varchar(255) NOT NULL DEFAULT '',
  `ext2` varchar(255) NOT NULL DEFAULT '',
  `ext3` varchar(255) NOT NULL DEFAULT '',
  `ext4` varchar(255) NOT NULL DEFAULT '',
  `ext5` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `board_name` (`board_name`),
  KEY `skin_name` (`skin_name`),
  KEY `model_name` (`model_name`),
  KEY `mobile_skin_name` (`mobile_skin_name`),
  KEY `is_show` (`is_show`),
  KEY `reg_date` (`reg_date`),
  KEY `board_type` (`board_type`),
  KEY `table_link` (`table_link`)
) ".$db_charset.";";

//게시판 스키마 설정
$mb_schema["board"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL DEFAULT '0',
  `reply` int(10) unsigned NOT NULL DEFAULT '0',
  `depth` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` varchar(150) NOT NULL DEFAULT '',
  `user_name` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `passwd` varchar(100) NOT NULL DEFAULT '',
  `homepage` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `calendar_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hit` int(10) unsigned NOT NULL DEFAULT '0',
  `user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `file_count` int(10) unsigned NOT NULL DEFAULT '0',
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_good_count` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_bad_count` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_type` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `agent` varchar(30) NOT NULL DEFAULT '',
  `is_notice` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_secret` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` varchar(30) NOT NULL DEFAULT 'publish',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `reply_email` tinyint(3) NOT NULL DEFAULT '0',
  `text` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `content_type` varchar(20) NOT NULL DEFAULT '',
  `data_type` varchar(20) NOT NULL DEFAULT 'text',
  `editor_type` varchar(10) NOT NULL DEFAULT 'N',
  `tag` varchar(255) NOT NULL DEFAULT '',
  `category1` varchar(100) NOT NULL DEFAULT '',
  `category2` varchar(100) NOT NULL DEFAULT '',
  `category3` varchar(100) NOT NULL DEFAULT '',
  `image_path` varchar(255) NOT NULL DEFAULT '',
  `site_link1` varchar(255) NOT NULL DEFAULT '',
  `site_link2` varchar(255) NOT NULL DEFAULT '',
  `gps_latitude` DECIMAL(10,8) NOT NULL DEFAULT '0.00000000',
  `gps_longitude` DECIMAL(11,8) NOT NULL DEFAULT '0.00000000',
  `ext1` varchar(255) NOT NULL DEFAULT '',
  `ext2` varchar(255) NOT NULL DEFAULT '',
  `ext3` varchar(255) NOT NULL DEFAULT '',
  `ext4` varchar(255) NOT NULL DEFAULT '',
  `ext5` varchar(255) NOT NULL DEFAULT '',
  `ext6` varchar(255) NOT NULL DEFAULT '',
  `ext7` varchar(255) NOT NULL DEFAULT '',
  `ext8` varchar(255) NOT NULL DEFAULT '',
  `ext9` varchar(255) NOT NULL DEFAULT '',
  `ext10` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `user_id` (`user_id`),
  KEY `user_name` (`user_name`),
  KEY `title` (`title`),
  KEY `reg_date` (`reg_date`),
  KEY `modify_date` (`modify_date`),
  KEY `hit` (`hit`),
  KEY `gid` (`gid`,`reply`),
  KEY `category` (`category1`,`category2`),
  KEY `calendar_date` (`calendar_date`),
  KEY `gps_latitude` (`gps_latitude`),
  KEY `is_show` (`is_show`),
  KEY `status` (`status`),
  KEY `is_notice` (`is_notice`),
  KEY `user_pid` (`user_pid`),
  KEY `parent_pid` (`parent_pid`),
  KEY `parent_user_pid` (`parent_user_pid`)
) ".$db_charset." COMMENT='board table';";

//댓글 스키마 설정
$mb_schema["comment"]= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL DEFAULT '0',
  `reply` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` varchar(100) NOT NULL DEFAULT '',
  `user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_good_count` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_bad_count` int(10) unsigned NOT NULL DEFAULT '0',
  `vote_type` int(10) unsigned NOT NULL DEFAULT '0',
  `passwd` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `is_secret` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `agent` varchar(30) NOT NULL DEFAULT '',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ext1` varchar(255) NOT NULL DEFAULT '',
  `ext2` varchar(255) NOT NULL DEFAULT '',
  `ext3` varchar(255) NOT NULL DEFAULT '',
  `ext4` varchar(255) NOT NULL DEFAULT '',
  `ext5` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `parent_pid` (`parent_pid`),
  KEY `user_pid` (`user_pid`),
  KEY `parent_user_pid` (`parent_user_pid`)
) ".$db_charset." COMMENT='comment table';";

//에디터 스키마 설정
$mb_schema["h_editors"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` varchar(100) NOT NULL DEFAULT '',
  `image_path` varchar(255) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `color` text NOT NULL,
  `width` text NOT NULL,
  `point_x` text NOT NULL,
  `point_y` text NOT NULL,
  `alpha` text NOT NULL,
  `ip` varchar(40) NOT NULL DEFAULT '',
  `agent` varchar(30) NOT NULL DEFAULT '',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pid`),
  KEY `reg_date` (`reg_date`)
) ".$db_charset." COMMENT='h-editor table';";

//cookie 스키마 설정
$mb_schema["cookies"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` varchar(100) NOT NULL DEFAULT '',
  `board_name` varchar(50) NOT NULL DEFAULT '',
  `cookie_type` varchar(255) NOT NULL DEFAULT '',
  `cookie_name` varchar(255) NOT NULL DEFAULT '',
  `cookie_value` varchar(255) NOT NULL DEFAULT '',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `agent` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `board_name` (`board_name`),
  KEY `user_pid` (`user_pid`,`board_name`),
  KEY `cookie_type` (`cookie_type`),
  KEY `reg_date` (`reg_date`)
) ".$db_charset.";";


//logs 스키마 설정
$mb_schema["logs"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_pid` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` varchar(100) NOT NULL DEFAULT '',
  `board_name` varchar(50) NOT NULL DEFAULT '',
  `mode` varchar(255) NOT NULL DEFAULT '',
  `action` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `agent` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `board_name` (`board_name`),
  KEY `user_pid` (`user_pid`),
  KEY `user_name` (`user_name`),
  KEY `reg_date` (`reg_date`)
) ".$db_charset.";";				

//analytics 스키마 설정
$mb_schema["analytics"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` char(10) NOT NULL DEFAULT '',
  `today_visit` int(10) unsigned NOT NULL DEFAULT '0',
  `today_join` int(10) unsigned NOT NULL DEFAULT '0',
  `today_write` int(10) unsigned NOT NULL DEFAULT '0',
  `today_reply` int(10) unsigned NOT NULL DEFAULT '0',
  `today_comment` int(10) unsigned NOT NULL DEFAULT '0',
  `today_upload` int(10) unsigned NOT NULL DEFAULT '0',
  `today_page_view` int(10) unsigned NOT NULL DEFAULT '0',
  `today_sales` int(10) unsigned NOT NULL DEFAULT '0',
  `today_payment_count` int(10) unsigned NOT NULL DEFAULT '0',
  `total_visit` int(10) unsigned NOT NULL DEFAULT '0',
  `ext1` int(10) unsigned NOT NULL DEFAULT '0',
  `ext2` int(10) unsigned NOT NULL DEFAULT '0',
  `ext3` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  UNIQUE KEY `date` (`date`)
) ".$db_charset.";";

									
//referer 스키마 설정
$mb_schema["referers"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` char(10) NOT NULL DEFAULT '',
  `referer_host` varchar(255) NOT NULL DEFAULT '',
  `referer_url` varchar(255) NOT NULL DEFAULT '',
  `referer_query` varchar(255) NOT NULL DEFAULT '',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `agent` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `date` (`date`),
  KEY `reg_date` (`reg_date`),
  KEY `referer_host` (`referer_host`),
  KEY `referer_query` (`referer_query`),
  KEY `referer_url` (`referer_url`)
) ".$db_charset.";";

$mb_schema["access_ip"]		= "(
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `reg_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pid`),
  KEY `type` (`type`)
) ".$db_charset.";";

?>