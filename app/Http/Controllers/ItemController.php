<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items = item::where('user_id', Auth::id())->get();
        return view('dashboard', ['items' => $items]);
    }

    public function store(Request $request)
    {
        DB::table('items')->insert([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);
        return redirect('dashboard');
    }

    public function destroy($id)
    {
        $item = item::findOrFail($id);
        $item->delete();
        return redirect('dashboard');
    }

    public function status($id)
    {
        $item = item::findOrFail($id);
        $item->completed = !$item->completed;
        $item->save();
        return redirect('dashboard');
    }
}