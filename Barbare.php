<?php
require_once ('Characters.php');

class Barbarian extends Character
{
    const rage = "Rage";
    private array $abilities = [];
    const weaponType = "Common weapons, war weapons";

    /**
     * @param array $abilities
     */
    public function __construct(string $characterName)
    {
        parent::__construct($characterName);

        if ($this->getStrength() < 5 || $this->getDexterity() < 5 || $this->getConstitution() < 5 || $this->getIntelligence() < 5|| $this->getWisdom() < 5 || $this->getCharisma() < 5) {
            throw new \InvalidArgumentException("Characteristic values do not meet the minimum requirements for this class.");
        }
        $this->assignAbilities();
    }

    private function assignAbilities(): void
    {
        $level = $this->getLevel();
        $this->abilities = ["Rage", "Défense sans armure"];

        $abilityList = require 'constants.php';

        for ($i = 2; $i <= $level; $i++) {
            if (isset($abilityList['abilitiesBarbarian'][$i])) {
                $this->abilities[] = $abilityList['abilitiesBarbarian'][$i];
            }
        }
    }

    public function setHeroLevel(int $level): void
    {
        $this->setLevel($level);
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

    public function getAbilities(): array
    {
        return $this->abilities;
    }

    public function barbarianInfo(): void
    {
        parent::getAllCharacteristics();
        echo "Resources: " . self::rage . "\n"
            . "Abilities: " . implode(",", $this->getAbilities()) . "\n"
            . "Weapons: " . self::weaponType . "\n";
    }
}
