<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user','book'])->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create', [
            'users' => User::orderBy('name')->get(),
            'books' => Book::orderBy('title')->get(),
        ]);
    }

    public function store(Request $r)
    {
        $r->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::find($r->book_id);

        Order::create([
            'user_id'    => $r->user_id,
            'book_id'    => $r->book_id,
            'price'      => $book->price ?? 0,
            'ordered_at' => now(),
            'status'     => 'paid',
            'emailed'    => false,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Order deleted');
    }

  public function edit(Order $order)
{
    return view('orders.edit', [
        'order' => $order,
        'users' => User::orderBy('name')->get(),
        'books' => Book::orderBy('title')->get(),
    ]);
}
public function update(Request $r, Order $order)
{
    $r->validate([
        'user_id' => 'required|exists:users,id',
        'book_id' => 'required|exists:books,id',
        'status'  => 'required|string|max:50',
    ]);
    
    $book = Book::find($r->book_id);

    $order->update([
        'user_id'    => $r->user_id,
        'book_id'    => $r->book_id,
        'price'      => $book->price ?? 0,
        'status'     => $r->status,
    ]);

    return redirect()->route('orders.index')->with('success','Order updated');
}
};
