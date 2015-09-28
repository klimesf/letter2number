<?php


namespace Letter2Number;

/**
 * Basic Latin Alphabet implementation.
 * @package   Letter2Number
 * @author    Filip Klimes <filip@filipklimes.cz>
 */
class LatinAlphabet implements Alphabet
{

	/** @var array|int[] */
	protected $letter2Number = [
		'A' => 1,
		'B' => 2,
		'C' => 3,
		'D' => 4,
		'E' => 5,
		'F' => 6,
		'G' => 7,
		'H' => 8,
		'I' => 9,
		'J' => 10,
		'K' => 11,
		'L' => 12,
		'M' => 13,
		'N' => 14,
		'O' => 15,
		'P' => 16,
		'Q' => 17,
		'R' => 18,
		'S' => 19,
		'T' => 20,
		'U' => 21,
		'V' => 22,
		'W' => 23,
		'X' => 24,
		'Y' => 25,
		'Z' => 26,
	];

	/** @var array|int[] */
	protected $number2Letter;

	/**
	 * LatinAlphabet constructor.
	 */
	public function __construct()
	{
		$this->number2Letter = array_flip($this->letter2Number);
	}

	/**
	 * Returns number of the given letter.
	 * @param string $letter
	 * @return int|null Number of the letter or null if the letter is not in the alphabet.
	 */
	public function getNumber($letter)
	{
		$letter = strtoupper($letter);
		if (!$this->hasLetter($letter)) {
			return null;
		}
		return $this->letter2Number[$letter];
	}

	/**
	 * Returns letter for the given number.
	 * @param int $number
	 * @return string|null The letter or null if the number is not in the alphabet.
	 */
	public function getLetter($number)
	{
		if (!$this->hasNumber($number)) {
			return null;
		}
		return $this->number2Letter[$number];
	}

	/**
	 * Returns true if the given number is in the alphabet, false otherwise.
	 * @param int $number
	 * @return bool
	 */
	public function hasNumber($number)
	{
		// isset() is the fastest function to search array for a key
		// http://maettig.com/1397246220
		return isset($this->number2Letter[$number]);
	}

	/**
	 * Returns true if the given letter is in the alphabet, false otherwise.
	 * @param string $letter
	 * @return bool
	 */
	public function hasLetter($letter)
	{
		// isset() is the fastest function to search array for a key
		// http://maettig.com/1397246220
		$letter = strtoupper($letter);
		return isset($this->letter2Number[$letter]);
	}

}
