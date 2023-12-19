<?php

class Quest
{
    public function awardExperience(Heros $hero, int $amount): void
    {
        $hero->addExperience($amount);
    }

    public function completeQuest(Heros $hero): void
    {

        $this->awardExperience($hero, 50);

    }
}