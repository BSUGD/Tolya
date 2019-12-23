<?php
Class MyClassC {
		
}
Class MyClassA extends MyClassC {
	
	public function __construct($obj1) {
		$this->obj1 = $obj1;
	}

}

Class MyClassB extends MyClassA {
	public function __construct($obj1, $obj2) {
		$this->obj1 = $obj1;
		$this->obj2 = $obj2;
	}	
	public $obj2;
}

$obj5 = new MyClassC();
$obj4 = new MyClassA($obj5);
$obj3 = new MyClassA($obj4);
$obj2 = new MyClassB($obj3,$obj5);
$obj1 = new MyClassA($obj2);
	
?>