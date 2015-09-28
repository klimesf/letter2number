<?php

use Letter2Number\SolutionsStack;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {
	$stack = new SolutionsStack();
	Assert::equal([], $stack->getSolutions());
});

test(function () {
	$stack = new SolutionsStack();
	$stack->addLetter('A');
	Assert::equal(['A'], $stack->getSolutions());
});

test(function () {
	$stack = new SolutionsStack();
	$stack->addLetter('A');
	$stack->addLetter('B');
	Assert::equal(['AB'], $stack->getSolutions());
});

test(function () {
	$stack = new SolutionsStack();
	$stack->addLetter('A');
	$stack->addAlternatives(['A', 'B']);
	Assert::contains('AA', $stack->getSolutions());
	Assert::contains('AB', $stack->getSolutions());
});

test(function () {
	$stack = new SolutionsStack();
	$stack->addLetter('A');
	$stack->addAlternatives(['A', 'B']);
	$stack->addAlternatives(['C', 'D']);
	Assert::contains('AAC', $stack->getSolutions());
	Assert::contains('ABC', $stack->getSolutions());
	Assert::contains('AAD', $stack->getSolutions());
	Assert::contains('ABD', $stack->getSolutions());
});
