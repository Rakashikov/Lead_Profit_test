<?php
/**
 * getFiles
 * 
 * Возвращает массив имен файлов в директории
 *
 * @param  string $path
 * @param  string $regex
 * @return array $files
 */
function getFiles($path, $regex)
{
    $files = array();
    $dir = opendir($path);
    while ($file = readdir($dir)) {
        if (preg_match($regex, $file)) {
            $files[] = $file;
        }
    }
    sort($files);
    closedir($dir);
    return $files;
}

$path = 'Task 3/datafiles/';
$regex = '/^\w+\.ixt/';

print_r(getFiles($path, $regex));