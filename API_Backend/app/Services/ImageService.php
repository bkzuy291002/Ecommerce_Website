<?php
namespace App\Services;
use App\Models\Image;
use App\Repositories\Image\ImageRepository;
interface ImageService
{
    public function getRepository(): ImageRepository;
    public function productImage(array $attributes ,int $id);
    public function storeImage(array $attributes ,int $id);

    public function deleteImage(int $id);
    public function getImageById(int $id);



}
