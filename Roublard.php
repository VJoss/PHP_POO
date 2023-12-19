<?php
require_once ('Heros.php');
class Roublard extends Heros
{
            const ressources = "Combat";
            const outils = "Outils de crochetage.";
            const typeArmes = "Armes courantes, arbalète de poing, épée courte, épée longue, rapière.";
            private int $furtivite;
            private array $capacites = [];

    /**
     * @param array $capacites
     * @param int $furtivite
     */
    public function __construct(string $nomPersonnage,int $furtivite = 3)
    {
        parent::__construct($nomPersonnage,0, 1, rand(5, 20), rand(5, 20), rand(5, 20), rand(5, 20), rand(5, 20), rand(5, 20),100);

        $this->furtivite = $furtivite;

        if ($this->getForce() < 5 || $this->getDexterite() < 5 || $this->getConstitution() < 5 || $this->getIntelligence() < 5|| $this->getSagesse() < 5 || $this->getCharisme() < 5) {
            throw new \InvalidArgumentException("Les valeurs caractéristiques ne respectent pas les valeurs minimales requises pour cette classe.");
        }
        $this->assignCapacites();
    }

    protected function generateRandomStats(): void
    {
        $this->setForce(rand(5, 20)); // Statistique spécifique au Roublard
        $this->setDexterite(rand(5, 20)); // Statistique spécifique au Roublard
        $this->setConstitution(rand(5, 20)); // Statistique spécifique au Roublard
        $this->setIntelligence(rand(5, 20)); // Statistique spécifique au Roublard
        $this->setSagesse(rand(5, 20)); // Statistique spécifique au Roublard
        $this->setCharisme(rand(5, 20)); // Statistique spécifique au Roublard
    }

    public function setHerosNomPersonnage(string $nomPersonnage): void
    {
        $this->setNomPersonnage($nomPersonnage);
    }

    public function setHerosNiveau(int $niveau): void
    {
        $this->setNiveau($niveau);
        $this->assignCapacites();
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
        $this->calculPointsDeVie($constitution);
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

    public function setHerosPointsDeVie(int $vitalite): void
    {
        $this->setVitalite($vitalite);
    }

    private function assignCapacites(): void
    {
        $niveau = $this->getNiveau();
        $this->capacites = [];
        $this->furtivite = 3;
        $this->capacites[] = "Expertise, Attaque sournoise, Jargon des voleurs";
    for ($i = 2; $i <= $niveau; $i++) {
        switch ($i) {

            case 2:
                $this->capacites[] = "Ruse";
                break;

            case 3:
                $this->capacites[] = "Archétype de roublard";
                break;

            case 4:
                $this->capacites[] = "Amélioration de caractéristiques";
                break;

            case 5:
                $this->capacites[] = "Esquive instinctive";
                break;

            case 6:
                $this->capacites[] = "Expertise supèrieur";
                break;

            case 7:
                $this->capacites[] = "Esquive totale";
                break;

            case 8:
                $this->capacites[] = "Brise cote";
                break;

            case 9:
                $this->capacites[] = "Capacité de l'archétype de roublard";
                break;

            case 10:
                $this->capacites[] = "Force de la nature";
                break;

            case 11:
                $this->capacites[] = "Savoir-faire";
                break;

            case 12:
                $this->capacites[] = "Déplacement furtif";
                break;

            case 13:
                $this->capacites[] = "Sang froid";
                break;

            case 14:
                $this->capacites[] = "Perception aveugle";
                break;

            case 15:
                $this->capacites[] = "Esprit fuyant";
                break;

            case 16:
                $this->capacites[] = "Exécution";
                break;

            case 17:
                $this->capacites[] = "Poison";
                break;

            case 18:
                $this->capacites[] = "Insaisissable";
                break;

            case 19:
                $this->capacites[] = "Vole a la tire";
                break;

            case 20:
                $this->capacites[] = "Coup de chance";
                break;
        }
    }
        $this->furtivite += $niveau;
    }

    public function getCapacites(): array
    {
        return $this->capacites;
    }

    public function getFurtivite(): int
    {
        return $this->furtivite;
    }

    public function infosRoublard(): void
    {
        parent::caracteristiques();
        echo "Ressources: " . self::ressources . "\n"
            . "Capacités: " . implode(",", $this->getCapacites()) . "\n"
            . "Outils: " . self::outils . "\n"
            . "Type d'armes: " . self::typeArmes . "\n"
            . "Points de furtivité: " . $this->furtivite . "\n";
    }

}