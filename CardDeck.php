<?php
class Card {
	public $value;
	public $suit;
	

	public function __construct ($value, $suit) {
		$this->value = $value;
		$this->suit = $suit;
		
	}
}

class Deck {
	public $deck;
	private $value;
	private $suit;

	public function __construct ($value, $suit) {
		$this->value = $value;
		$this->suit = $suit;
		$this->create_deck();
	}

	public function create_deck() {
		$this->deck = [];
		for($i = 0; $i < 4; $i++) {
			for($j = 0; $j < 13; $j++){
				$this->deck[] = new Card($this->value[$j], $this->suit[$i]); 
			}
		}
		return $this;	
	}


	public function shuffle() {
		shuffle($this->deck);
		return $this;
	}

	public function reset() {
		$this->create_deck();
		return $this;
	}

	public function draw() {
		return array_pop($this->deck);

	}
} 

$suits = ['hearts', 'diamonds', 'spades', 'clubs'];
$values = [1,2,3,4,5,6,7,8,9,10,'J','Q','K'];
$myDeck = new Deck($values, $suits);


$myDeck->shuffle()->reset()->draw();

var_dump($myDeck->shuffle()->draw());

?>