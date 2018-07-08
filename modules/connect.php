<?php
define('MYSQL_SERVER' , 'localhost');
define('MYSQL_USER' , 'root');
define('MYSQL_PASSWORD' , '');
define('MYSQL_DB', 'readthose');

$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
if ($mysqli->connect_error) {
    die("<span style='display: block;
    max-width: 200px;
    text-align: center;
    margin: auto;
    background-color: #ff8888;
    padding: 15px;
    color: #FFF;
    border-radius: 4px;
    font-family: Roboto;
    margin-top: 40vh;'>Сервер не отвечает. Проверьте подключение к интернету</style>");
}
if (!$mysqli->set_charset("utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    exit();
}