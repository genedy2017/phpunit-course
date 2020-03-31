<?php
	class Invoice {
		private $items = [];

		public function __construct($data = []) {
			$this->tax = isset($data['tax']) ? $data['tax'] : 0;
			$this->discount = isset($data['discount']) ? $data['discount'] : 0;
		}

		public function addItem($item, $qty, $unitPrice) {
			$this->items[] = [
				'item' => $item,
				'qty' => $qty,
				'unitPrice' => $unitPrice
			];
		}

		public function total() {
			// subtotal - discount + tax
			$subtotal = $this->subtotal();

			return round(
				$subtotal * (1 - $this->discount / 100) * (1 + $this->tax / 100), 2
			);
		}

		public function subtotal() {
			$subtotal = 0;
			foreach ($this->items as $item) {
				$subtotal += $item['qty'] * $item['unitPrice'];
			}
			
			return round($subtotal, 2);
		}

		public function getItems() {
			$items = [];
			foreach($this->items as $item) {
				$item['price'] = $item['qty'] * $item['unitPrice'];
				$items[] = $item;
			}
			return $items;
		}
	}
