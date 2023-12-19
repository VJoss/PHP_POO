<?php

abstract class Heros
{
        private string $nomPersonnage;
        private int $experience;
        private int $niveau;
        private int $force;
        private int $dexterite;
        private int $constitution;
        private int $intelligence;
        private int $sagesse;
        private int $charisme;
        private int $vitalite;

    /**
     * @param string $nomPersonnage
     * @param int $experience
     * @param int $niveau
     * @param int $force
     * @param int $dexterite
     * @param int $constitution
     * @param int $intelligence
     * @param int $sagesse
     * @param int $charisme
     * @param int $vitalite
     */
    public function __construct(string $nomPersonnage,int $experience, int $niveau, int $force, int $dexterite, int $constitution, int $intelligence, int $sagesse, int $charisme, int $vitalite)
    {
        $this->niveau=1;
        $this->experience=0;
        $this->nomPersonnage=$nomPersonnage;
        $this->initializeStats($force, $dexterite, $constitution, $intelligence, $sagesse, $charisme);
        $this->calculPointsDeVie($constitution);
        $this->vitalite+=100;
        if ($niveau < 1 || $niveau > 20) {
            throw new \InvalidArgumentException("La valeur du niveau doit être comprise entre 1 et 20.");
        }
    }

    abstract protected function generateRandomStats(): void;

    public function calculPointsDeVie(int $constitution): void
    {
        // Chaque point de constitution correspond à 12 points de vie
        $this->vitalite = $constitution * 12;
    }

    public function setNomPersonnage(string $nomPersonnage): void
    {
        $this->nomPersonnage = $nomPersonnage;
    }

    public function addExperience(int $amount): void
    {
        $this->experience += $amount;
        $this->checkLevelUp();
    }

    public function checkLevelUp(): void
    {
        $experienceThresholds = [
            100,
            200,
            300,
            400,
            500,
            600,
            700,
            800,
            900,
            1000,
            1100,
            1200,
            1300,
            1400,
            1500,
            1600,
            1700,
            1800,
            1900
        ];

        $currentLevel = $this->getNiveau();
        // Vérifiez si l'expérience atteint ou dépasse le seuil pour le prochain niveau.
        if ($currentLevel < count($experienceThresholds) && $this->experience >= $experienceThresholds[$currentLevel - 1])
        {   // Augmentez le niveau et réinitialisez l'expérience
            $this->setNiveau($currentLevel + 1);
            $this->experience = 0;

            echo "Félicitation ! Vous avez atteint le niveau " . ($currentLevel + 1) . " !\n";
        }
    }
    public function setNiveau(int $niveau): void
    {
        $this->niveau = $niveau;
    }

    public function setForce(int $force): void
    {
        $this->force = $force;
    }

    public function setDexterite(int $dexterite): void
    {
        $this->dexterite = $dexterite;
    }

    public function setConstitution(int $constitution): void
    {
        $this->constitution = $constitution;
    }

    public function setIntelligence(int $intelligence): void
    {
        $this->intelligence = $intelligence;
    }

    public function setSagesse(int $sagesse): void
    {
        $this->sagesse = $sagesse;
    }

    public function setCharisme(int $charisme): void
    {
        $this->charisme = $charisme;
    }

    public function setVitalite(int $vitalite): void
    {
        $this->vitalite = $vitalite;
    }

    public function getNomPersonnage(): string
    {
        return $this->nomPersonnage;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function getNiveau(): int
    {
        return $this->niveau;
    }

    public function getForce(): int
    {
        return $this->force;
    }

    public function getDexterite(): int
    {
        return $this->dexterite;
    }

    public function getConstitution(): int
    {
        return $this->constitution;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function getSagesse(): int
    {
        return $this->sagesse;
    }

    public function getCharisme(): int
    {
        return $this->charisme;
    }

    public function getVitalite(): int
    {
        return $this->vitalite;
    }


    public function caracteristiques(): void
 {
     echo  "Nom de Héro: " . $this->nomPersonnage . "\n"
         . "Niveau: " . $this->niveau . "\n"
         . "Expérience: " . $this->experience . "\n"
         . "Force: " . $this->force . "\n"
         . "Dextérité: " . $this->dexterite . "\n"
         . "Constitution: " . $this->constitution . "\n"
         . "Intelligence: " . $this->intelligence . "\n"
         . "Sagesse: " . $this->sagesse . "\n"
         . "Charisme: " . $this->charisme . "\n"
         . "Points de vie: " . $this->vitalite . "\n";
 }

    public function initializeStats(int $force, int $dexterite, int $constitution, int $intelligence, int $sagesse, int $charisme): void
    {

        // Utilisation de la génération aléatoire
        $this->force = $force;
        $this->dexterite = $dexterite;
        $this->constitution = $constitution;
        $this->intelligence = $intelligence;
        $this->sagesse = $sagesse;
        $this->charisme = $charisme;


    }

}