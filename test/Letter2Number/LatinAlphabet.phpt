<?php

use Letter2Number\LatinAlphabet;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$alphabet = new LatinAlphabet();

test(function () use ($alphabet) {
	Assert::same(1, $alphabet->getNumber('A'));
	Assert::same(26, $alphabet->getNumber('Z'));
	Assert::null($alphabet->getNumber('-'));
	Assert::null($alphabet->getNumber(1));
	Assert::null($alphabet->getNumber(null));
	Assert::null($alphabet->getNumber(false));
});

test(function () use ($alphabet) {
	Assert::same('A', $alphabet->getLetter(1));
	Assert::same('Z', $alphabet->getLetter(26));
	Assert::null($alphabet->getLetter('-'));
	Assert::null($alphabet->getLetter('A'));
	Assert::null($alphabet->getLetter(null));
	Assert::null($alphabet->getLetter(false));
});

test(function () use ($alphabet) {
	Assert::true($alphabet->hasNumber(1));
	Assert::true($alphabet->hasNumber(26));
	Assert::false($alphabet->hasNumber('A'));
	Assert::false($alphabet->hasNumber('-'));
	Assert::false($alphabet->hasNumber(null));
	Assert::false($alphabet->hasNumber(false));
});

test(function () use ($alphabet) {
	Assert::true($alphabet->hasLetter('A'));
	Assert::true($alphabet->hasLetter('a'));
	Assert::true($alphabet->hasLetter('Z'));
	Assert::true($alphabet->hasLetter('z'));
	Assert::false($alphabet->hasLetter('-'));
	Assert::false($alphabet->hasLetter(1));
	Assert::false($alphabet->hasLetter(null));
	Assert::false($alphabet->hasLetter(false));
});
