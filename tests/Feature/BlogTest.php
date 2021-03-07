<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Blog;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function user_can_see_all_the_blogs()
    {
        // past / scene/ prepare
        $this->createBlog();
        $this->createBlog('Second Ever Blog');

        // present / action / act 
        $response = $this->get('/blog');

        // future / assertion / assert
        $response->assertStatus(200);
        $response->assertSee('Simple Ever Blog');
        $response->assertSee('Second Ever Blog');

    }

    /** @test */
    public function user_can_visit_single_blog()
    {

        // past / scene/ prepare
        $blog = $this->createBlog();

        // present / action / act 
        $response = $this->get('/blog/'. $blog->id);

        // future / assertion / assert
        $response->assertStatus(200);
        $response->assertSee($blog->title);
    }
    
    protected function createBlog($title = null){
        $title = $title ?? 'Simple Ever Blog';
        return Blog::create(['title' => $title]);
    }

}
