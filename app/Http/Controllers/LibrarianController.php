<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LibrarianController extends Controller
{
    public function showLibrarian()
    {
        $librarians = User::where("role", "librarian")->get();
        return view("pages.librarians", compact("librarians"));
    }

    public function editLibrarian(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != "") {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->back();
    }
    public function deleteLibrarian(Request $request, $id)
    {
        $user = auth()->user();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back();
        }
        User::find($id)->delete();
        return redirect()->back();
    }

    public function addLibrarian(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = "librarian";
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back();
    }
}
