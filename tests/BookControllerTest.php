<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookControllerTest extends TestCase
{

    public function testIndexBookPage()
    {
        $this->visit('/book')
            ->see('Books');
    }

    public function testEditBookPage()
    {
        $this->visit('/book')
            ->click('Edit')
            ->see('book');
    }

    public function testRightBookCreatePage()
    {
        $this->visit('book/create')
            ->type('SSSS', 'title')
            ->type('fdfg' , 'author')
            ->type('1995' , 'year')
            ->type('DSas', 'genre')
            ->press('Save')
            ->seePageIs('/book');
    }
    /**
     * @dataProvider providerIncorrectData
     */
    public function testBookCreateWrong($title, $author, $year, $genre)
    {
        $this->visit('book/create')
            ->type($title, 'title')
            ->type($author, 'author')
            ->type($year, 'year')
            ->type($genre, 'genre')
            ->press('Save')
            ->seePageIs('/book/create');
    }

    public function testRightBookEditPage()
    {
        $book =  factory(App\Entities\Book::class, 1)->create();
        $this->visit('book/' . $book->id . '/edit')
            ->type('WWW', 'title')
            ->type('dfs', 'author')
            ->type('1900', 'year')
            ->type('Genre', 'genre')
            ->press('Update')
            ->seePageIs('/book');

    }

    public function testIncorrectBookEditPage()
    {
        $book =  factory(App\Entities\Book::class, 1)->create();
        $this->visit('book/' . $book->id . '/edit')
            ->type('W22WW', 'title')
            ->type('dfs', 'author')
            ->type('1900', 'year')
            ->type('Genre', 'genre')
            ->press('Update')
            ->seePageIs('book/' . $book->id . '/edit');

    }
    
    /**
     * @dataProvider providerIncorrectData
     */
    public function testBookEditWrongChangeInDB($title, $author, $year, $genre)
    {
        $book = factory(\App\Entities\Book::class)->create();
        $this->visit('book/' . $book->id . '/edit')
            ->type($title, 'title')
            ->type($author, 'author')
            ->type($year, 'year')
            ->type($genre, 'genre')
            ->press('Update')
            ->dontSeeInDatabase('books', ['title' => $title]);
    }

    /**
     * @dataProvider providerRightData
     */
    public function testBookEditRightChangeInDB($title, $author, $year, $genre)
    {
        $book = factory(\App\Entities\Book::class)->create();
        $this->visit('book/' . $book->id . '/edit')
            ->type($title, 'title')
            ->type($author, 'author')
            ->type($year, 'year')
            ->type($genre, 'genre')
            ->press('Update')
            ->seeInDatabase('books', ['title' => $title, 'author' => $author, 'year' => $year, 'genre' => $genre]);
    }

    /**
     * @dataProvider providerRightData
     */
    public function testBookCreateRightChangeInDB($title, $author, $year, $genre)
    {
        $this->visit('book/create')
            ->type($title, 'title')
            ->type($author, 'author')
            ->type($year, 'year')
            ->type($genre, 'genre')
            ->press('Save')
            ->seeInDatabase('books', ['title' => $title, 'author' => $author, 'year' => $year, 'genre' => $genre]);
    }

    /**
     * @dataProvider providerIncorrectData
     */
    public function testBookCreateWrongChangeInDB($title, $author, $year, $genre)
    {
        $this->visit('book/create')
            ->type($title, 'title')
            ->type($author, 'author')
            ->type($year, 'year')
            ->type($genre, 'genre')
            ->press('Save')
            ->dontSeeInDatabase('books', ['title' => $title, 'author' => $author, 'year' => $year, 'genre' => $genre]);
    }

    public function testBookDestroy()
    {
        $response = $this->call('DELETE', '/book/2', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
        $this->notSeeInDatabase('books', ['id' => 2]);
    }

    public function providerRightData() {
        return array(
            array('Titsle', 'Author', '4332', 'genres'),
            array('Titlesd', 'Author', '1232', 'genres'),
            array('itledsf', 'Author', '1234', 'genres'),
            array('sdf', 'Author', '1232', 'genres')
        );
    }

    public function providerIncorrectData() {
        return array(
            array('Tits1asle', 'Author', '4332', 'genres'),
            array('Tit2sd2lesd', 'Au1thor', '1232', 'genres'),
            array('itw2sled1s1f', 'Author', '123d', 'genres'),
            array('sd2ssaf', 'A1uthor', '1232', 'genres')
        );
    }
}
