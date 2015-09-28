# letter2number
Letter to number cipher encoder and solver.

Lets you encode and solve letter to number ciphers.

You can implement your own alphabet or use the default LatinAlphabet which is provided
in the package.

Usage
=====

Create your own encoder:

```php
$alphabet = new \Letter2Number\LatinAlphabet(); // Or provide your own implementation of Letter2Number\Alphabet
$encoder = new \Letter2Number\Encoder($alphabet);
echo $encoder->encode("GOSU");
```

or your own solver:

```php
$alphabet = new \Letter2Number\LatinAlphabet(); // Or provide your own implementation of Letter2Number\Alphabet
$solver = new \Letter2Number\Solver($alphabet);
foreach ($solver->solve('7151921') as $solution) {
	echo $solution . "\n";
}
```

Latin2Number Example
====================

Encode
------

```sh
php examples/letter2number.php --encode GOSU
7151921
```


Solve
-----

```sh
php examples/letter2number.php --solve 7151921
GOSU
GOSBA
GOAIU
GOAIBA
GAESU
GAESBA
GAEAIU
GAEAIBA
```
