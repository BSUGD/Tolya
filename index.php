<?php
include "core/LogInterface.php";   // подключение всех файлов
include "core/LogAbstract.php";
include "core/EquationInterface.php";
include "Anatoly/AnatolyException.php";
include "Anatoly/Logger.php";
include "Anatoly/Line.php";
include "Anatoly/Quadratic.php";

use core\LogInterface;  // создание сокращенных имен классов, чтобы обращаться к ним без неймспейса
use core\LogAbstract;
use core\EquationInterface;
use Anatoly\Logger;
use Anatoly\AnatolyException;

echo "Enter 3 parameters a, b and c \n";
fscanf(STDIN, "%d\n", $a);  //  считывание 3 вводных чисел из командной строки
fscanf(STDIN, "%d\n", $b);
fscanf(STDIN, "%d\n", $c);

?>
