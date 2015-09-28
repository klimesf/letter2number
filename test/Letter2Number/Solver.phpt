<?php

use Letter2Number\Solver;
use Letter2Number\LatinAlphabet;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$solver = new Solver(new LatinAlphabet());

test(function () use ($solver) {
	$solutions = $solver->solve('1');
	Assert::same(1, count($solutions));
	Assert::contains('A', $solutions);
});

test(function () use ($solver) {
	$solutions = $solver->solve('12');
	Assert::same(2, count($solutions));
	Assert::contains('AB', $solutions);
	Assert::contains('L', $solutions);
});

test(function () use ($solver) {
	$solutions = $solver->solve('7121921');
	Assert::contains('GLSU', $solutions);
	Assert::contains('GAUIU', $solutions);
});

test(function () use ($solver) {
	$solutions = $solver->solve('7151921');
	Assert::contains('GOSU', $solutions);
});
