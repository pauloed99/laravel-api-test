<?php

namespace App\Repositories\Interfaces;

interface IBookRepository 
{
    public function getAllBooks();

    public function getBookById(string $id);

    public function updateBookById(string $id, array $bookDetails);

    public function createBook(array $bookDetails);

    public function deleteBookById(string $id);
}