<?php


namespace Letter2Number;

/**
 * Encodes given strings using letter to number cipher.
 * @package   Letter2Number
 * @author    Filip Klimes <filip@filipklimes.cz>
 */
class Encoder
{

	/** @var Alphabet */
	protected $alphabet;

	/**
	 * Encoder constructor.
	 * @param Alphabet $alphabet
	 */
	public function __construct(Alphabet $alphabet)
	{
		$this->alphabet = $alphabet;
	}

	/**
	 * Encodes the given string and returns the numeral representation.
	 * @param $string
	 * @return string
	 */
	public function encode($string)
	{
		$result = "";
		foreach (str_split(strtoupper($string)) as $character) {
			$result .= $this->alphabet->getNumber($character);
		}
		return $result;
	}

}
