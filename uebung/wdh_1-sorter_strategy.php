<?php

interface SorterStrategy {
    public function sort(array $data): array;
}

class MonkeySort implements SorterStrategy {

    private function isSorted(array $arr): bool {
        for ($i = 0; $i < count($arr) - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                return false;
            }
        }
        return true;
    }

    private function shuffleArray(array $arr): array {
        shuffle($arr);
        return $arr;
    }
    public function sort(array $arr): array {
        $cnt = 0;
        while (!$this->isSorted($arr)) {
            $arr = $this->shuffleArray($arr);
            $cnt++;
            echo "$cnt ,".(($cnt % 50) ? "\n":"");

        }
        return $arr;
    }
}

class AscendingSort implements SorterStrategy {
    public function sort(array $data): array {
        sort($data);
        return $data;
    }
}
class DescendingSort implements SorterStrategy {
    public function sort(array $data): array {
        rsort($data);
        return $data;
    }
}

class Sorter {
    private SorterStrategy $strategy;

    public function __construct(SorterStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(SorterStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function sort(array $data): array {
        return $this->strategy->sort($data);
    }
}


$data = [5, 3, 8, 1, 2];


$sorter = new Sorter(new AscendingSort());
echo "Aufsteigend sortiert: ";
print_r($sorter->sort($data));

$sorter->setStrategy(new DescendingSort());
echo "Absteigend sortiert: ";
print_r($sorter->sort($data));

$sorter->setStrategy(new MonkeySort());
echo "Monkey sortiert: ";
print_r($sorter->sort($data));