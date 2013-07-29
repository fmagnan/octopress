<?php

/**
 * get the folder ID
 * @param    string    rowID ex 11345
 * @return    string    folderID ex 11000
 */
function getFolderFromId($_rowId, $precision = -3)
{
    //round to half down
    $_rowId = substr_replace($_rowId, '1', $precision, 1);
    return round($_rowId, $precision);
}

/**
 * Compress AND serialize data
 */
function compress($data)
{
    return base64_encode(gzcompress(serialize($data)));
}