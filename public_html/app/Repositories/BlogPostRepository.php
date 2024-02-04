<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogPostRepository extends CoreRepository
{
    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'slug', 'is_published', 'published_at', 'user_id', 'category_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                },
                'user:id,name'
            ])
            ->paginate($perPage)
        ;

        return $result;
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
