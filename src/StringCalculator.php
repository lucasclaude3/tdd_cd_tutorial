<?php
namespace App;

final class StringCalculator {

	public static function add($numbersString) {
		preg_match('/\/\/(.*)\n(.*)/', $numbersString, $matches);
		if (count($matches)) {
			$delimiter = $matches[1];
			$str = $matches[2];
		} else {
			$delimiter = "[\s,]";
			$str = $numbersString;
		}
		$numbersArray = preg_split("/" . $delimiter . "/", $str);
		$numbersArray = array_map(function ($item) { return intval($item); }, $numbersArray);
		$negatives = array_filter($numbersArray, function ($item) { return $item < 0; });
		if (count($negatives) > 0) {
			var_dump(implode(", ", $negatives));
			throw new \InvalidArgumentException('negatives not allowed: ' . implode(", ", $negatives));
		}
		return array_reduce($numbersArray, function ($agg, $item) { return $agg + $item; }, 0);
	}
}