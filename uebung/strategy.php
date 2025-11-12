<?php


interface FormatStrategy {
    public function format(string $text): string;
}

class UpperCaseFormatter implements FormatStrategy {
    public function format(string $text): string {
        return strtoupper($text);
    }
}

class LowerCaseFormatter implements FormatStrategy {
    public function format(string $text): string {
        return strtolower($text);
    }
}

class CapitalismFormatter implements FormatStrategy {
    public function format(string $text): string {
        return ucfirst($text);
    }
}

class AnnoyParrotFormatter implements FormatStrategy {
    public function format(string $text): string {
        $output = '';
        $length = mb_strlen($text); // Für Multibyte-Zeichen
        for ($i = 0; $i < $length; $i++) {
            $char = mb_substr($text, $i, 1);
            if ($i % 2 === 0) {
                // Gerade Position: Großbuchstabe
                $output .= mb_strtoupper($char);
            } else {
                // Ungerade Position: Kleinbuchstabe
                $output .= mb_strtolower($char);
            }
        }
        return $output;
    }
}

class Formatter {
    private FormatStrategy $strategy;
    public function __construct(FormatStrategy $strategy) {
        $this->strategy = $strategy;
    }
    public function format(string $text): string {
        return $this->strategy->format($text);
    }

    public function setStrategy(FormatStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function formating(string $text): string
    {
        return $this->strategy->format($text);
    }
}

$formatter = new Formatter(new annoyParrotFormatter());
echo $formatter->formating("Hello World!\n");

$formatter->setStrategy(new capitalismFormatter());
echo $formatter->formating("Hello World!\n");
