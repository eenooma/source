<?php
$desktop_model					= array();
$tablet_model						= array();
$mobile_model					= array();
$desktop_model['version']		= "1.0.0";
$layout_type		= 'responsive-box2';		// responsive-box1, responsive-box2, responsive-box3, responsive-box4
mbw_set_vars("write_layout_type",$layout_type);
mbw_set_vars("mobile_write_layout_type",'responsive-box4');
mbw_set_vars("write_layout_class",'mb-max-width-1000');

// Board Model
$desktop_model['list']		= '
{"type":"list_check","width":"30px","level":"10","class":"list_check"},
{"field":"fn_pid","name":"W_PID","width":"50px","class":"num","type":"pid","class":"pid","responsive":"mb-hide-mobile mb-hide-tablet"},
{"field":"fn_user_name","name":"W_NAME1","width":"115px","type":"title"},
{"field":"fn_phone","name":"W_MOBILE","width":"115px"},
{"field":"fn_reg_date","name":"W_DATE","width":"85px","type":"date","class":"date","responsive":"mb-hide-mobile"},
{"field":"fn_ext1","attribute":"readonly","td_class":"text-left","name":"관심분야","width":"","type":"checkbox","data":"전당포 창업,중고명품샵,금거래소,자격증 취득 및 취미,리셀러,시계샵,병행수입,명품 감정사","label":"전당포 창업,중고명품샵,금거래소,자격증 취득 및 취미,리셀러,시계샵,병행수입,명품 감정사"},
{"field":"fn_title","name":"W_TITLE","type":"search"},
{"field":"fn_content","name":"W_CONTENT","type":"search"},
{"field":"fn_hit","name":"W_HIT","width":"60px","search":"false","class":"hit","responsive":"mb-hide-mobile mb-hide-tablet"},
{"field":"fn_tag","name":"W_TAG","type":"search"}
';

$desktop_model['list_gallery']		= '
{"field":"fn_image_path","name":"W_IMAGE","width":"100%","height":"220px","tablet_height":"200px","mobile_height":"180px","type":"img_bg","class":"img","link":"view","td_class":"gallery-item-img","search":"false","size":"small"},
{"field":"fn_title","name":"W_TITLE","width":"","type":"title_checkbox","maxlength":"32","maxtext":"..","td_class":"gallery-title"},
{"field":"fn_content","name":"W_CONTENT","type":"search"},
{"field":"fn_reg_date","name":"W_DATE","width":"115px","type":"gallery_date","td_class":"gallery-date"},
{"field":"fn_user_name","name":"W_WRITER","width":"115px","td_class":"gallery-name"},
{"field":"fn_tag","name":"W_TAG","type":"search"}
';
$desktop_model['list_calendar']		= '
{"field":"fn_title","name":"W_TITLE","width":"","type":"title_checkbox","maxlength":"19","maxtext":"..","td_class":"text-left"},
{"field":"fn_content","name":"W_CONTENT","type":"search"},
{"field":"fn_tag","name":"W_TAG","type":"search"}
';


//글보기 스킨 수정
$desktop_model['view']		= '
{"tpl":"tag","tag_name":"table","type":"start","name":"W_VIEW_MSG","width":"20%,*","mobile_width":"80px,*","class":"table table-view"},
{"field":"fn_category1","name":"W_CATEGORY","width":"100px","display_check":"empty:none","type":"category1","class":"category"},
{"field":"fn_ext1","name":"관심분야","width":"100%","type":"checkbox","data":"전당포 창업,중고명품샵,금거래소,자격증 취득 및 취미,리셀러,시계샵,병행수입,명품 감정사","label":"전당포 창업,중고명품샵,금거래소,자격증 취득 및 취미,리셀러,시계샵,병행수입,명품 감정사"},
{"field":"fn_user_name","name":"W_NAME1","width":"200px","class":"user_name"},
{"field":"fn_phone","name":"W_MOBILE","width":"100%"},
{"tpl":"tag","tag_name":"table","type":"end"}
';

//글작성 스킨 수정
$desktop_model['write']		= '
{"tpl":"tag","tag_name":"table","type":"start","name":"W_WRITE","width":"20%,*","mobile_width":"80px,*","class":"table table-write"},
{"field":"fn_category1","name":"W_CATEGORY","width":"100%","type":"category1","class":"category"},
{"field":"fn_ext1","name":"관심분야","width":"100%","type":"checkbox","data":"전당포 창업,중고명품샵,금거래소,자격증 취득 및 취미,리셀러,시계샵,병행수입,명품 감정사","label":"전당포 창업,중고명품샵,금거래소,자격증 취득 및 취미,리셀러,시계샵,병행수입,명품 감정사"},
{"field":"fn_user_name","name":"W_NAME1","width":"100%","maxlength":"50","required":"(*)","class":"user_name","filter":"filter_admin","filter_error":"MSG_NAME_UNUSABLE"},
{"field":"fn_phone","name":"W_MOBILE","width":"100%","required":"(*)"},
{"tpl":"tag","tag_name":"table","type":"end"}
';


// Comment Model
$desktop_model['comment_list']		= '
{"field":"fn_user_name","name":"W_NAME","width":"100px","class":"cmt-name","type":"cl_name_date"},
{"field":"fn_content","name":"W_CONTENT","width":"60px","class":"cmt-content","type":"cl_content"}
';

$desktop_model['comment_write']		= '
{"tpl":"tag","tag_name":"table","type":"start","name":"W_COMMENT","width":"20%,*","mobile_width":"80px,*","class":"table table-comment"},
{"field":"fn_user_name","name":"W_WRITER","width":"157px","login":"cw_name","required":"(*)","class":"user_name","filter":"filter_admin","filter_error":"MSG_NAME_UNUSABLE"},
{"field":"fn_passwd","name":"W_PASSWORD","width":"157px","login":"none","type":"password","required":"(*)","class":"passwd"},
{"type":"kcaptcha_img","name":"W_KCAPTCHA","width":"70px","height":"30px","class":"kcaptcha","level":{"sign":"<","grade":"1"},"modify":"none","description":"<br>(MSG_CAPTCHA_INPUT)"},
{"field":"fn_content","name":"W_CONTENT","width":"100%","type":"cw_content","required":"(*)","class":"comment","required_error":"MSG_FIELD_EMPTY_ERROR2","filter":"filter_swear","filter_error":"MSG_WORD_UNUSABLE"},
{"tpl":"tag","tag_name":"table","type":"end"}
';
$desktop_model['comment_reply']	= $desktop_model['comment_write'];


// Tablet Model
$tablet_model					= $desktop_model;

// Mobile Model
$mobile_model				= $desktop_model;

$mobile_model['list']		= '
{"type":"list_check","width":"30px","level":"10","class":"list_check"},
{"field":"fn_title","name":"W_TITLE","width":"","type":"title_img","maxlength":"36","maxtext":"..","td_class":"list-title text-left"},
{"field":"fn_user_name","name":"W_WRITER","type":"search"},
{"field":"fn_content","name":"W_CONTENT","type":"search"}
';
mbw_set_filter("filter_swear","18아,18놈,18새끼,18뇬,18노,18것,18넘,개년,개놈,개뇬,개새,개색끼,개세끼,개세이,개쉐이,개쉑,개쉽,개시키,개자식,개좆,게색기,게색끼,광뇬,뇬,눈깔,뉘미럴,니귀미,니기미,니미,도촬,되질래,뒈져라,뒈진다,디져라,디진다,디질래,병쉰,병신,뻐큐,뻑큐,뽁큐,삐리넷,새꺄,쉬발,쉬밸,쉬팔,쉽알,스패킹,스팽,시벌,시부랄,시부럴,시부리,시불,시브랄,시팍,시팔,시펄,실밸,십8,십쌔,십창,싶알,쌉년,썅놈,쌔끼,쌩쑈,썅,써벌,썩을년,쎄꺄,쎄엑,쓰바,쓰발,쓰벌,쓰팔,씨8,씨댕,씨바,씨발,씨뱅,씨봉알,씨부랄,씨부럴,씨부렁,씨부리,씨불,씨브랄,씨빠,씨빨,씨뽀랄,씨팍,씨팔,씨펄,아가리,아갈이,엄창,접년,잡놈,재랄,저주글,조까,조빠,조쟁이,조지냐,조진다,조질래,존나,존니,좀물,좁년,좃,좆,좇,쥐랄,쥐롤,쥬디,지랄,지럴,지롤,지미랄,쫍빱,凸,퍽큐,뻑큐,빠큐");
mbw_set_filter("filter_admin","admin,administrator,관리자,운영자");

mbw_set_pattern("email","/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i");



//폼 글 등록시 관리자에게 이메일 보내기
//폼 답변시 작성자에게 이메일 보내기
if(!function_exists('mbw_board_send_mail_api_footer')){
	function mbw_board_send_mail_api_footer(){	
		global $mdb,$mb_fields,$mb_board_table_name,$mstore;
		$where_query			= "";
		$query_command	= "";
		$field						= $mb_fields["select_board"];

		if(mbw_get_param("mode")=="write"){
			$from					= "";
			$to						= "";
			$title						= mbw_get_param("title");
			$content				= mbw_get_param("content");

			if(mbw_get_param("board_action")=="write"){		
				$to				= mbw_get_option("admin_email");		//망보드 관리자 이메일
				if(empty($to)) $to		= get_option("admin_email");  //워드프레스 관리자 이메일
			}else if(mbw_get_param("board_action")=="reply"){
				$to				= $mdb->get_var($mdb->prepare("select ".$field["fn_email"]." from `".$mb_board_table_name."` where ".$field["fn_pid"]."=%d limit 1", mbw_get_param("board_gid")));		//작성자 이메일
			}
			if(!empty($to) && !empty($title) && !empty($content )){
				//메일 발송 이메일 설정
				add_filter( 'wp_mail_from', 'mbw_custom_wp_mail_from' );
				function mbw_custom_wp_mail_from( $email ) {
					$from		= "";
					if(mbw_get_param("board_action")=="write"){		
						$from			= mbw_get_param("email");			//작성자 이메일
						if(empty($from)) $from	= get_option("admin_email");				//워드프레스 관리자 이메일
					}else if(mbw_get_param("board_action")=="reply"){
						$from			= mbw_get_param("email");			//답변자 이메일
						if(empty($from)){
							if(mbw_get_option("admin_email")!=""){
								$from	= mbw_get_option("admin_email");		//망보드 관리자 이메일
								if(strpos($from, ',')!==false){
									$email_array	= explode(",",$from);
									$from			= $email_array[0];
								}							
							}
							else $from	= get_option("admin_email");				//워드프레스 관리자 이메일
						}
					}
					return $from;
				}
				//메일 발송 이름 설정
				add_filter( 'wp_mail_from_name', 'mbw_custom_wp_mail_from_name' );
				function mbw_custom_wp_mail_from_name( $name ) {
					if(mbw_get_param("board_action")=="write"){
						if(mbw_is_login())	
							return mbw_get_user("fn_user_name");
						else
							return mbw_get_param("user_name");
					}else if(mbw_get_param("board_action")=="reply"){
						if(mbw_is_login())	
							return mbw_get_user("fn_user_name");
						else return "";
					}
				}
				$headers			= array('Content-Type: text/html; charset=UTF-8');
				$attachments		= array();
				if(!empty($_FILES)){
					$file_data			= $mstore->get_board_files(mbw_get_param("board_pid"));
					if(!empty($file_data)){
						foreach($file_data as $file){
							$attachments[]		= MBW_UPLOAD_PATH.$file[$mb_fields["files"]["fn_file_path"]];
						}
					}
				}
				mbw_mail( $to, wp_specialchars_decode($title), nl2br($content), $headers, $attachments);
			}
		}	
	}
}
add_action('mbw_board_api_footer', 'mbw_board_send_mail_api_footer',5); 



if(!function_exists('mbw_board_skin_form_add_button')){
	function mbw_board_skin_form_add_button(){
		if(mbw_get_param("mode")=='write' && mbw_get_param("board_action")=='write'){
			mbw_set_option("use_write_button",false);
			echo '<input type="checkbox" id="chk-policy"><label for="chk-policy">개인정보처리방침에 동의합니다</label><button type="button" class="btn-search popmake-452">보기</button>';
			echo '<div class="btn-box-center">'.mbw_get_btn_template(array("name"=>"W_FORM_SUBMIT","onclick"=>"checkWriteData()","class"=>"btn btn-default btn-send-write  btn_registration")).'</div>';
		}
	}
}
add_action('mbw_board_skin_form', 'mbw_board_skin_form_add_button',5);

if(mbw_is_admin_page()){		//어드민 페이지에서만 실행
	if(mbw_get_request_mode()=="Frontend"){
		add_action('mbw_board_skin_search', 'mbw_get_date_search_template');		// 기간 설정 템플릿 추가
		add_action('mbw_board_skin_header', 'mbw_get_copy_move_template');			// 이동, 복사 템플릿 추가
	}
}else{			
	if(mbw_get_request_mode()=="Frontend"){
		//게시판 처음 화면을 글쓰기 화면으로 이동
		mbw_set_param("mode","write");
		mbw_set_param("board_action","write");

		//글작성이 완료되면 다시 글작성 페이지로 이동
		mbw_set_option("write_next_page","write");
	}

	mbw_set_board_option("fn_list_level",99);
	mbw_set_board_option("fn_view_level",99);
}

?>