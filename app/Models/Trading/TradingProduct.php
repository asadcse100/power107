<?php

namespace App\Models\Trading;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Product;

class TradingProduct extends Model
{
	protected function getProductTrading()
	{
		$getProduct = [];
		$getUnitPrice = [];
		$getUnitPurchasePrice = [];
		$addPrice = 0;
		$data = [];
		$PureProductName = [];
		$productName = [];
		$nameArray = [];

		$product = Product::with(['brand', 'user', 'orderDetails', 'reviews', 'wishlists', 'stocks'])
				->where('trading_approval',1)
				->where('category_id', 1)
				->where('published', 1)
				->where('current_stock', '>', 0)
				->get();
		//$order = Order::with(['orderDetails', 'refund_requests', 'pickup_point', 'user'])->get();
		//dd($product->toArray());
		//$product_model = 'Onion in';		
		//Product price filtering and product Name filtering now this section need search qurey like %keyword% qurey this get proper data from database
		foreach ($product as $key => $value) {
			if(!empty($value->product_model)){
				$getProduct[$key] = Product::select('name', 'product_model')
				->where('product_model', $value->product_model)->get();
				
				foreach ($getProduct as $pdtkey => $pdt) {
					foreach ($pdt as $keyp => $productN) {
						$productName[$keyp] = $productN['name'];
						//dd($productN);
						$nameArray = Array(max($productName));
					}
				}
				$PureProductName[$keyp] = preg_replace('/[^A-Za-z0-9\ ]/', '', str_replace(' ', ' ', $nameArray));
				$getUnitPrice[$key] = $value->unit_price;				
				$getUnitPurchasePrice[$key] = $value->purchase_price;
				$priceCount = count($getUnitPrice);
				$addPrice += $value->unit_price;				
				$avgPrice = $addPrice / $priceCount;
				//set by admin persecnt 
				// check for add new trading price by seller
				$maxPriceAdd = $avgPrice + 10;
				$minPriceAdd = $avgPrice - 10;
	 		}
		}

		if(isset($PureProductName) && !empty($PureProductName)){
			$data['groupByProductName'] = $PureProductName;
			$data['maxPriceAdd'] = $maxPriceAdd;
			$data['minPriceAdd'] = $minPriceAdd;
			$data['products'] = $product;
		}
		// dd($data);
		if($data > 0){
			return $data;
		}else{
			return null;
		}
		
	}

	protected function liveTrade()
	{
		$group_product_id = 1;
		$type = 'sell';
		$day = 7;
		$i = 0;
		$data = [];
		$liveTrade = [];
		$arrData = [];
		$p = 0;
		$open = [];
		$high = [];
		$low = [];
		$close = [];
		$arrPrice = [];
		$time = [];
		$dd = 15;
		$j = 0;

		$count = TradingProduct::pluck('id', 'created_at')->toArray();
		$date_arr = array_flip($count);
		usort($date_arr, function($a, $b) {
			$dateTimestamp1 = strtotime($a);
			$dateTimestamp2 = strtotime($b);
			return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
		});
		if($date_arr){
			$start_date = Carbon::now();
			$end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date_arr[0]);
			$different_days = $start_date->diffInHours($end_date);
			$currentTime = [];
			// dd($different_days);
			for($i=0; $i<$different_days; $i=$i+$day){
					
				$data = TradingProduct::where('group_product_id', $group_product_id)
				->whereBetween(TradingProduct::raw('date(created_at)'), [Carbon::now()->subHours($i+$day), Carbon::now()->subHours($i)])
				->orderBy('created_at', 'ASC')
				->get();			
					foreach ($data as $key => $value) {
							if(!empty($value->price)){
							$arrPrice[$key] = $value->price;
							$time[] = $value->created_at;
							$open = reset($arrPrice);
							$high = max($arrPrice);
							$low = min($arrPrice);
							$close = last($arrPrice);
							$start_date_time = Carbon::now()->subHours($j);
							$end_date_time = Carbon::now()->subHours($j+$dd);
							$different_days_time = $start_date_time->diffInHours($end_date_time);
							$currentTime = $start_date_time->subHours($different_days_time);
							$j = $j+$dd;
						}
						$liveTrade[] = ['x' => Carbon::parse($currentTime)->format('D M d Y H:i:s \G\M\TO'), 'y' => [$open, $high, $low, $close]];
					$p++;
				}
			}
		}
		//  dd($liveTrade);
		if($liveTrade > 0){
			return $liveTrade;
		}else{
			return null;
		}
	}

	protected function test()
	{
		$tradingProduct = TradingProduct::where('product_model', $product_model)->get();
		dd($tradingProduct);
		$sellCount = 0;
		$buyCount = 0;
		foreach ($tradingProduct as $tradekey => $trading) {
			if($trading->type == 'sell'){
				$sellCount += $trading->unit;
				// $s_count = count($sellCount);
			}
			if($trading->type == 'buy'){
				$buyCount += $trading->unit;
			}
		}

		if($sellCount > $buyCount){
			// Up Price
			$newPrice = $avgPrice + $sellCount/$buyCount;
		}elseif ($sellCount < $buyCount) {
			// Down Price
			$newPrice = $avgPrice - $sellCount/$buyCount;
		}else{
			//Same price
			$newPrice = $avgPrice;
		}
		//dd($newPrice);
	}

}
