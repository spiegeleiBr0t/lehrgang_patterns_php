<?php

interface Text{

    public function render(string $text):string;
}

class PlainText implements Text{

    public function render(string $text):String{
        return $text;
    }
}

abstract class TextDecorator implements Text{
    public function __construct(protected Text $text)
    {
    }

    public function render(string $text):string
    {
        return $this->text->render($text);
    }
}

class BoldText extends TextDecorator
{
    public function render(string $text): string
    {
        return "<b>". parent::render($text). "</b>";

    }
}

class ItalicText extends TextDecorator{
    public function render(string $text):string{
        return "<i>" . parent::render($text) . "</i>";
    }

}

class UnderlineText extends TextDecorator{
    public function render(string $text):string{
        return "<u>". parent::render($text) . "</u>";
    }
}

$underline = new UnderlineText(
    new ItalicText(
        new BoldText(
            new PlainText()
        )
    )
);

echo $underline->render("Test");

