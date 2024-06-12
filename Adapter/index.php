<?php


interface Duck
{
    // Утки крякают
    public function quack();

    // и летают
    public function fly();
}

interface Turkey
{
    // Индюшки не крякают (у них нет метода quack())
    public function gobble();

    // но могут летать, хотя и недалеко
    public function fly();
}

class MallardDuck implements Duck
{
    public function quack(): void
    {
        echo "MallardDuck quack\n";
    }

    public function fly(): void
    {
        echo "MallardDuck fly\n";
    }
}

// Конкретная реализация обобщенного класса Turkey; как и класс MallardDuck, она просто выводит описания своих действий
class WildTurkey implements Turkey
{

    public function gobble(): void
    {
        echo "WildTurkey gobble\n";
    }


    public function fly(): void
    {
        echo "WildTurkey fly\n";
    }
}

// Реализация адаптера

// Прежде всего необходимо реализовать интерфейс того типа, на который рассчитан ваш клиент
class TurkeyAdapter implements Duck
{

    private Turkey $turkey;

    // Затем следует получить ссылку на адаптируемый объект; обычно это делается в конструкторе
    public function __construct(Turkey $turkey)
    {
        $this->turkey = $turkey;
    }

    // Адаптер должен реализовать все методы интерфейса. Преобразование quack() между классами выполняется просто - реализация вызывает gobble()
    public function quack(): void
    {
        $this->turkey->gobble();
    }

    // Хотя метод fly() входит в оба интерфейса, индюшка не умеет летать на дальние расстояния. Чтобы устанновить соответствие между этими методами, мы вызываем метод fly() класса Turkey три раза
    public function fly(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $this->turkey->fly();
        }
    }
}

// Тестирование адаптера
$mallardDuct = new MallardDuck();

$wildTurkey = new TurkeyAdapter(new WildTurkey());

testDuck($mallardDuct);

testDuck($wildTurkey);

function testDuck(Duck $duck): void
{
    $duck->quack();
    $duck->fly();
}

// Скрипт выводит
/*
MallardDuck quack
MallardDuck fly
WildTurkey gobble
WildTurkey fly
WildTurkey fly
WildTurkey fly
*/
