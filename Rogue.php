<?php
require_once('Characters.php');

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
        $this->abilities = [];
        $this->stealth = 3;
        $this->abilities[] = "Expertise, Attaque sournoise, Jargon des voleurs";

        for ($i = 2; $i <= $level; $i++) {
            switch ($i) {

                case 2:
                    $this->abilities[] = "Ruse";
                    break;

                case 3:
                    $this->abilities[] = "Amélioration de caractéristiques";
                    break;

                case 4:
                    $this->abilities[] = "Esquive instinctive";
                    break;

                case 5:
                    $this->abilities[] = "Uncanny Dodge";
                    break;

                case 6:
                    $this->abilities[] = "Expertise (Improved)";
                    break;

                case 7:
                    $this->abilities[] = "Evasion";
                    break;

                case 8:
                    $this->abilities[] = "Slippery Mind";
                    break;

                case 9:
                    $this->abilities[] = "Rogue Archetype Feature";
                    break;

                case 10:
                    $this->abilities[] = "Blindsense";
                    break;

                case 11:
                    $this->abilities[] = "Reliable Talent";
                    break;

                case 12:
                    $this->abilities[] = "Evasion (Improved)";
                    break;

                case 13:
                    $this->abilities[] = "Steady Aim";
                    break;

                case 14:
                    $this->abilities[] = "Blindsight";
                    break;

                case 15:
                    $this->abilities[] = "Slippery Mind (Improved)";
                    break;

                case 16:
                    $this->abilities[] = "Elusive";
                    break;

                case 17:
                    $this->abilities[] = "Rogue Archetype Feature (Improved)";
                    break;

                case 18:
                    $this->abilities[] = "Elusive (Improved)";
                    break;

                case 19:
                    $this->abilities[] = "Stroke of Luck";
                    break;

                case 20:
                    $this->abilities[] = "Cunning Action (Improved)";
                    break;
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
        print "Resources: " . self::resources . "<br>"
            . "Abilities: " . implode(",", $this->getAbilities()) . "<br>"
            . "Tools: " . self::tools . "<br>"
            . "Weapon Type: " . self::weaponType . "<br>"
            . "Stealth Points: " . $this->stealth . "<br>";
    }

}
