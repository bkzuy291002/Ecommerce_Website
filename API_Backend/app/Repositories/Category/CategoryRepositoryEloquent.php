<?php
namespace App\Repositories\Category;

use App\Models\category;
use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    public function Model(): string
    {
        return category::class;
    }
}
