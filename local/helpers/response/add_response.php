<?
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");

	CModule::IncludeModule('employ');
	$u_id = $_POST['u_id'];
	$v_id = $_POST['v_id'];
	$r_text = $_POST['r_text'];
	$price_from = $_POST['price_from'];
	$price_to = $_POST['price_to'];
	$res = ResponsesCatalog\ResponseTable::add(array(
		'user_id' => $u_id,
		'vacancy_id' => $v_id,
		'message' => $r_text,
		'price_from' => $price_from,
		'price_to' => $price_to
	));

	if ($res->isSuccess()){
		$ans = '<div class="send_resp_succes"><a>Ваша вакансия принята!</a></div>';
	}else{
		$ans = '<div class="send_resp_error"><a>Произошла ошибка!</a></div>';
	}
	echo json_encode($ans);
?>