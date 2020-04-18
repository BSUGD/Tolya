<?php
namespace Anatoly;

use PHPUnit\Framework\TestCase;
include __DIR__ . "/../anatoly/Quadratic.php";

final class QuadraticTest extends TestCase
{
    /**
    * @dataProvider providerSolve
    */
    public function testSolve($a, $b, $c, $expect) {
      $equation = new Quadratic();
      $this->assertEquals($expect, $equation->solve($a, $b, $c));
    }

    public function providerSolve() {
      return array(
            array(1, 10, -24, [2, -12]),
            array(1, 3, 2, [-1, -2]),
            array(2, -9, 0, [4.5, 0]),
      );
    }

    /**
    * @dataProvider providerSolveEx
    */
    public function testSolveEx($a, $b, $c) {
      $this->expectException(AnatolyException::class);
      $equation = new Quadratic();
      $equation->solve($a, $b, $c);
    }

    public function providerSolveEx() {
      return array(
            array(16, 4, 20),
            array(0, 0, 5),
            array(null, null, 10),
            array(5, 'somestring', 15),
            array(5, 19, 'aaaaa')
      );
    }
}
