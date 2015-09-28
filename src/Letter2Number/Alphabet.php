<?php


namespace Letter2Number;

/**
 * Interface for any letter to number alphabet.
 * @package   Letter2Number
 * @author    Filip Klimes <filip@filipklimes.cz>
 */
interface Alphabet
{

	/**
	 * Returns number of the given letter.
	 * @param string $letter
	 * @return int|null Number of the letter or null if the letter is not in the alphabet.
	 */
	public function getNumber($letter);

	/**
	 * Returns letter for the given number.
	 * @param int $number
	 * @return string|null The letter or null if the number is not in the alphabet.
	 */
	public function getLetter($number);

	/**
	 * Returns true if the given number is in the alphabet, false otherwise.
	 * @param int $number
	 * @return bool
	 */
	public function hasNumber($number);

	/**
	 * Returns true if the given letter is in the alphabet, false otherwise.
	 * @param string $letter
	 * @return bool
	 */
	public function hasLetter($letter);

}
