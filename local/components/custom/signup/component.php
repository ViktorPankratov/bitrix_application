<? 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(isset($_POST['submit'])){
    $user = new CUser;
    $arFields = Array(
    "NAME"              => $_POST['name'],
    "EMAIL"             => $_POST['email'],
    "LOGIN"             => $_POST['login'],
    "PASSWORD"          => $_POST['password']
    );
    $ID = $user->Add($arFields);
    if (intval($ID) > 0)
        echo "</br>" . "Пользователь успешно добавлен.";
    else
        echo $user->LAST_ERROR;
}
$this->IncludeComponentTemplate();
?>