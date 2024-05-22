<?php
namespace App\Services;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Collection;

class CategoryServiceEloquent implements CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository)
    {

    }

    public function getRepository(): CategoryRepository
    {
        return $this->categoryRepository;

    }

    public function getAll(): Collection
    {
        return $this->categoryRepository->all();
    }
}
