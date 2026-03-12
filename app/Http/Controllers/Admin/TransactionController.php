<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);

        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $students = Student::all();

        return view('admin.transaction.create', compact('books', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'  => 'required|exists:students,id',
            'book_id'     => 'required|exists:books,id',
            'code'        => 'required|string|max:255|unique:transactions,code',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
            'status'      => 'required|string|in:borrowed,returned,late',
        ]);

        Transaction::create($request->all());

        return redirect()->route('admin.transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $books = Book::all();
        $students = Student::all();

        return view('admin.transaction.edit', compact('transaction', 'books', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'student_id'  => 'required|exists:students,id',
            'book_id'     => 'required|exists:books,id',
            'code'        => 'required|string|max:255|unique:transactions,code,' . $transaction->id,
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
            'status'      => 'required|string|in:borrowed,returned,late',
        ]);

        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('admin.transactions.index');
    }
}
