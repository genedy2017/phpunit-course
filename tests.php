<?php
	include('bootstrap.php');

	$testInvoice = new Invoice([
		'tax' => 14, // 14%
		'discount' => 10 // 10%
	]);

	function test($name, $test) {
		if($test === true) {
			echo "Test '$name': PASS\n";
		} else {
			echo "Test '$name': FAIL\n";
		}
	}

	// test #1: subtotal is 0 if no items
	test('subtotal is 0 if no items', $testInvoice->subtotal() == 0);
	test('total is 0 if no items', $testInvoice->total() == 0);

	$testInvoice->addItem('Abc', 2, 25.50);
	$testInvoice->addItem('Xyz', 10, 8.25);

	test('subtotal is correct when invoice has items', $testInvoice->subtotal() == 133.50);
	test('total is correct when invoice has items', $testInvoice->total() == 136.97);


