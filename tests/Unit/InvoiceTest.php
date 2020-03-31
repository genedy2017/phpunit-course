<?php
	class InvoiceTest extends \PHPUnit\Framework\TestCase {
		public static function setupBeforeClass() : void {
		}
		public static function teardownAfterClass() : void {
		}

		public function setup() : void {
			$this->invoice = new Invoice([
                               	'tax' => 14,
                                'discount' => 10
       	                ]);
 		}

		public function teardown() : void {
		}

		public function test_empty_invoice_subtotal_is_0() {
			$this->assertTrue($this->invoice->subtotal() == 0);
		}

		public function test_empty_invoice_total_is_0() {
			$this->assertTrue($this->invoice->total() == 0);
		}

		public function test_subtotal_of_invoice_with_items_is_correct() {
			$this->invoice->addItem('Abc', 2, 25.50);
			$this->invoice->addItem('Xyz', 10, 8.25);
			$this->assertTrue($this->invoice->subtotal() == 133.50);
		}

		public function test_total_of_invoice_with_items_is_correct() {
                        $this->invoice->addItem('Abc', 2, 25.50);
                        $this->invoice->addItem('Xyz', 10, 8.25);
  			$this->assertTrue($this->invoice->total() == 136.97);
		}

		public function test_getitems_method_returns_an_array() {
                        $this->invoice->addItem('Abc', 2, 25.50);
                        $this->invoice->addItem('Xyz', 10, 8.25);
			$this->assertTrue(is_array($this->invoice->getItems()));
		} 

		public function test_getitems_method_returns_2_items() {
                        $this->invoice->addItem('Abc', 2, 25.50);
                        $this->invoice->addItem('Xyz', 10, 8.25);
			$this->assertTrue(count($this->invoice->getItems()) == 2);
 		}

		public function test_getitems_returns_correct_items() {
                        $this->invoice->addItem('Abc', 2, 25.50);
                        $this->invoice->addItem('Xyz', 10, 8.25);
			$this->assertEquals($this->invoice->getItems(), [
				[
					'item' => 'Abc',
					'unitPrice' => 25.50,
					'qty' => 2,
					'price' => 51.00
				],
                                [
                                        'item' => 'Xyz',
                                        'unitPrice' => 8.25,
                                        'qty' => 10,
                                        'price' => 82.50
                                ]
 			]);
 		}
	}

