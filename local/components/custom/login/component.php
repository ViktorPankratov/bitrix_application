<? 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
require($_SERVER["DOCUMENT_ROOT"]."/local/layouts/login/login.php");
if(isset($_POST['submit']))
{
    global $USER;
    if (!is_object($USER)) $USER = new CUser;
    $arAuthResult = $USER->Login($_POST['login'], $_POST['password'], "Y");
    if($arAuthResult === true)
    {
        $USER->Authorize();
        LocalRedirect("/");
    }else{
        ShowMessage($arAuthResult);
    }
}
?>