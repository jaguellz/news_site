<?php


namespace App\Repositories;
use App\Http\Controllers\NewsController;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Void_;

class NewsRepository extends BaseRepository {
    /**
     * @var Model
     */
    protected $model;

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'App\Models\News';
    }

    public function create($data){
        return News::create([
            'head' => $data['head'],
            'text' => $data['text'],
            'author' => $data['author'],
            'tags' => $data['tags'],
        ]);
    }

    public function update($id, $data){
        return $this->startCondition()
            ->query()
            ->where('id', $id)
            ->update([
                'head' => $data['head'],
                'text' => $data['text'],
                'author' => $data['author'],
                'tags' => $data['tags'],
            ]);
    }

    public function get($id){
        $news = $this->startCondition()
            ->query()
            ->where('id', $id)
            ->get();
        $comments = DB::table('comments')
            ->where('news_id', $id)
            ->get();
        return [
            'news' => $news,
            'comments' => $comments
            ];
    }

}
