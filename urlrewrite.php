<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/vacancies/vacancy/([0-9]+)#",
		"RULE" => "ELEMENT_ID=\$1",
		"ID" => "",
		"PATH" => "/vacancies/vacancy/index.php",
	),
	array(
		"CONDITION" => "#^/vacancies/([0-9]+)#",
		"RULE" => "ELEMENT_ID=\$1",
		"ID" => "",
		"PATH" => "/vacancies/index.php",
	),
);

?>