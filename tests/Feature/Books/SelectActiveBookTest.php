<?php

namespace Tests\Feature\Books;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SelectActiveBookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_active_book_on_any_page()
    {
        $user = $this->loginAsUser();
        $book = factory(Book::class)->create(['name' => 'Kegiatan Rutin']);

        $this->visitRoute('home');
        $this->see($book->name);
        $this->assertSessionMissing('active_book_id');
    }

    /** @test */
    public function user_can_change_active_book_on_any_page()
    {
        $user = $this->loginAsUser();
        $book1 = factory(Book::class)->create(['name' => 'Kegiatan Rutin']);
        $book2 = factory(Book::class)->create(['name' => 'Ramadhan 2023']);

        $this->visitRoute('home');
        $this->seeElement('button', [
            'type' => 'submit', 'name' => 'switch_book', 'id' => 'switch_book_'.$book1->id,
        ]);
        $this->seeElement('button', [
            'type' => 'submit', 'name' => 'switch_book', 'id' => 'switch_book_'.$book2->id,
        ]);

        $this->press('switch_book_'.$book2->id);
        $this->see($book2->name);
        $this->seeInSession('active_book_id', $book2->id);
    }
}
