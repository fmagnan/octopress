<?php

/**
 * Updates data by primary key
 * @param array $data
 * @param int $pkValue
 * @param boolean $lock default value FALSE
 */
function updateById($datas, $pkValue, $lock = false)
{
    updateRowById('table', $datas, 'id', $pkValue, 1, $lock);
}