<?php

abstract class AbstractEntity
{
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $key = str_replace('_', ' ', $key);     
            $explodeKey_0 = (explode(' ',$key)[0]);
            $explodeKey_1 = isset(explode(' ',$key)[1]) ? explode(' ',$key)[1] : null;
            $explodeKey_1 = ucfirst($explodeKey_1);
            $key = ucfirst($explodeKey_0) . $explodeKey_1;
            $method = 'set'. $key;
            //echo $method . "  ";

            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
        //die;
    }
}