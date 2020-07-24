<?php

namespace Tests\Feature;

use App\User;
use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostAnswersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_can_post_a_answer_to_a_question()
    {
        // 1. 假设存在某个问题
        $question = factory(Question::class)->create();
        $user = factory(User::class)->create();

        // 2. 触发某个路由
        $response = $this->post("/questions/{$question->id}/answers", [
            'user_id' => $user->id,
            'content' => 'This is a answer.',
        ]);

        // 3. 看到预期结果
        $response->assertStatus(201);

        $answer = $question->answers()->where('user_id', $user->id)->first();
        $this->assertNotNull($answer);
        $this->assertEquals(1, $question->answers()->count());
    }
}
