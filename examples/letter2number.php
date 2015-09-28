<?php

use Letter2Number\Solver;
use Letter2Number\Encoder;
use Letter2Number\LatinAlphabet;

include __DIR__ . '/../src/Letter2Number/Alphabet.php';
include __DIR__ . '/../src/Letter2Number/Encoder.php';
include __DIR__ . '/../src/Letter2Number/LatinAlphabet.php';
include __DIR__ . '/../src/Letter2Number/SolutionsStack.php';
include __DIR__ . '/../src/Letter2Number/Solver.php';

$shortopts = "";
$shortopts .= "e::"; // Encode
$shortopts .= "s::"; // Solve

$longopts = [
	"encode::",
	"solve::",
];

$options = getopt($shortopts, $longopts);

if (isset($options['solve']) || isset($options['s'])) {
	$solver = new Solver(new LatinAlphabet());
	foreach ($solver->solve(array_pop($argv)) as $solution) {
		print_r($solution . "\n");
	}
	exit(0);
}

if (isset($options['encode']) || isset($options['e'])) {
	$encoder = new Encoder(new LatinAlphabet());
	print_r($encoder->encode(array_pop($argv)) . "\n");
	exit(0);
}
