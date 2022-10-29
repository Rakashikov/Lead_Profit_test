# Тестовое задание
**Задача №1.**
Написать класс init, от которого нельзя сделать наследника, состоящий из 3 методов:
- **create()**
- доступен только для методов класса
- создает таблицу test, содержащую 5 полей:
- **fill()**
- доступен только для методов класса
- заполняет таблицу случайными данными
- **get()**
- доступен извне класса
- выбирает из таблицы test, данные по критерию: result среди значений 'normal' и 'success'

В конструкторе выполняются методы **create** и **fill**
Весь код должен быть прокомментирован в стиле PHPDocumentor'а.

**Задача №2.**
Знания MySQL + оптимизировать запросыИмеется 3 таблицы: **info, data, link,** есть запрос для получения данных:select * from data,link,info where link.info_id = info.id and link.data_id = data.id**предложить варианты оптимизации:
- таблиц
- запроса.
**Запросы для создания таблиц:**

CREATE TABLE `info` (
        `id` int(11) NOT NULL auto_increment,
       `name` varchar(255) default NULL,
        `desc` text default NULL,
        PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

CREATE TABLE `data` (
        `id` int(11) NOT NULL auto_increment,
        `date` date default NULL,
        `value` INT(11) default NULL,
        PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

CREATE TABLE `link` (
        `data_id` int(11) NOT NULL,
        `info_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

**Задача №3.**

Создать скрипт, который в папке /datafiles найдет все файлы, имена которых состоят из цифр и букв латинского алфавита, имеют расширение ixt и выведет на экран имена этих файлов, упорядоченных по имени.Задание должно быть выполнено с использованием регулярных выражений.Весь код должен быть прокомментирован в стиле PHPDocumentor'а.

**Задача №4.**

Cоздать 3 кнопки с названиями 1, 2, 3, расположенные друг над другом.
**Начальный вид:**

123

**Нажали на любую кнопку, меняется порядок на:**

231

**Нажали на любую кнопку, меняется порядок на:**

321

**Нажали на любую кнопку, меняется порядок на:**

123

Код должен быть написан с ипользованием библиотеки jQuery.
