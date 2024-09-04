<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class HackerNewsLink extends Model
{
    use Sushi;

    protected array $rows = [
        // 测试下中文，加 3 个中文标题的，随机中文标题，长度不一
        [
            'url' => 'https://paperless.blog/interactive-nixos-tests',
            'title' => '交互式 NixOS 测试',
        ],
        [
            'url' => 'https://ninjalab.io/eucleak/',
            'title' => 'EUCLEAK 侧信道攻击 YubiKey 5 系列',
        ],
        [
            'url' => 'https://it-notes.dragas.net/2024/09/03/make-your-own-cdn-netbsd/',
            'title' => '使用 NetBSD 制作自己的 CDN',
        ],
        [
            'url' => 'https://paperless.blog/interactive-nixos-tests',
            'title' => 'Interactive NixOS Tests',
        ],
        [
            'url' => 'https://ninjalab.io/eucleak/',
            'title' => 'EUCLEAK Side-Channel Attack on the YubiKey 5 Series',
        ],
        [
            'url' => 'https://it-notes.dragas.net/2024/09/03/make-your-own-cdn-netbsd/',
            'title' => 'Make Your Own CDN with NetBSD',
        ],
        [
            'url' => 'https://github.com/team-watchdog/colombo-skylines',
            'title' => 'We built the city of Colombo in Cities:Skylines',
        ],
        [
            'url' => 'https://cacm.acm.org/news/faster-integer-programming/',
            'title' => 'Faster Integer Programming',
        ],
        [
            'url' => 'https://qmacro.org/blog/posts/2024/09/03/setting-up-a-cache-server-for-apt-packages/',
            'title' => 'Setting up a cache server for apt packages',
        ],
        [
            'url' => 'https://arxiv.org/pdf/1901.01930',
            'title' => 'Keeping CALM: When distributed consistency is easy (2019)',
        ],
        [
            'url' => 'https://www.ft.com/content/5164185d-b0d6-40d1-99b4-59f8039111c2',
            'title' => 'Britain\'s reliance on coal-fired power set to end after 140 years',
        ],
        [
            'url' => 'https://jobs.ashbyhq.com/photoroom/ddf2ab84-6e90-4026-9622-6e92cb96722f',
            'title' => 'Photoroom (YC S20) Is Hiring a Django Back End Lead in Paris (PostgreSQL, REST)',
        ],
        [
            'url' => 'https://github.com/Glimesh/broadcast-box',
            'title' => 'Show HN: OBS Live-streaming with 120ms latency',
        ],
        [
            'url' => 'https://www.edmigo.in/',
            'title' => 'Simplifying programming with AI-tutors',
        ],
        [
            'url' => 'https://chromatone.center/',
            'title' => 'Chromatone – Visual Music Language',
        ],
        [
            'url' => 'https://llmstxt.org/',
            'title' => 'Llms.txt',
        ],
        [
            'url' => 'https://www.crucig.com',
            'title' => 'Posting a 5x5 crossword every day',
        ],
        [
            'url' => 'https://practical.engineering/blog/2024/9/3/the-hidden-engineering-of-landfills',
            'title' => 'The Engineering of Landfills',
        ],
        [
            'url' => 'https://victortao.substack.com/p/song-pong',
            'title' => 'Synchronizing Pong to music with constrained optimization',
        ],
        [
            'url' => 'https://www.matthewball.co/all/sweeneystephenson',
            'title' => 'Interviewing Tim Sweeney and Neal Stephenson',
        ],
        [
            'url' => 'https://repaint.com',
            'title' => 'Show HN: Repaint – a WebGL based website builder',
        ],
        [
            'url' => 'https://www.hestus.co/',
            'title' => 'Show HN: Hestus – AI Copilot for CAD',
        ],
        [
            'url' => 'https://www.computerworld.com/article/3496192/court-handcuffs-employees-with-non-compete-agreements-again.html',
            'title' => 'Judge stops FTC from enforcing ban on non-compete agreements',
        ],
        [
            'url' => 'https://nltimes.nl/2024/09/03/tech-failure-nearly-caused-massive-flood-amsterdam-city-center-november-2023',
            'title' => 'Tech failure nearly caused massive flood in Amsterdam',
        ],
        [
            'url' => 'https://www.pixelstech.net/article/1677580861-Why-is-single-threaded-Redis-so-fast',
            'title' => 'Why is single threaded Redis so fast',
        ],
        [
            'url' => 'https://github.com/Emacs101/howm-manual',
            'title' => 'Howm: Personal Wiki for Emacs',
        ],
        [
            'url' => 'https://blog.jeujeus.de/blog/hardware/laptops-will-not-sleep-anymore/',
            'title' => 'State of S3 – Your Laptop is no Laptop anymore – a personal Rant',
        ],
        [
            'url' => 'https://ferd.ca/my-blog-engine-is-the-erlang-build-tool.html',
            'title' => 'My Blog Engine Is the Erlang Build Tool',
        ],
        [
            'url' => 'https://morizbuesing.com/blog/greppability-code-metric/',
            'title' => 'Greppability is an underrated code metric',
        ],
        [
            'url' => 'https://math.uchicago.edu/~may/REU2021/REUPapers/Dubey.pdf',
            'title' => 'The Fourier Uncertainty Principles [pdf] (2021)',
        ],
        [
            'url' => 'https://david.kolo.ski/blog/sort-library-steps-mtg/',
            'title' => 'How to sort your library in exactly 51,271 steps',
        ],
        [
            'url' => 'https://ismy.blue/',
            'title' => 'Is My Blue Your Blue?',
        ],
    ];
}
