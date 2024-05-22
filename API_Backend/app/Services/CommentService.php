<?php
namespace App\Services;

use App\Repositories\Comment\CommentRepository;
use Illuminate\Support\Collection;

interface CommentService
{
    public function getRepository(): CommentRepository;

    public function getAll(): Collection;

    public function getAllWithUser(): Collection;
}
