<?php


if (@!include __DIR__ . '/../vendor/autoload.php') {
	echo 'Install Nette Tester using `composer install`';
	exit(1);
}

require __DIR__ . '/../src/Letter2Number/Alphabet.php';
require __DIR__ . '/../src/Letter2Number/LatinAlphabet.php';
require __DIR__ . '/../src/Letter2Number/Encoder.php';
require __DIR__ . '/../src/Letter2Number/Solver.php';
require __DIR__ . '/../src/Letter2Number/SolutionsStack.php';

function test(\Closure $function)
{
	$function();
}
