<?php
namespace App\Tests;

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase {

	public function testAddWithTwoNumberMax() {
		$empty = "";
		$sumEmpty = 0;
		$one = "1";
		$sumOne = 1;
		$two = "1,2";
		$sumTwo = 3;

		$this->assertEquals(StringCalculator::add($empty), $sumEmpty);
		$this->assertEquals(StringCalculator::add($one), $sumOne);
		$this->assertEquals(StringCalculator::add($two), $sumTwo);
	}

	public function testAddWithMoreNumbers() {
		$three = "1,2,3";
		$sumThree = 6;

		$this->assertEquals(StringCalculator::add($three), $sumThree);
	}

	public function testAddWithNewLineDelimiters() {
		$newlines = "1\n2";
		$sumNewlines = 3;

		$this->assertEquals(StringCalculator::add($newlines), $sumNewlines);
	}

	public function testAddWithCustomDelimiters() {
		$str = "//yo\n1yo2";
		$s = 3;

		$this->assertEquals(StringCalculator::add($str), $s);
	}

	public function testAddWithNegativeNumbers() {
		$str = "-1";
		$exc = \InvalidArgumentException::class;

		$this->setExpectedException($exc);
		StringCalculator::add($str);
	}
}
