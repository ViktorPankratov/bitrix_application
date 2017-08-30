<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/
CModule::AddAutoloadClasses(
    '',
    array(
        'Local\Agents\VacancyAgent' => '/local/agents/VacancyAgent.php',
        )
);
Local\Agents\VacancyAgent::updateActive();
?>