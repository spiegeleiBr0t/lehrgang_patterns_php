<?php

interface Observer{
    public function update(int $price,string $stockname):void;
}

interface Subject{
    public function attach(Observer $observer):void;
    public function detach(Observer $observer):void;
    public function notify(int $price):void;
}


class Stock implements Subject{

    private array $observers=[];

    private int $price;
    private string $stockname;

    public function __construct(string $stockname ,int $price = 30)
    {
        $this->stockname = $stockname;
        $this->price = $price;
    }

    public function attach(Observer $observer): void
    {
        if (!in_array($observer, $this->observers, true)) { // strikte Prüfung mit drittem Parameter
            $this->observers[] = $observer;
        }
    }

    public function detach(Observer $observer): void
    {
        $this->observers = array_filter($this->observers, fn($obs)=>$obs !== $observer);
    }

    public function notify(int $price): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->price,$this->stockname);
        }
    }

    public function setPrice(int $price): void {
        $this->price = $price;
        $this->notify($price);
    }
}

class ConservertiveInvestor implements Observer{
    private string $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function update(int $price, string $stockname):void{
        echo "$this->name : $stockname is now $price -".(($price > 300)?'holding steady':(($price < 50)?'HOLD!':(($price > 20)?'WTF SELL!!ALARM!':''))). " \n";
    }
}

class StonkInvestor implements Observer{
    private string $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function update(int $price, string $stockname):void{
        switch (true){
            case ($price > 1000):
                echo "$this->name : $stockname is now $price SELL!\n";
                break;
            case ($price > 600 && $price < 1000):
                echo "$this->name : $stockname is now $price INVEST!\n";
                break;
            case ($price > 150 && $price < 600):
                echo "$this->name : $stockname is now $price INVEST!\n";
                break;
            case ($price < 20):
                echo "$this->name : $stockname is now $price INVEST!\n";
                break;
            case ($price < 1):
                echo "$this->name : $stockname is now $price SELL!\n";
                break;
            default:
                echo "$this->name : $stockname is now $price Hold!\n";
        }
    }
}

$apple = new Stock("AAPL");

$TinaCons = new conservertiveInvestor("Tina");

$syntaxErrAggr = new StonkInvestor("X Æ A-Xii (Warning Syntax Error)");



$apple->attach($TinaCons);
$apple->attach($syntaxErrAggr);

$apple->setPrice(900);
$apple->setPrice(50);
$apple->setPrice(19);
$apple->setPrice(1);
$apple->setPrice(10000);




