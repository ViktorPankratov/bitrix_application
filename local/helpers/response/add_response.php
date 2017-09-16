<?
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");


	global $DB;
	$u_id = $_POST['u_id'];
	$v_id = $_POST['v_id'];
	$r_text = $_POST['r_text'];
	$res = $DB->Query('INSERT INTO v_response(
		user_id, vacancy_id, message) VALUES (
		' . $u_id . ',' . $v_id . ',"' . $r_text . '")');
	if ($res){
		$ans = '<div class="send_resp_succes"><a>Ваша вакансия принята!</a></div>';
	}else{
		$ans = '<div class="send_resp_error"><a>Произошла ошибка!</a></div>';
	}
	echo json_encode($ans);
?>