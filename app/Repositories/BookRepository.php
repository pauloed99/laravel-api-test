<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Interfaces\IBookRepository;

class BookRepository implements IBookRepository
{
    public function getAllBooks()
    {
        return Book::all();
    }

    public function getBookById(string $id)
    {
        return Book::find($id);
    }

    public function createBook(array $userDetails)
    {
        return Book::create($userDetails);
    }

    public function updateBookById(string $id, array $bookDetails)
    {
        Book::find($id)->update($bookDetails);
    }

    public function deleteBookById(string $id)
    {
        Book::destroy($id);
    }
}