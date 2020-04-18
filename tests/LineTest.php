<?php
namespace Anatoly;

use PHPUnit\Framework\TestCase;
include __DIR__ . "/../core/LogInterface.php";
include __DIR__ . "/../core/LogAbstract.php";
include __DIR__ . "/../core/EquationInterface.php";
include __DIR__ . "/../anatoly/AnatolyException.php";
include __DIR__ . "/../anatoly/Logger.php";
include __DIR__ . "/../anatoly/Line.php";

final class LineTest extends TestCase
{
    /**
    * @dataProvider providerMakeSolution
    */
    public function testMakeSolution($a, $b, $expect) {
      $equation = new Line();
      $this->assertEquals($expect, $equation->makeSolution($a, $b));
    }

    public function providerMakeSolution() {
      return array(
            array(5, 2, [-0.4]),
            array(6, -18, [3]),
            array(100, -25, [0.25])
      );
    }

    /**
    * @dataProvider providerMakeSolutionEx
    */
    public function testMakeSolutionEx($a, $b) {
      $this->expectException(AnatolyException::class);
      $equation = new Line();
      $equation->makeSolution($a, $b);
    }

    public function providerMakeSolutionEx() {
      return array(
        array('string', 1),
        array(0, null),
        array(0, 0),
        array(1, 'string')
      );
    }
}
