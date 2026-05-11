<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactPageTest extends TestCase
{
    public function test_contact_page_loads(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Contact us', false);
    }

    public function test_contact_form_requires_fields(): void
    {
        $this->post(route('contact.store'), [])
            ->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_contact_form_redirects_with_success_message(): void
    {
        Mail::fake();

        $this->post(route('contact.store'), [
            'name' => 'Jane Customer',
            'email' => 'jane@example.com',
            'message' => 'Do you have this laptop in stock?',
        ])
            ->assertRedirect(route('contact'))
            ->assertSessionHas('status');
    }
}
