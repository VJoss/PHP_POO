<?php

abstract class character
{
    private string $characterName;
    private int $experience;
    private int $level;
    private int $strength;
    private int $dexterity;
    private int $constitution;
    private int $intelligence;
    private int $wisdom;
    private int $charisma;
    private int $hitPoints;

    /**
     * @param string $characterName
     */
    public function __construct(string $characterName)
    {
        $this->level = 1;
        $this->experience = 0;
        $this->characterName = $characterName;
        $this->generateRandomStats();
        $this->calculateHitPoints();
        $this->hitPoints += 100;
    }

    protected function generateRandomStats(): void
    {
        $this->setStrength(rand(5, 20));
        $this->setDexterity(rand(5, 20));
        $this->setConstitution(rand(5, 20));
        $this->setIntelligence(rand(5, 20));
        $this->setWisdom(rand(5, 20));
        $this->setCharisma(rand(5, 20));
    }

    public function calculateHitPoints(): void
    {
        // Chaque point de constitution correspond à 12 points de vie
        $this->hitPoints = $this->constitution * 12;
    }

    public function setCharacterName(string $characterName): void
    {
        $this->characterName = $characterName;
    }

    public function addExperience(int $amount): void
    {
        $this->experience += $amount;
        $this->checkLevelUp();
    }

    public function checkLevelUp(): void
    {
        $experienceThresholds = [
            100, 200, 300, 400, 500, 600, 700, 800, 900, 1000,
            1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900
        ];

        $currentLevel = $this->getLevel();
        // Vérifiez si l'expérience atteint ou dépasse le seuil pour le prochain niveau.
        if ($currentLevel < count($experienceThresholds) &&
            $this->experience >= $experienceThresholds[$currentLevel - 1])
        {
            // Augmentez le niveau et réinitialisez l'expérience
            $this->setLevel($currentLevel + 1);
            $this->experience = 0;

            echo "Congratulations! You've reached level " . ($currentLevel + 1) . "!\n";
        }
    }
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function setDexterity(int $dexterity): void
    {
        $this->dexterity = $dexterity;
    }

    public function setConstitution(int $constitution): void
    {
        $this->constitution = $constitution;
    }

    public function setIntelligence(int $intelligence): void
    {
        $this->intelligence = $intelligence;
    }

    public function setWisdom(int $wisdom): void
    {
        $this->wisdom = $wisdom;
    }

    public function setCharisma(int $charisma): void
    {
        $this->charisma = $charisma;
    }

    public function setHitPoints(int $hitPoints): void
    {
        $this->hitPoints = $hitPoints;
    }

    public function getCharacterName(): string
    {
        return $this->characterName;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function getConstitution(): int
    {
        return $this->constitution;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function getWisdom(): int
    {
        return $this->wisdom;
    }

    public function getCharisma(): int
    {
        return $this->charisma;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function getAllCharacteristics(): void
    {
        print "Character Name: " . $this->characterName . "<br>"
            . "Level: " . $this->level . "<br>"
            . "Experience: " . $this->experience . "<br>"
            . "Strength: " . $this->strength . "<br>"
            . "Dexterity: " . $this->dexterity . "<br>"
            . "Constitution: " . $this->constitution . "<br>"
            . "Intelligence: " . $this->intelligence . "<br>"
            . "Wisdom: " . $this->wisdom . "<br>"
            . "Charisma: " . $this->charisma . "<br>"
            . "Hit Points: " . $this->hitPoints . "<br>";
    }

}
