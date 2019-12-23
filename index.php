<?php
Class MyClassC {
		protected $x;
//		array_push($this->x,$root);
		
		public function getX(){
			return $this->x;
		}
		public function setX($val){
			$this->x = $val;
		}
		public function lineaFindRoots($k, $b){
			if($k == 0){
				throw new RuntimeException ("Такое уравнения уже существует");
			}
			return $this->x = -$b/$k;
		}
}
Class MyClassA extends MyClassC {
	
	protected function findDiscriminant ($a,$b,$c) {
		return pow($b, 2) - 4 * $a * $c;
	}
	public function squareFindRoots($a,$b,$c) {
		if($a == 0){
			throw new $this->linearFindRoots($b, $c);
		}
		$disc = $this->findDiscriminant($a,$b,$c);
		if($disc > 0) {
			$this->x = Array(
				(-1 * $b + sqrt($disc))/(2 * $a),
				(-1 * $b - sqrt($disc))/(2 * $a)
			);
		
		}
		if($disc == 0) {
			$this->x (-1 * $b)/(2 *$a);
		}
		if ($disc < 0){
			return false;
		}
		return $this->x;
	}	

}

Class MyClassB extends MyClassA {
	public function __construct($obj1, $obj2) {
		$this->obj1 = $obj1;
		$this->obj2 = $obj2;
	}
	
	public $obj2;

}

$MyClassC = new MyClassC();
$MyClassC->linearFindRoots(6, 12);

$MyClassA = new MyClassA();
$MyClassA->squareFindRoots(6,12,5)
/*
$obj5 = new MyClassC();
$obj4 = new MyClassA($obj5);
$obj3 = new MyClassA($obj4);
$obj2 = new MyClassB($obj3,$obj5);
$obj1 = new MyClassA($obj2);
*/	
?>