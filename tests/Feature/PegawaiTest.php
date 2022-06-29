<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PegawaiTest extends TestCase
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
        //membuka halaman Pegawai
        $response = $this->get('/pgw');
        //Memastikan Halaman pegawai bisa terbuka
        $response->assertStatus(200);
        //Muncul tulisan login
        $response->assertSeeText("Input Pegawai");
        //Muncul tulisan Email
        $response->assertSeeText("Show");
        //Muncul tulisan password
        $response->assertSeeText("Edit");
        //Muncul tulisan forgot password
        $response->assertSeeText("Delete");
        //Muncul tulisan Good Morning
        $response->assertSeeText("Data Pegawai");

    }



}
