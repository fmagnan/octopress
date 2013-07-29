<?php

function levelToReset($currentLevel)
{
    //$modulo représente le nombre de niveau passé après le dernier palier
    $modulo = $currentLevel % STEP;
    //Si on est au palier
    if ($modulo == 0) {
        //Si le niveau actuel est supérieur au premier palier
        if ($currentLevel > STEP) {
            //On descend au niveau du palier inférieur
            $currentLevel -= STEP;
        } else {
            //On redescend au premier niveau
            $currentLevel = 1;
        }
    } else {
        //On descend au palier inférieur
        $currentLevel -= $modulo;
    }
    //Si level == 0, on initialise à 1
    if ($currentLevel == 0) {
        $currentLevel = 1;
    }

    return $currentLevel;
}