<?php

function compress($fct, $fichier)
{
    switch ($fct) {
        case 'gzip' :
            $res = $fichier . ".gz";
            exec($fct . " -c " . $this->URL . "/done/" . $fichier . " > " . $this->URL . "/done/" . $res);
            plog_info('compression OK gzip nom:' . $res);
            break;
        case 'zip'  :
            $res = $fichier . ".zip";
            exec($fct . " -m -j " . $this->URL . "/done/" . $res . " " . $this->URL . "/done/" . $fichier);
            plog_info('compression OK zip nom:' . $fct . " -m " . $this->URL . "/done/" . $fichier . " " . $this->URL . "/done/" . $fichier);
            break;
        default    :
            plog_info('Pas de compression');
    }
    return $res;
}