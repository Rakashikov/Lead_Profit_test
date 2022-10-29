<?php
/**
 * createFilesLatin
 * 
 * Создает файлы в директории
 *
 * @param  int $countFiles
 * @param  string $path
 * @return void
 */
function createFilesLatin($countFiles, $path)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    for ($i = 1; $i <= $countFiles; $i++) {
        $randomString = '';
        for ($j = 0; $j < 10; $j++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $file = fopen($path . $randomString . ".ixt", "w") or die("Unable to open file!");
        fclose($file);
    }
}

/**
 * createFilesMixed
 * 
 * Создает файлы в директории с кириллицей
 *
 * @param  int $countFiles
 * @param  string $path
 * @return void
 */
function createFilesMixed($countFiles, $path)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersCyrillic = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
    $charactersCyrillic = iconv('UTF-8', 'windows-1251', $charactersCyrillic);
    $charactersLength = strlen($charactersCyrillic);
    for ($i = 1; $i <= $countFiles; $i++) {
        $randomString = '';
        for ($j = 0; $j < 5; $j++) {
            $randomString .= $charactersCyrillic[rand(0, $charactersLength - 1)];
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $file = fopen($path . $randomString . ".ixt", "w") or die("Unable to open file!");
        fclose($file);
    }
}

createFilesLatin(10,'Task 3/datafiles/');
createFilesMixed(10,'Task 3/datafiles/');
