<?php

// Реализация Tea очень похожа на реализацию Coffee; шаги 2 и 4 различаются, но рецепт почти не изменился
// Дублирование кода - верный признак того, что в архитектуру необходимо вносить изменения.
// Раз чай и кофе так похожи, может, стоит выделить их сходные аспекты в базовый класс?


// Шаблонный Метод определяет основные шаги алгоритма и позволяет субклассам предоставить реализацию одного или нескольких шагов.

// Caffeinebeverage - абстрактный класс
abstract class CaffeineBeverage
{
    //Теперь для приготовления чая и кофе будет использоваться один метод - prepareRecipe().
    // Этот метод объявлен с клчевым словом final, потому что суперклассы не должны переопределять этот метод!
    // Шаги 2 и 4 заменены обобщеннымми вызовами brew() и addCondiments()
    // prepareRecipe() - шаблонный метод. Почему? Потому что: 1. Бесспорно, это метод. 2. Он служит шаблоном для алгоритма  - в данном случае алгоритма приготовления напитка
    // В шаблоне каждый шаг алгоритма представлен некоторым методов
    // Реализация одних методов предоставляется этим классом. Реализация других предоставляется субклассом
    final function prepareRecipe(): void
    {
        $this->boilWater();
        $this->brew();
        $this->pourInCup();
        $this->addCondiments();
    }


    // Так как классы Coffee и Tea реализуют эти методы по-разному, мы объявляем их абстрактыми.
    // Субклассы должны предоставить их реализацию!
    // Методы, которые должны предоставляться субклассами, объявляются абстрактными
    abstract function brew();

    abstract function addCondiments();

    private function boilWater(): void
    {
        echo "Boiling water\r\n";
    }

    private function pourInCup()
    {
        echo "Pouring into cup\r\n";
    }

}

// Класс Tea должен определить brew() и addCondiments()  - два абстрактных метода из CaffeineBeverage
class Tea extends CaffeineBeverage {

    function brew(): void
    {
        echo "Steeping the tea\r\n";
    }

    function addCondiments(): void
    {
        echo "Adding Lemon\r\n";
    }
}

// То же самое должен сделать и класс Coffee, только вместо пакетика чая и лимона он добавляет в напиток сахар и молоко
class Coffe extends CaffeineBeverage
{

    function brew(): void
    {
       echo "Dripping Coffe through filter\r\n";
    }

    function addCondiments(): void
    {
        echo "Adding Sugar and Milk\r\n";
    }
}

// Тестирование

$tea = new Tea();

$coffee = new Coffe();

$tea->prepareRecipe();

$coffee->prepareRecipe();

/*
 * Скрипт вывел
 *
 * Boiling water
Steeping the tea
Pouring into cup
Adding Lemon
Boiling water
Dripping Coffe through filter
Pouring into cup
Adding Sugar and Milk

 * */
