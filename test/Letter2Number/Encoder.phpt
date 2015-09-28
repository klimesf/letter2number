<?php

use Letter2Number\Encoder;
use Letter2Number\LatinAlphabet;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$encoder = new Encoder(new LatinAlphabet());

test(function () use ($encoder) {
	Assert::same('1234', $encoder->encode('ABCD'));
	Assert::same('262524', $encoder->encode('ZYX'));
	Assert::same('1', $encoder->encode('A-12'));
});
