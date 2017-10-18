<? 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(isset($_POST['submit']))
{
    global $USER;
    $USER = new CUser;
    $arAuthResult = $USER->Login($_POST['login'], $_POST['password'], "Y");
    if($arAuthResult === true)
    {
        $USER->Authorize();
        LocalRedirect("/");
    }else{
        ShowMessage($arAuthResult);
    }
}
$this->IncludeComponentTemplate();
?>