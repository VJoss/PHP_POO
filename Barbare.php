<?php
require_once('Characters.php');
class Barbare extends character
{
        const rage = "Rage";
        private array $capacites = [];
        const typeArmes = "Armes courantes, armes de guerre";

/**
 * @param array $capacites
 */
public function __construct(string $nomPersonnage)
{
    parent::__construct($nomPersonnage);

    if ($this->getForce() < 5 || $this->getDexterite() < 5 || $this->getConstitution() < 5 || $this->getIntelligence() < 5|| $this->getSagesse() < 5 || $this->getCharisme() < 5) {
        throw new \InvalidArgumentException("Les valeurs caractéristiques ne respectent pas les valeurs minimales requises pour cette classe.");
    }
    $this->assignCapacites();
}

    private function assignCapacites(): void
    {
        $niveau = $this->getNiveau();
        $this->capacites = [];
        $this->capacites[] = "Rage, Défense sans armure";
        for ($i = 2; $i <= $niveau; $i++) {
            switch ($i) {

                case 2:
                    $this->capacites[] = "Attaque téméraire, Sens du danger";
                    break;

                case 3:
                    $this->capacites[] = "Voie primitive";
                    break;

                case 4:
                    $this->capacites[] = "Amélioration de caractéristiques";
                    break;

                case 5:
                    $this->capacites[] = "Attaque supplémentaire, Déplacement rapide";
                    break;

                case 6:
                    $this->capacites[] = "Capacité de voie";
                    break;

                case 7:
                    $this->capacites[] = "Instinct sauvage";
                    break;

                case 8:
                    $this->capacites[] = "Brise genoux";
                    break;

                case 9:
                    $this->capacites[] = "Critique brutal (1 dé)";
                    break;

                case 10:
                    $this->capacites[] = "Capacité de voie supérieur";
                    break;

                case 11:
                    $this->capacites[] = "Rage implacable";
                    break;

                case 12:
                    $this->capacites[] = "Charge bestiale";
                    break;

                case 13:
                    $this->capacites[] = "Critique brutal (2 dés)";
                    break;

                case 14:
                    $this->capacites[] = "Sang d'ours";
                    break;

                case 15:
                    $this->capacites[] = "Rage persistante";
                    break;

                case 16:
                    $this->capacites[] = "Brise Guerre";
                    break;

                case 17:
                    $this->capacites[] = "Critique brutal (3 dés)";
                    break;

                case 18:
                    $this->capacites[] = "Puissance indomptable";
                    break;

                case 19:
                    $this->capacites[] = "Tourbillon";
                    break;

                case 20:
                    $this->capacites[] = "Champion primitif";
                    break;
            }
        }
    }

    public function setHerosNiveau(int $niveau): void
    {
        $this->setNiveau($niveau);
    }


    public function setHerosForce(int $force): void
    {
        $this->setForce($force);
    }

    public function setHerosDexterite(int $dexterite): void
    {
        $this->setDexterite($dexterite);
    }

    public function setHerosConstitution(int $constitution): void
    {
        $this->setConstitution($constitution);
    }

    public function setHerosIntelligence(int $intelligence): void
    {
        $this->setIntelligence($intelligence);
    }

    public function setHerosSagesse(int $sagesse): void
    {
        $this->setSagesse($sagesse);
    }

    public function setHerosCharisme(int $charisme): void
    {
        $this->setCharisme($charisme);
    }

    public function getCapacites(): array
    {
        return $this->capacites;
    }

    public function infosBarbare(): void
    {
        parent::GetAllCaracteristiques();
        print "Ressources: " . self::rage . "<br>"
            . "Capacités: " . implode(",", $this->getCapacites()) . "<br>"
            . "Armes: " . self::typeArmes . "<br>";
    }
}