<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        if (Auth::id()){
            $usertype = Auth::user()->usertype;
            if ($usertype == 'admin'){
                $user = User::all()->count();
                $book = Book::all()->count();
                $borrow = Borrow::where('status','=','approved')->count();
                $rejected = Borrow::where('status','=','applied')->count();
                $totalPrice = Borrow::where('status', '=', 'approved')
                    ->join('books', 'borrows.book_id', '=', 'books.id')
                    ->sum('books.price');



                return view('admin.index',compact('user','book','borrow','rejected','totalPrice'));
            }
            elseif($usertype == 'user'){
                return view('home.index');

            }
        }
        else{
            return redirect()->route('login');
        }

    }
    public function categoryPage(){
        $categories = Category::all();
        return view('admin.category',compact('categories'));

    }
    public function addCategory(Request $request){
        $cat_title = $request->cat_title;
        $cat = new Category();
        $cat->cat_title = $cat_title;
        $cat->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }
    public function editCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.category_edit',compact('category'));
    }
    public function updateCategory(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->cat_title = $request->cat_title;
        $category->save();
        return redirect()->route('category.index')->with('message','Category Updated Successfully');
    }
    public function bookPage(){
        $books = Book::all();
        $categories = Category::all();
        return view('admin.book',compact('books','categories'));
    }
    public function addBook(){
        $categories = Category::all();
        return view('admin.book_add',compact('categories'));
    }
    public function createBook(Request $request){
        $book = new Book();
        $book->title = $request->title;
        $book->author_name = $request->author_name;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->quantity = $request->quantity;
        $book->category_id = $request->category_id;
        $book_img = $request->file('book_img');
        if ($book_img){
           $book_img_name = time().'.'.$book_img->getClientOriginalExtension();
           $request->book_img -> move('book',$book_img_name);
           $book->book_img = $book_img_name;
        }
        $author_img = $request->file('author_img');
        if ($author_img){
            $author_img_name = time().'.'.$author_img->getClientOriginalExtension();
            $request->author_img -> move('author',$author_img_name);
            $book->author_img = $author_img_name;
        }
        $book->save();
        return redirect()->route('book.index')->with('message','Book Added Successfully');





    }
    public function deleteBook($id){
        $book = Book::findOrfail($id);

        if ($book) {
            if ($book->book_img && file_exists(public_path('book/' . $book->book_img))) {
                @unlink(public_path('book/' . $book->book_img));
            }

            if ($book->author_img && file_exists(public_path('author/' . $book->author_img))) {
                @unlink(public_path('author/' . $book->author_img));
            }

            $book->delete();
        }

        return redirect()->back()->with('message', 'Book Deleted Successfully');
    }
    public function editBook($id){
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.book_edit',compact('book','categories'));
    }
    public function updateBook(Request $request, $id){
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author_name = $request->author_name;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->quantity = $request->quantity;
        $book->category_id = $request->category_id;

        if ($request->hasFile('book_img')) {
            if ($book->book_img && file_exists(public_path('book/' . $book->book_img))) {
                @unlink(public_path('book/' . $book->book_img));
            }
            $book_img = $request->file('book_img');
            $book_img_name = time() . '.' . $book_img->getClientOriginalExtension();
            $request->book_img->move('book', $book_img_name);
            $book->book_img = $book_img_name;
        }

        if ($request->hasFile('author_img')) {
            if ($book->author_img && file_exists(public_path('author/' . $book->author_img))) {
                @unlink(public_path('author/' . $book->author_img));
            }
            $author_img = $request->file('author_img');
            $author_img_name = time() . '.' . $author_img->getClientOriginalExtension();
            $request->author_img->move('author', $author_img_name);
            $book->author_img = $author_img_name;
        }

        $book->save();
        return redirect()->route('book.index')->with('message', 'Book Updated Successfully');
    }
    public function borrowPage(){
        $borrows = Borrow::all();
        $users = User::all();
        $books = Book::all();
        return view('admin.borrow',compact('borrows','users','books'));
    }
    public function approveBook($id){
        $borrow =Borrow::findOrFail($id);
        $status = $borrow->status;
        if ($status == 'approved'){
            return redirect()->back()->with('message','Book Already Approved');
        }
        else{
            $borrow->status = 'approved';
        $bookId = $borrow->book_id;
        $book = Book::findOrFail($bookId);
        $book_qty = $book->quantity - '1';
        $book->quantity = $book_qty;
        $book->save();

        $borrow->save();
        return redirect()->back()->with('message','Book Approved Successfully');
        }

    }
    public function rejectBook($id){
        $borrow =Borrow::findOrFail($id);
        $borrow->status = 'rejected';
        $borrow->save();
        return redirect()->back()->with('message','Book Rejected Successfully');
    }
    public function returnBook($id){
        $borrow =Borrow::findOrFail($id);
        $status = $borrow->status;
        if ($status == 'approved'){
            $borrow->status = 'applied';
            $bookId = $borrow->book_id;
            $book = Book::findOrFail($bookId);
            $book_qty = $book->quantity + '1';
            $book->quantity = $book_qty;
            $book->save();
            $borrow->save();
            return redirect()->back()->with('message','Book Already Returned');
        }
        else{
            $borrow->status = 'applied';
            $borrow->save();
            return redirect()->back()->with('message','Book Returned Successfully');

        }

    }


}
