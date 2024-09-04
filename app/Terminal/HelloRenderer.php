<?php

namespace App\Terminal;

use Laravel\Prompts\Themes\Default\Concerns\DrawsBoxes;
use Laravel\Prompts\Themes\Default\Renderer;

class HelloRenderer extends Renderer
{
    use DrawsBoxes;

    public function __invoke(Hello $hello): static
    {
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
        $long_lorem = $lorem.' '.$lorem.' '.$lorem.' '.$lorem;
        $body = $long_lorem.PHP_EOL.$long_lorem.PHP_EOL.$long_lorem;

        // one simple box
        // $this->output = $this->box('title', $body, 'footer');

        // two nested boxes
        // $this->output = $this->getBoxOutput('Title', $this->getBoxOutput('Nested Title', $body, 'green', 40), 'blue', 60);

        $activeItem = $hello->activeItem;
        $this->output = $this->getBoxOutput('Hacker News Links', $hello->hackerNewsLinks->map(function ($link) use ($activeItem) {
            ray([$link->id, $activeItem]);
            // FIXME 没有更新，了解下为啥
            return $this->getBoxOutput($link->title, $link->url, $activeItem == $link->id ? 'green' : 'dim', 40);
        })->join(''), 'dim', 60);

        return $this;
    }

    private function getBoxOutput(string $title, string $body, string $color, int $width): string
    {
        // Reset the output string
        $this->output = '';

        // Set the minWidth to the desired width, the box method
        // uses this to calculate how wide the box should be
        $this->minWidth = $width;

        $this->box(
            title: $title,
            body: $body,
            color: $color,
        );

        $content = $this->output;

        $this->output = '';

        return $content;
    }
}
