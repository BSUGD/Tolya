<?php
namespace Anatoly;
class Line {
  protected $x; // свойство, в котором будет находиться ответ уравнения

  public function makeSolution($a, $b) {  // функция, решающая линейное уравнение
    if($a == 0) {  // если коэфицииент а равен нулю, то выбрасывается ошибка, что уравнения не существует
      throw new AnatolyException("It was defined that such an equation doesn't exist \n");
    } 

    Logger::log("The equation was defined as line");   // добавление в массив логов строки, что уравнение определено линейным
    return $this->x = array(-$b/$a);  // возврашение ответа и подсчет его
  }
}
?>
