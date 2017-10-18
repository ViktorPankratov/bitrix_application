<?
	use Bitrix\Main\Type;
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");

	CModule::IncludeModule("employ");
	$userID = $_POST['u_id'];
	$vacancyID = $_POST['v_id'];
	$responseText = $_POST['r_text'];
	$priceFrom = $_POST['price_from'];
	$priceTo = $_POST['price_to'];
	$date = new DateTime;
	$res = ResponsesCatalog\ResponseTable::add(array(
		'USER_ID' => $userID,
		'VACANCY_ID' => $vacancyID,
		'MESSAGE' => $responseText,
		'PRICE_FROM' => $priceFrom,
		'PRICE_TO' => $priceTo,
		'CREATED' => new Type\Date($date->format('Y-m-d'), 'Y-m-d'),
	));

	if ($res->isSuccess()){
		$ans = '<div class="send_resp_succes"><a>Ваша вакансия принята!</a></div>';
	}else{
		$ans = '<div class="send_resp_error"><a>Произошла ошибка!</a></div>';
	}
	echo json_encode($ans);
?>