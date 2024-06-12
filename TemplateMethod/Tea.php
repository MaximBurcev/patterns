<?php

// Класс Tea для приготовления чая
class Tea
{
    function prepareRecipe(): void
    {
        $this->boilWater();
        $this->steepTeaBag();
        $this->pourInCup();
        $this->addLemon();
    }

    // Кипятим воду
    private function boilWater(): void
    {
        echo "Boiling water";
    }

    // Завариваем чай
    private function steepTeaBag(): void
    {
        echo "Steeping the tea";
    }


    // Разливаем по чашкам
    private function pourInCup(): void
    {
        echo "Pouring into cup";
    }

    // Добавляем лимон
    private function addLemon(): void
    {
        echo "Adding Lemon";
    }

}
