<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{

    public function create(CommentRepository $commentRepository, Request $request){
        return $commentRepository->create([
            'news_id' => $request->news_id,
            'text' => $request->text,
            'author' => $request->author,
        ]);
    }

    public function get(CommentRepository $commentRepository, $id){
        return $commentRepository->get($id);
    }
}
