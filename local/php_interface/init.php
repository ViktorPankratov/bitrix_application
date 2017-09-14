<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/

CModule::IncludeModule("main");
CModule::AddAutoloadClasses(
    '',
    array(
        'VacancyAgent' => '/local/agents/VacancyAgent.php',
        'Bitrix\Modules\Iblock' => '/bitrix/modules/iblock/iblock.php',
        )
);
VacancyAgent::updateActive();
?>
