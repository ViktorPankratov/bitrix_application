<?
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");

	CModule::IncludeModule("main");

	global $USER;
	global $DB;

	if ($USER->IsAuthorized()){
		$idv = $_GET['idv'];
		$res = $DB->query('SELECT COUNT(*) FROM v_response WHERE user_id = ' . $USER->GetID() . ' AND vacancy_id = ' . $idv .'');
		$res = $res->getNext();
		if( $res['COUNT(*)'] < 0 ){
			$ans = '<a>Вы откликнулись</a>';
		}else{
			$ans = '<a href="#response" id="open_modal">Откликнуться</a>';
			// $ans = '<input type="submit" onclick="Dialog.Show();" id="responseBtn" value="Откликнуться">';
		}
		echo json_encode($ans);
	}
?>



