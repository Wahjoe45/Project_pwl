<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // public function test_login_user_success(){
    //     $this->seed();

    //     $response = $this->post('/login',
    //     ['email'=> 'superadmin@gmail.com',
    //     'password'=>'password',]);
    //     $response -> assertRediract('/dashbord');
    // }
    public function test_example()
    {
        //membuka halaman login
        $response = $this->get('/');
        //Memastikan Halaman login bisa terbuka
        $response->assertStatus(200);
        //Muncul tulisan login
        $response->assertSeeText("Login");
        //Muncul tulisan Email
        $response->assertSeeText("Email");
        //Muncul tulisan password
        $response->assertSeeText("Password");
        //Muncul tulisan forgot password
        $response->assertSeeText("Forgot Password");
        //Muncul tulisan Good Morning
        $response->assertSeeText("Good morning");

    }



}
