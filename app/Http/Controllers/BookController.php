<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IBookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private IBookRepository $bookRepository;

    public function __construct(IBookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->bookRepository->getAllBooks());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookDetails = $request->all();
        
        return response()->json($this->bookRepository->createBook($bookDetails), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = $this->bookRepository->getBookById($id);

        if($book) {
            return response()->json($book);
        } else {
            return response()->json(['message' => 'book not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = $this->bookRepository->getBookById($id);

        if(!$book) {
            return response()->json(['message' => 'book not found'], 404);
        } 

        $bookDetails = $request->all();

        $this->bookRepository->updateBookById($id, $bookDetails);
        
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = $this->bookRepository->getBookById($id);

        if(!$book) {
            return response()->json(['message' => 'book not found'], 404);
        } 

        $this->bookRepository->deleteBookById($id);

        return response()->json();
    }
}
