##Тестовое задание для Junior PHP Backend разработчика

Предположим, у нас есть доступ к последовательности целых чисел произвольной длины. Вся последовательность заранее неизвестна. Мы можем получать только одно число за раз (например, если читаем данные из сокета или файла). Программно мы можем оформить это в виде генератора случайных чисел:

```
$digits = function(int $length)
{
    while ($length > 0) {
        yield mt_rand();
        --$length;
    }
};
```
###Требуется:
Написать класс принимающий на вход последовательность произвольной длины n и возвращающий m самых больших чисел последовательности. Пример использования класса может быть таким:
```
$sequence = new Sequence($m);
foreach ($digits($n) as $number) {
   $sequence->add($number);
}
print_r($sequence->getMaxNumbers());
```
Или таким:
```
$sequence = new Sequence($digits($n), $m);
print_r($sequence->getMaxNumbers());
```
Ну или ваш вариант.
Добавьте в класс Sequence логирование всех основных шагов вашего алгоритма.

Код следует написать на PHP версии 7.3.* или выше.

Как будет оцениваться тестовое задание:
Корректность решения. Программа должно делать ровно то, что требуется в задании.
Оптимальность. Чем меньше программа потребляет памяти и чем быстрее она работает, тем лучше.
Чистота кода. Код будет проверяться на соответствие принципам SOLID и принципам написания “чистого” кода (т.е. насколько код читабелен и насколько легко в него можно вносить изменения).

Приемлемое время выполнения тестового задания: не более 8 часов.