<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     */
    function a_user_requires_a_name()
    {
        $user = factory('App\Models\User')->create('name');

        $user->assertSessionHasErrors('name');
    }
}
