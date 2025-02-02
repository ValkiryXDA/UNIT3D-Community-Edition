<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PollController
 */
class PollControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\Models\User::class)->create();

        $response = $this->actingAs($user)->get(route('polls'));

        $response->assertOk();
        $response->assertViewIs('poll.latest');
        $response->assertViewHas('polls');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function result_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $poll = factory(\App\Models\Poll::class)->create();
        $user = factory(\App\Models\User::class)->create();

        $response = $this->actingAs($user)->get(route('poll_results', ['slug' => $poll->slug]));

        $response->assertOk();
        $response->assertViewIs('poll.result');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $poll = factory(\App\Models\Poll::class)->create();
        $user = factory(\App\Models\User::class)->create();

        $response = $this->actingAs($user)->get(route('poll', ['slug' => $poll->slug]));

        $response->assertRedirect(withInfo('You have already vote on this poll. Here are the results.'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function vote_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = factory(\App\Models\User::class)->create();

        $response = $this->actingAs($user)->post('polls/vote', [
            // TODO: send request data
        ]);

        $response->assertRedirect(withErrors('Bro have already vote on this poll. Your vote has not been counted.'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function vote_validates_with_a_form_request()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PollController::class,
            'vote',
            \App\Http\Requests\VoteOnPoll::class
        );
    }

    // test cases...
}
