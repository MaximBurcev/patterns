<?php

// Класс Cofee для приготовления кофе
class Cofee
{
    function prepareRecipe(): void
    {
        $this->boilWater();
        $this->brewCoffeeGrinds();
        $this->pourInCup();
        $this->addSugarAndMilk();
    }

    // Кипятим воду
    private function boilWater(): void
    {
        echo "Boiling water";
    }

    // Настаиваем кофе
    private function brewCoffeeGrinds(): void
    {
        echo "Dripping Cofee through filter";
    }

    // Разливаем по чашкам
    private function pourInCup(): void
    {
        echo "Pouring into cup";
    }

    // Добавляем сахар и молоко
    private function addSugarAndMilk(): void
    {
        echo "Adding Sugar and Milk";
    }
}
