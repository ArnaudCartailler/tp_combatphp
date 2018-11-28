<?php

declare(strict_types = 1);

final class Magicien extends Character
{

    protected   $attackmagic,
                $mana = 50;

    

    public function ManaReserve(Magicien $magicien)
    {
           $magicien->attack([
            $mana = $mana - 5
           ]);
    }

      public function setMana($mana)
    {
        $mana = (int) $mana;

        if ($mana >= 0 && $mana <= 50)
        {
            $this->mana = $mana;
        }

        return $this;
    }

      public function getMana()
    {
        return $this->mana;
    }


}