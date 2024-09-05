<?php

namespace App\Terminal;

use App\Models\HackerNewsLink;
use Chewie\Concerns\CreatesAnAltScreen;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Prompts\Key;
use Laravel\Prompts\Prompt;

class Hello extends Prompt
{
    use CreatesAnAltScreen;

    public Collection $hackerNewsLinks;

    public int $activeItem = 1;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        static::$themes['default'][Hello::class] = HelloRenderer::class;

        // https://www.youtube.com/watch?v=aJu48qlJANM&t=40s
        $this->createAltScreen();

        $this->hackerNewsLinks = HackerNewsLink::limit(5)->get();

        $this->listenForKeys();
    }

    public function value(): mixed
    {
        return true;
    }

    // 来源 https://blog.joe.codes/hacking-laravel-prompts-for-fun-and-profit
    protected function listenForKeys(): void
    {
        $this->on('key', function ($key) {
            if ($key[0] === "\e") {
                match ($key) {
                    Key::UP, Key::UP_ARROW => $this->activeItem = max(1, $this->activeItem - 1),
                    Key::DOWN, Key::DOWN_ARROW => $this->activeItem = min($this->hackerNewsLinks->count(), $this->activeItem + 1),
                    default => null,
                };
            }
        });
    }
}
