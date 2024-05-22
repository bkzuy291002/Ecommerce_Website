<?php
namespace App\Repositories\Comment;

use App\Models\comments;
use Prettus\Repository\Eloquent\BaseRepository;

class CommentRepositoryEloquent extends BaseRepository implements CommentRepository
{

    public function Model(): string
    {
        return comments::class;
    }
}
