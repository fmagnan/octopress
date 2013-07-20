<?php

function compress($compressionType, $fileName)
{
    $allowedCompressionCommands = array(
        'gz' => 'gzip -c %s.gz > %s',
        'zip' => 'zip -m -j %s.zip %s'
    );
    if (!isset($allowedCompressionCommands[$compressionType])) {
        plog_info('Pas de compression');
        return false;
    }
    $pathToFile = $this->URL . '/done/' . $fileName;
    $commandPattern = $allowedCompressionCommands[$compressionType];
    $command = sprintf($commandPattern, $pathToFile, $pathToFile);
    exec($command);
    plog_info(sprintf('compression %s OK nom:', $compressionType, $command));
    return $fileName . '.' . $compressionType;
}
