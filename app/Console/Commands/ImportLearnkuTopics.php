<?php

namespace App\Console\Commands;

use App\Models\LearnkuTopic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ImportLearnkuTopics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-learnku-topics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '导入我的 learnku.com 话题';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // https://learnku.com/users/72619/topics
        $url = $this->ask('请输入你的 learnku.com 话题列表 URL', 'https://learnku.com/users/72619/topics');

        $this->info('正在导入话题列表：' . $url);

        $topics = $this->getTopics($url);

        $this->info('话题列表导入完毕，共 ' . count($topics) . ' 个话题');

        // laravel_session
        $laravel_session = $this->ask('请输入你的 learnku.com laravel_session', '形如 eyJp...%3D');

        $this->withProgressBar($topics, function ($topic) use ($laravel_session) {
            // https://learnku.com/laravel/t/86718
            $url = $topic['url'];
            $title = $topic['title'];

            // Extract id from URL with regex
            $id = Str::match('/\d+$/', $url);

            $body = $this->getTopicBody($id, $laravel_session);

            // Save to database
            LearnkuTopic::updateOrCreate(['url' => $url], [
                'title' => $title,
                'body' => $body,
            ]);
        });
    }

    private function getTopics(string $url, int $page = 1): array
    {
        $response = Http::get($url, ['page' => $page])->throw();

        $crawler = new Crawler($response->body());

        // Select all topics via .blog-article-list a.title
        $topics = $crawler->filter('.blog-article-list a.title')->each(function (Crawler $node) {
            return [
                'url' => $node->attr('href'),
                'title' => $node->text(),
            ];
        });

        // <a class="page-link" href="https://learnku.com/users/72619/topics?page=2" rel="next" aria-label="下一页 »">›</a>
        // <span class="page-link" aria-hidden="true">›</span>
        $nextPage = $crawler->filter('a.page-link[rel="next"]');
        if ($nextPage->count()) {
            $topics = array_merge($topics, $this->getTopics($url, $page + 1));
        }

        return $topics;
    }

    private function getTopicBody(string $id, string $laravel_session): string
    {
        // https://learnku.com/topics/86718/edit
        $url = "https://learnku.com/topics/$id/edit";

        // Get markdown from textarea#body-field
        $response = Http::withHeader('Cookie', "laravel_session=$laravel_session")->get($url)->throw();
        $crawler = new Crawler($response->body());
        return $crawler->filter('textarea#body-field')->html();
    }
}
