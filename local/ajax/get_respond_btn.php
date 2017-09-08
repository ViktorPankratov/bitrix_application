<?
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	require($DOCUMENT_ROOT . "/bitrix/modules/main/include/prolog_before.php");

	CModule::IncludeModule("main");

	global $USER;
	if ($USER->IsAuthorized()){
		$ans = '<input type="submit" onclick="Dialog.Show();" id="responseBtn" value="Откликнуться">';
		echo json_encode($ans);
	}
	//$ans = '<a href="/vacancies/' . $_GET["idv"] . '" id="responseBtn">Откликнуться</a>';
?>



