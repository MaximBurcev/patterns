<?php

interface Duck
{
    public function quack();

    public function fly();
}

interface Turkey
{
    public function gobble();

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

class TurkeyAdapter implements Duck
{

    private Turkey $turkey;

    public function __construct(Turkey $turkey)
    {
        $this->turkey = $turkey;
    }

    public function quack(): void
    {
        $this->turkey->gobble();
    }

    public function fly(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $this->turkey->fly();
        }
    }
}

// testing
$mallardDuct = new MallardDuck();

$wildTurkey = new TurkeyAdapter(new WildTurkey());

testDuck($mallardDuct);

testDuck($wildTurkey);

function testDuck(Duck $duck): void
{
    $duck->quack();
    $duck->fly();
}
