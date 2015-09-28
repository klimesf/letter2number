<?php


namespace Letter2Number;

/**
 * Solver of letter to number ciphers.
 * @package   Letter2Number
 * @author    Filip Klimes <filip@filipklimes.cz>
 */
class Solver
{

	/** @var Alphabet */
	protected $alphabet;

	/**
	 * Solver constructor.
	 * @param Alphabet $alphabet
	 */
	public function __construct(Alphabet $alphabet)
	{
		$this->alphabet = $alphabet;
	}

	/**
	 * Solves the ciphers and returns array of possible solutions.
	 * @param string $cipher
	 * @return array|string[]
	 */
	public function solve($cipher)
	{
		return $this->solveNumbers(str_split($cipher), new SolutionsStack());
	}

	/**
	 * Solvers the number string recursively.
	 * Works only for max 2 space numbers.
	 * @param array|int[]    $numbers
	 * @param SolutionsStack $stack
	 * @return array|string[]
	 */
	private function solveNumbers(array $numbers, SolutionsStack $stack)
	{
		// Recursion stop
		if (empty($numbers)) {
			return $stack->getSolutions();
		}

		// Shift the first two numbers from the array
		$number1 = array_shift($numbers);
		$number2 = array_shift($numbers);

		// If the second number doesn't exist add the first and return the solutions
		if (!$number2 && $number2 !== 0) {
			$stack->addLetter($this->alphabet->getLetter($number1));
			return $stack->getSolutions();
		}

		// If the bigger number isn't in the alphabet add the first and return the solutions
		if (!$this->alphabet->hasNumber($number1 . $number2)) {
			array_unshift($numbers, $number2);
			$stack->addLetter($this->alphabet->getLetter($number1));
			return $this->solveNumbers($numbers, $stack);
		}

		// Taking both numbers and making a letter
		$stack1 = clone $stack; // Clone to keep original stack clean
		$stack1->addLetter($this->alphabet->getLetter($number1 . $number2));
		$solutions1 = $this->solveNumbers($numbers, new SolutionsStack($stack1->getSolutions()));

		// Taking only the first number and returning the second to the array
		array_unshift($numbers, $number2);
		$stack->addLetter($this->alphabet->getLetter($number1));
		$solutions2 = $this->solveNumbers($numbers, new SolutionsStack($stack->getSolutions()));

		// Return merged solutions
		return array_merge($solutions1, $solutions2);
	}

}
