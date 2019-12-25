<?php
namespace Anatoly;
class Logger extends \core\LogAbstract implements \core\LogInterface {
  public static function log($str) {
    array_push(self::Instance()->log, $str);  //  добавление желаемого текста в массив логов
  }

  public static function write() {  // метод вывода логов, к которому будем обращаться
    array_push(self::Instance()->log, '');  //  добавление в конец массива пустого элемента, чтобы в конце вывода тоже был перенос строки
    self::Instance()->_write();   //   вызов метода, который непосредственно выводит на экран текст, но к которому нельзя обратиться за пределами этого класса
  }

  public function _write() {  // метод, соединяющий массив логов в строку(\n - перенос строки, вставляется между всеми элементами) и выводящий ее на экран
    $logName = new \DateTime();
    $logName = $logName->format('d.m.Y_H,i,s') . ".log";
	
	if(!is_dir("Log")) {
		mkdir("Log");
	}
	
    file_put_contents(BASEURI . "/Log/" . $logName, implode("\n\r", self::Instance()->log));
    print_r(implode("\n", self::Instance()->log));
  }
}
?>
