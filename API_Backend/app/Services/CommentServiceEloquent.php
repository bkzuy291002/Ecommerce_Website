<?php
namespace App\Services;

use App\Models\comments;
use App\Repositories\Comment\CommentRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CommentServiceEloquent implements CommentService
{
    public function __construct(protected CommentRepository $commentRepository)
    {

    }

    public function getRepository(): CommentRepository
    {
        return $this->commentRepository;
    }

    public function getAll(): Collection
    {
        return $this->commentRepository->all();
    }

    /**
     * @return Collection
     */
    public function getAllWithUser(): Collection
    {
        return DB::table('comments')
                    ->join('products', 'comments.product_id', '=', 'products.id')
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->select(
                        'comments.id as comment_id',
                        'comments.rating',
                        'comments.created_at',
                        'comments.content',
                        'products.name as prod_name',
                        'users.name as user_name'
                    )
                    ->get();
    }

}
