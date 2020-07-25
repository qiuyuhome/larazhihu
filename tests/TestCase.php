<?php

namespace Tests;

use App\User;
use Illuminate\Testing\TestResponse;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // 关闭异常处理.
        $this->withoutExceptionHandling();

        TestResponse::macro('data', function ($key) {
            // 通过  $this->original->getData() 可以获取到绑定给视图的原始数据
            return $this->original->getData()[$key];
        });
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create(User::class);

        $this->actingAs($user);

        return $this;
    }
}
