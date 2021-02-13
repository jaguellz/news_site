<?php


namespace App\Repositories;
use App\Http\Controllers\CommentController;
use App\Models\Comments;
use http\Cookie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Void_;

class CommentRepository extends BaseRepository {
    /**
     * @var Model
     */
    protected $model;

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return 'App\Models\Comments';
    }

    /**
     * @param $data
     * @return mixed
     */

    public function create($data){
        return Comments::create([
            'news_id' => $data['news_id'],
            'text' => $data['text'],
            'author' => $data['author'],
        ]);
    }

    public function get($news_id){
        return $this->startCondition()
            ->query()
            ->where('news_id', $news_id)
            ->get();
    }
    /*
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
    }*/

}
