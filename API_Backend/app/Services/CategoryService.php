<?php
namespace App\Services;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Collection;

interface CategoryService
{
    public function getRepository(): CategoryRepository;

    public function getAll(): Collection;
}
