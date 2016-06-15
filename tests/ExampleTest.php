<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

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

    public function testAdminLoginUrl()
    {
        $this->visit('/login')
            ->type('a@gmail.com', 'email')
            ->type('1234567', 'password')
            ->press("Login")
            ->seePageIs('/adminhome');
    }
    public function testInvalidCredentialsForAdminLogin()
    {
        $this->visit('/login')
            ->type('a@gmail.com', 'email')
            ->type('12345678', 'password')
            ->press("Login")
            ->seePageIs('/login');
    }
    public function testVoterLoginUrl()
    {
        $this->visit('/login')
            ->type('1@gmail.com', 'email')
            ->type('1234567', 'password')
            ->press("Login")
            ->seePageIs('/voterhome');
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
    public function testNewUserRegistrationInvalidDetails()
    {
        $this->visit('/register')
            ->type('kam@gmail.com', 'email')
            ->type('Kamal Perera', 'name')
            ->type('ABC', 'organization')
            ->type('1234567', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/register');
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

public function testVoterHome(){
    $this->visit('/login')
        ->type('1@gmail.com', 'email')
        ->type('1234567', 'password')
        ->press("Login")
        ->click('election 1')
        ->seePageIs('voterhome');

}

    public function testAdminHome(){
        $this->visit('/login')
            ->type('a@gmail.com', 'email')
            ->type('1234567', 'password')
            ->press("Login")
            ->click('election 1')
            ->seePageIs('elections/38/show');
    }

    public function testElectionName(){
        $this->visit('/login')
            ->type('a@gmail.com', 'email')
            ->type('1234567', 'password')
            ->press("Login")
            ->click('election 1')
            ->see('election 1');
    }
    public function testElectionDate(){
        $this->visit('/login')
            ->type('a@gmail.com', 'email')
            ->type('1234567', 'password')
            ->press("Login")
            ->click('election 1')
            ->see('2016-06-15');
    }
    public function testElectionDatePassed(){
        $this->visit('/login')
            ->type('a@gmail.com', 'email')
            ->type('1234567', 'password')
            ->press("Login")
            ->click('election 1')
            ->click('2016-06-15')
            ->seePageIs('elections/38/edit');
    }




}
