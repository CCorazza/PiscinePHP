<?PHP
switch($_GET['action'])
{
    case 'set':
        setcookie($_GET['name'], $_GET['value'], time()+3600);
        break ;
    case 'get':
        echo $_COOKIE[$_GET['name']];        
        break ;
    case 'del':
        setcookie($_GET['name']);
        break ;
}
?>
