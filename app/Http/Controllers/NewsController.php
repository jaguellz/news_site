<?php

namespace App\Http\Controllers;

use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    /**
     * @param NewsRepository $newsRepository
     * @param Request $request
     * @return mixed
     */
    public function create(NewsRepository $newsRepository, Request $request){
        $news = $newsRepository->create([
            'head' => $request->head,
            'text' => $request->text,
            'author' => $request->author,
            'tags' => $request->tags,
        ]);
        return /*redirect(route('news', $news->id))*/ $news->id;
    }

    /**
     * @param NewsRepository $newsRepository
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(NewsRepository $newsRepository, Request $request, $id){
        $news = $newsRepository->update($id, [
            'head' => $request->head,
            'text' => $request->text,
            'author' => $request->author,
            'tags' => $request->tags,
        ]);
        return /*redirect(route('news', $id))*/ $id;
    }

    public function get(NewsRepository $newsRepository, $id){
        return $newsRepository->get($id);
    }
}
