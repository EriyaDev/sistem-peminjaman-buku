<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Transaction;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $borrowed_count = Transaction::where('status', 'borrowed')->count();
        $returned_count = Transaction::where('status', 'returned')->count();
        $late_count = Transaction::where('status', 'late')->count();
        $books_count = Book::count();

        // transaction this month and year
        $january = Transaction::whereMonth('created_at', 1)->whereYear('created_at', now()->year)->count();
        $february = Transaction::whereMonth('created_at', 2)->whereYear('created_at', now()->year)->count();
        $march = Transaction::whereMonth('created_at', 3)->whereYear('created_at', now()->year)->count();
        $april = Transaction::whereMonth('created_at', 4)->whereYear('created_at', now()->year)->count();
        $may = Transaction::whereMonth('created_at', 5)->whereYear('created_at', now()->year)->count();
        $june = Transaction::whereMonth('created_at', 6)->whereYear('created_at', now()->year)->count();
        $july = Transaction::whereMonth('created_at', 7)->whereYear('created_at', now()->year)->count();
        $august = Transaction::whereMonth('created_at', 8)->whereYear('created_at', now()->year)->count();
        $september = Transaction::whereMonth('created_at', 9)->whereYear('created_at', now()->year)->count();
        $october = Transaction::whereMonth('created_at', 10)->whereYear('created_at', now()->year)->count();
        $november = Transaction::whereMonth('created_at', 11)->whereYear('created_at', now()->year)->count();
        $december = Transaction::whereMonth('created_at', 12)->whereYear('created_at', now()->year)->count();

        $five_latest_transactions = Transaction::latest()->take(5)->get();

        $monthly_transactions = [
            $january,
            $february,
            $march,
            $april,
            $may,
            $june,
            $july,
            $august,
            $september,
            $october,
            $november,
            $december,
        ];

        return view('admin.dashboard', compact('borrowed_count', 'returned_count', 'late_count', 'books_count', 'monthly_transactions', 'five_latest_transactions'));
    }
}
