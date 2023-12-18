<?php

namespace Tests\Feature;

use Hash;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function registration_function_has_livewire_components(){
        $this->get('/register')->assertSeeLivewire('auth.register');
    }

    /** @test */
    function can_register()
    {
        Livewire::test('auth.register')
                ->set('name', 'Zainab')
                ->set('email', 'zainab@gmail.com')
                ->set('password', 'password')
                ->set('password_confirmation', 'password')
                ->call('register')
                ->assertRedirect('/success');

        $this->assertTrue(User::whereEmail('zainab@gmail.com')->exists());
        $this->assertEquals('zainab@gmail.com', auth()->user()->email);
    }

    /** @test */
    function name_is_required()
    {
        Livewire::test('auth.register')
                ->set('name', '')
                ->set('email', 'zainab@gmail.com')
                ->set('password', 'password')
                ->set('password_confirmation', 'password')
                ->call('register')
                ->assertHasErrors([ 'name' => 'required' ]);

    }

    /** @test */
    function email_is_required()
    {
        Livewire::test('auth.register')
                ->set('name', 'Zainab')
                ->set('email', '')
                ->set('password', 'password')
                ->set('password_confirmation', 'password')
                ->call('register')
                ->assertHasErrors([ 'email' => 'required' ]);

    }

    /** @test */
    function email_is_valid()
    {
        Livewire::test('auth.register')
                ->set('name', 'Zainab')
                ->set('email', 'zainab')
                ->set('password', 'password')
                ->set('password_confirmation', 'password')
                ->call('register')
                ->assertHasErrors([ 'email' => 'email' ]);

    }

    /** @test */
    function email_hasnt_been_already_taken()
    {
        $user = User::create([
            'name'     => 'Zainab',
            'email'    => 'zainab@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Livewire::test('auth.register')
                ->set('name', 'Zainab')
                ->set('email', 'zainab@gmail.com')
                ->set('password', 'password')
                ->set('password_confirmation', 'password')
                ->call('register')
                ->assertHasErrors([ 'email' => 'unique' ]);

    }

    /** @test */
    function password_is_required()
    {
        Livewire::test('auth.register')
                ->set('name', 'Zainab')
                ->set('email', 'zainab@gmail.com')
                ->set('password', '')
                ->set('password_confirmation', 'password')
                ->call('register')
                ->assertHasErrors([ 'password' => 'required' ]);

    }
    /** @test */
    function password_is_min_six_characters()
    {
        Livewire::test('auth.register')
                ->set('name', 'Zainab')
                ->set('email', 'zainab@gmail.com')
                ->set('password', 'pass')
                ->set('password_confirmation', 'password')
                ->call('register')
                ->assertHasErrors([ 'password' => 'min:6' ]);

    }
    /** @test */
    function password_is_confirmed()
    {
        Livewire::test('auth.register')
                ->set('name', 'Zainab')
                ->set('email', 'zainab@gmail.com')
                ->set('password', 'password')
                ->set('password_confirmation', 'pass')
                ->call('register')
                ->assertHasErrors([ 'password' => 'confirmed' ]);

    }


}
