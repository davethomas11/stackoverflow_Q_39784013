<?php

// Mocked API
class Pokemon {

	private $pokemonApi = [
		1 => "I dunno pokemon",
		2 => "But I can make funny names",
		3 => "Chespin",
		4 => "CharleyChoop",
		5 => "Aron",
		6 => "Glalie",
		7 => "Luxio",
		8 => "Flareon",
		9 => "Rumbledingledong",
		10 => "Dermergoop",
		11 => "Not in text file",
		12 => "Something",
		13 => "Dermergoop",
		14 => "Normerston",
		15 => "Slombyslombyoop",
		16 => "Pokemonnamesarefun"
	];

	private $name;

	public function __construct($number) {
		if ($number > 16) {
			$this->name = "Wholey krap lots of pokemon";
		} else {
			$this->name = $this->pokemonApi[$number];
		}
	}

	public function getName() {
		return $this->name;
	}

}

// Start question askers code
$pokemonFileContents = file_get_contents("Pokemon.txt");

foreach (range(1, 718) as $number) {
    $pkmn2 = new Pokemon($number); // Note: *warning I removed namespace, don't forget to put it back
    $pkmn = $pkmn2->getName();

    // The regex checks if it matches the name
    // with a | infront or the name with a | at the end
    //
    // Also if we have a file with no | characters it is 
    // possible to have just one pokemon name
    // this is what the or checks for
    //

    $id = "pkmn";
    if (preg_match("/(\|$pkmn)|($pkmn\|)/", $pokemonFileContents) || $pokemonFileContents == $pkmn) {

    	$id .= "c";
    } 

    echo '<img src="pokemonsprites/' . $pkmn . 
    	'.gif" id="'.$id.'"/><p style="margin-left: 45px">' . $pkmn . '</p> <br>'."\n";
    


    //Needed to comment this out as well
    //don't forget it if it is important to your code
    //ob_flush();
    //flush(); //ie working must
}


