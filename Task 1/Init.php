<?php

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Подключаение .env файла
$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();
if (!isset($_ENV['DB_HOST'])) {
    throw new Exception('Environment variables not loaded');
}

// Подключение к БД
$conn = new mysqli($_ENV["DB_HOST"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/**
 * init
 */
final class init
{
    /**
     * __construct
     *
     * Конструктор класса init
     * 
     * @param  mixed $conn
     * @return void
     */
    public function __construct($conn)
    {
        $this->create($conn);
        $this->fill($conn);
    }

    /**
     * create
     * 
     * Создание таблицы в БД
     *
     * @param  mixed $conn
     * @return void
     */
    private function create($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS `test` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `test_value1` varchar(255) NOT NULL,
            `test_value2` varchar(255) NOT NULL,
            `test_value3` varchar(255) NOT NULL,
            `test_value4` varchar(255) NOT NULL,
            `result` varchar(255) NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $conn->query($sql);
    }

    /**
     * fill
     * 
     * Заполнение таблицы в БД
     *
     * @param  mixed $conn
     * @return void
     */
    private function fill($conn)
    {
        $sql = "INSERT INTO `test` (`test_value1`, `test_value2`, `test_value3`, `test_value4`, `result`) VALUES ";
        for ($i = 0; $i < 100; $i++) {
            $sql .= "('" . $this->randomString() . "', '" . $this->randomString() . "', '" . $this->randomString() . "', '" . $this->randomString() . "', '" . $this->randomResult() . "'),";
        }
        $sql = substr($sql, 0, -1);
        $conn->query($sql);
    }

    /**
     * get
     * 
     * Получение данных из таблицы, где result = normal или success
     *
     * @param  mixed $conn
     * @return array $data
     */
    public function get($conn)
    {
        $sql = "SELECT * FROM `test` WHERE `result` = 'normal' OR `result` = 'success'";
        $result = $conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * randomResult
     * 
     * Генерация результата из возможных вариантов (success, error, normal, warning)
     *
     * @return string $result
     */
    private function randomResult()
    {
        $result = ['success', 'error', 'normal', 'warning'];
        return $result[rand(0, 3)];
    }


    /**
     * randomString
     * 
     * Генерация случайной строки
     *
     * @return string $randomString
     */
    private function randomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

$init = new init($conn);
print_r($init->get($conn));
