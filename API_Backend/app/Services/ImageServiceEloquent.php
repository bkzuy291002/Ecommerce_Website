<?php
namespace App\Services;
use App\Models\Image;
use App\Models\ProductImage;
use App\Repositories\Image\ImageRepository;
use Illuminate\Support\Facades\DB;

class ImageServiceEloquent implements ImageService
{
    public function __construct(protected ImageRepository $imageRepository)
    {
    }
    public function getRepository(): ImageRepository
    {
        return $this->imageRepository;
    }
    public function productImage(array $attributes ,int $id)
    {
        $imageIds = [];
        $test=[];
        foreach($attributes as $attribute) {
            $test['product_id'] = $id;
            $test['path'] = $attribute;
            $data = $this->imageRepository->create($test);
            $imageIds[] = $data->id;
        }
        return $imageIds;
    }

    public function storeImage(array $attributes ,int $id)
    {
        $imageIds = [];
        $test=[];
        foreach($attributes as $attribute) {

            $test['store_id'] = $id;
            $test['path'] = $attribute;
            $data = $this->imageRepository->create($test);
            $imageIds[] = $data->id;
        }
        return $imageIds;
    }


    public function deleteImage(int $id)
    {
        return $this->imageRepository->delete($id);
    }

    public function getImageById(int $id)
    {
//        return $this->imageRepository->find($id);

        return DB::table('images')
            ->select('*')
            ->where('product_id', $id)
            ->get();
    }


}
