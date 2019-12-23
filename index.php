<?php
define('BASEURI', __DIR__);
include BASEURI . "/core/LogInterface.php";   // подключение всех файлов
include BASEURI . "/core/LogAbstract.php";
include BASEURI . "/core/EquationInterface.php";
include BASEURI . "/Anatoly/AnatolyException.php";
include BASEURI . "/Anatoly/Logger.php";
include BASEURI . "/Anatoly/Line.php";
include BASEURI . "/Anatoly/Quadratic.php";

use core\LogInterface;  // создание сокращенных имен классов, чтобы обращаться к ним без неймспейса
use core\LogAbstract;
use core\EquationInterface;
use Anatoly\Logger;
use Anatoly\AnatolyException;

Logger::log("Current version: " . file_get_contents("version"));
echo "Enter 3 parameters a, b and c \n";
fscanf(STDIN, "%d\n", $a);  //  считывание 3 вводных чисел из командной строки
fscanf(STDIN, "%d\n", $b);
fscanf(STDIN, "%d\n", $c);

//  проверка является ли каждое из введенных integer или float (целым или числом с десятичной дробью), иначе говоря, будет считать уравнение, только если введены числа
if(!((is_int($a) || is_float($a)) && (is_int($b) || is_float($b)) && (is_int($c) || is_float($c)))) {
  Logger::log("Enter only numbers");
} else {
  Logger::log("The entered equation is " . $a . "x^2 + " . $b . "x + " . $c . " = 0");  // добавление в массив логов строки с уравнением
  $equation = new Anatoly\Quadratic();
  try {
    $solution = $equation->solve($a, $b, $c);  // запись в $solution корней уравнения (если нет ошибки)

	//if(is_array($solution, true)) {
      Logger::log("Equation solution: " . implode(",", $solution)); // добавление в массив логов строки с корнями
    //} //else {
      //Logger::log("Equation solution: " . $solution);  // добавление в массив логов строки с ОДНИМ корнем
    //}
  } catch(AnatolyException $e) {  // если возникла ошибка класса AnatolyException (уравнение не существует или нет корней), то текст ошибки добавляется в конец массива логов
    Logger::log($e->getMessage());
  }


}
Logger::write();  // вывод всех логов на экран
?>
