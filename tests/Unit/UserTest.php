<?php

namespace Tests\Unit;

use Tests\ParentTestClass;
use App\Components\CustomQueryBuilder;
use \Illuminate\Foundation\Testing\DatabaseTransactions;
use App\
{
    User,
    Product
};

class UserTest extends ParentTestClass
{

    use DatabaseTransactions;

    public function testCreateUser()
    {
        $user = factory(User::class)->create();
        $this->assertInstanceOf(User::class, $user);
        return $user;
    }

    public function testCreateUserWithInvalidEmail()
    {
        $user = factory(User::class)->create(['email' => 'jaswant']);
        $this->assertArrayHasKey('email', $user);
    }
    
    public function testCreateUserNameAndPassword()
    {
        $user = factory(User::class)->create();
        $this->assertArrayHasKey('name', $user);
        $this->assertArrayHasKey('password', $user);
    }    
    
    /**
     * @depends testCreateUser
     */
    public function testCreateProductWithUserId($user)
    {
        $product = factory(Product::class)->create(['user_id' => $user->id]);
        $this->assertInstanceOf(Product::class, $product);
    }

}
