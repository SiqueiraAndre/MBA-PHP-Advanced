<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\Lending;
use Validator;
use Storage;

class ApiController extends Controller{

	public function books(){
		$books = Book::with(['authors','lendings'])->get();
		return response()->json($books);
	}

	public function authors(){
		$authors = Author::with(['books'])->get();
		return response()->json($authors);
	}

	public function lendings(){
		$lending = Lending::with(['books','user'])->get();
		return response()->json($lending);
	}

	public function saveBooks(Request $request){

		$validator = Validator::make($request->all(), [
			'title' => 'required| min:10',
			'description' => 'required| min:10',
			'url_image' => 'required'
		]);

		$title = $request->input('title');
		$description = $request->input('description');
		$url = $request->input('url_image');

		if(!$validator->fails()){

			$contents = file_get_contents($url);
			$namefile = time() . '.' . substr($url , strrpos($url, ".") + 1);
			Storage::disk("public")->put($namefile, $contents);
			
			$book = Book::create([
				'title' => $title,
				'description' => $description,
				'image' => $namefile
			]);

			if(!empty($book)){
				return response()->json($book);
			}
		}

		return response()->json([
			'message'=>"Error saving book",
			'erros' => $validator->errors()
		], 500);
	}
}