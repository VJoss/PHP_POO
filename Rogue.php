<?php
require_once('Characters.php');
require_once 'constants.php';

class Rogue extends character
{
    const resources = "Combat";
    const tools = "Outils de crochetage.";
    const weaponType = "Armes courantes, arbalète de poing, épée courte, épée longue, rapière.";
    private int $stealth;
    private array $abilities = [];

    /**
     * @param array $abilities
     * @param int $stealth
     */
    public function __construct(string $characterName, int $stealth = 3)
    {
        parent::__construct($characterName);

        $this->stealth = $stealth;

        if ($this->getStrength() < 5 || $this->getDexterity() < 5 || $this->getConstitution() < 5 || $this->getIntelligence() < 5 || $this->getWisdom() < 5 || $this->getCharisma() < 5) {
            throw new \InvalidArgumentException("Characteristic values do not meet the minimum requirements for this class.");
        }
        $this->assignAbilities();
    }

    public function setHeroCharacterName(string $characterName): void
    {
        $this->setCharacterName($characterName);
    }

    public function setHeroLevel(int $level): void
    {
        $this->setLevel($level);
        $this->assignAbilities();
    }

    public function setHeroStrength(int $strength): void
    {
        $this->setStrength($strength);
    }

    public function setHeroDexterity(int $dexterity): void
    {
        $this->setDexterity($dexterity);
    }

    public function setHeroConstitution(int $constitution): void
    {
        $this->setConstitution($constitution);
        $this->calculateHitPoints($constitution);
    }

    public function setHeroIntelligence(int $intelligence): void
    {
        $this->setIntelligence($intelligence);
    }

    public function setHeroWisdom(int $wisdom): void
    {
        $this->setWisdom($wisdom);
    }

    public function setHeroCharisma(int $charisma): void
    {
        $this->setCharisma($charisma);
    }

    public function setHeroHitPoints(int $hitPoints): void
    {
        $this->setHitPoints($hitPoints);
    }

    private function assignAbilities(): void
    {
        $level = $this->getLevel();
        $this->abilities = ["Expertise", "Attaque sournoise", "Jargon des voleurs"];

        $abilityList = require 'constants.php';

            for ($i = 2; $i <= $level; $i++) {
                if (isset($abilityList['abilitiesRogue'][$i])) {
                    $this->abilities[] = $abilityList['abilitiesRogue'][$i];
                }
            }


        $this->stealth += $level;
    }

    public function getAbilities(): array
    {
        return $this->abilities;
    }

    public function getStealth(): int
    {
        return $this->stealth;
    }

    public function rogueInfo(): void
    {
        parent::getAllCharacteristics();
        print "Resources: " . self::resources . "\n"
            . "Abilities: " . implode(",", $this->getAbilities()) . "\n"
            . "Tools: " . self::tools . "\n"
            . "Weapon Type: " . self::weaponType . "\n"
            . "Stealth Points: " . $this->stealth . "\n";
    }

}
