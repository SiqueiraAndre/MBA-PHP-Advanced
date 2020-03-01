<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\Lending;
use Illuminate\Http\Request;
use Validator;

class ApiController extends Controller{

	public function books(){
		$books = Book::with(['authors','lendings'])->get();
		return response()->json($books);
	}

}

?>