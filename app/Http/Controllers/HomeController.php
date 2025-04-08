<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
         $categories = Category::all();
        return view('home.index',compact('books','categories'));
    }
    public function bookDetails($id)
    {
        $book = Book::findOrFail($id);
        return view('home.book_details', compact('book'));
    }
    public function bookBorrow($id){
        $book = Book::findOrFail($id);
        $book_id = $id ;
        $quantity = $book->quantity;
        if($quantity >= '1'){
            if(Auth::id()){
                $user_id = Auth::user()->id ;
                $borrow = new Borrow();
                $borrow ->book_id = $book_id;
                $borrow ->user_id = $user_id;
                $borrow ->status = 'applied';
                $borrow ->save();
                return redirect()->back()->with('message','A Request is sent to borrow');






            }
            else{
                return redirect()->route('login');

            }


        }
        else{
            return redirect()->back()->with('message','Book Not Available');
        }
    }
    public function bookHistory(){
        if (Auth::id()){
            $user_id = Auth::user()->id ;
            $borrows = Borrow::where('user_id',"=",$user_id)->get();
            return view('home.book_history',compact('borrows'));
        }
        else{
            return redirect()->route('login');
        }


    }
    public function cancelRequest($id){
        if(Auth::id()){
            $borrows = Borrow::findOrFail($id);
            $borrows->delete();
            return redirect()->back()->with('message','Request Cancelled');
        }
        else{
            return redirect()->route('login');
        }
    }
    public function exploreBooks(){
        $data = Book::all();
        $categories = Category::all();
        return view('home.explore_books',compact('data','categories'));
    }
    public function searchBooks (Request $request){
        $search = $request->search;
        $categories = Category::all();


        $data = Book::where('title','like','%'.$search.'%')->orWhere('author_name','like','%'.$request->search.'%')->get();
        return view('home.explore_books',compact('data','categories'));

    }
    public function searchCategory($id){
        $data = Book::where('category_id',$id)->get();
        $categories = Category::all();
        return view('home.explore_books',compact('data','categories'));



    }
}
