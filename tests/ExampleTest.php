<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */


    public function testHomeUrl()
    {
        $this->visit('/home')
            ->see('i-Elect')
            ->dontSee('Rails');
    }

    public function testLoginUrl()
    {
        $this->visit('/login')
            ->type('a@gmail.com', 'email')
            ->type('1234567', 'password')
            ->press("Login")
            ->seePageIs('/adminhome');
    }

    public function testHomeLoginButton()
    {
        $this->visit('/home')
            ->click('Login')
            ->seePageIs('login');
    }
    public function testHomeSignupButton()
    {
        $this->visit('/home')
            ->click('Sign Up')
            ->seePageIs('register');
    }

    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('kam@gmail.com', 'email')
            ->type('Kamal Perera', 'name')
            ->type('ABC', 'organization')
            ->type('1234567', 'password')
            ->type('1234567', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/adminhome');
    }

    public function testLoginPageLoginButton()
{
    $this->visit('/login')
        ->press('Login')
        ->seePageIs('login');
}
    public function testLoginPageRegisterButton()
    {
        $this->visit('/register')
            ->press('Register')
            ->seePageIs('register');
    }

    public function testAdminHome(){
        $this->withoutMiddleware();
        $this->visit('/adminhome')
            ->see('your current elections');
    }




}
