<?php

namespace Modules\Articles\Tests\Feature\Api;

use Modules\Articles\Entities\Article;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ArticleApiTest extends TestCase
{
    #[Test]
    public function it_can_display_list_of_articles()
    {
        $article = Article::factory()->create();

        $response = $this->get(route('articles.index'));

        $response->assertSuccessful();

        $response->assertSee(e($article->name));
    }

    #[Test]
    public function it_can_display_list_of_articles_details()
    {
        $article = Article::factory()->create();

        $response = $this->get(route('articles.show', $article));

        $response->assertSuccessful();

        $response->assertSee(e($article->name));
    }
}
