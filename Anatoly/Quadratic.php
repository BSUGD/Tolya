<?php
namespace Anatoly;
class Quadratic extends Line implements \core\EquationInterface {
  public function solve($a, $b, $c) {  // функция, решающая уравнение
    if($a == 0) {  // если а = 0, то уравнение линейное
      $this->makeSolution($b, $c);  // вызов метода, решающего линейное уравнение
      return $this->x;
    }

    Logger::log("The equation was defined as quadratic");  // добавление в массив логов строки, что уравнение определено как квадратное

    $discriminant = $this->getDiscriminant($a, $b, $c); // запись в переменную результата функции (дискриминант)

    if($discriminant < 0) {  // если дискриминант меньше 0, выбрасывается ошибка, с текстом, что корней нет
      throw new AnatolyException("Error: this equation has no real roots");
    } elseif($discriminant == 0) {  // если равен нулю, то возвращается один корень
      return $this->x = -$b/(2 * $a);
    } else {  // иначе считаются два корня, свойство $x (ответ уравнения) переделывается в массив и возвращается
      $x1 = (-$b + sqrt($discriminant))/(2 * $a);
      $x2 = (-$b - sqrt($discriminant))/(2 * $a);
      $this->x = [];
      array_push($this->x, $x1, $x2);
      return $this->x;
    }
  }

  protected function getDiscriminant($a, $b, $c) { // функция, считающая диксриминант
    return ($b * $b) - (4 * $a * $c);
  }
}
?>
