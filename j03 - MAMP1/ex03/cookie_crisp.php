<?PHP
switch($_GET['action'])
{
    case 'set':
        setcookie($_GET['user'], $_GET['passwd']);
        break ;
    case 'get':
        echo $_COOKIE[$_GET['name']];        
        break ;
    case 'del':
        setcookie($_GET['name']);
        break ;
}
?>
