<?php

namespace App\Services;

use App\Exceptions\ProductNotFoundException;
use App\Models\ProductGallery;
use App\Models\ProductSpecial;
use App\Models\Products;


class ProductService extends BaseService
{

    public function getProductDetails(int $product_id,string $slug):array{
        $product=$this->getProduct($product_id,$slug);

        return [
            'product'=>$product,
            'gallery'=>$this->getGallery($product_id),
            'product_categories'=>$this->getCategory($product,$product_id),
            'special'=>$this->getSpecial($product_id)
        ];
    }

    private function getProduct(int $product_id,string $slug): object
    {
        $product=(new Products())->productInfo($product_id);
        if (!$product){
            $this->logger->warning("Product Not Found : product_id=$product_id, Slug=$slug");
            throw new ProductNotFoundException($product_id,'Not Found');
        }
        if ($slug!==checkSlug($product->title)){
            throw new ProductNotFoundException($product_id,'Slug mismatch');
        }
        return $product;
    }

    private function getGallery(int $product_id): array
    {
        $gallery=(new ProductGallery())->getProductGallery($product_id);
        if (!$gallery){
                throw new ProductNotFoundException($product_id,'Not Found Gallery');
        }
        return $gallery;
    }

    private function getCategory(object $product,int $product_id): array
    {
        $category=(new Products())->getProductCategory($product->category_id,$product_id);
        if (!$category){
            throw new ProductNotFoundException($product_id,'Not Found Category');
        }
        return $category;
    }
    private function getSpecial(int $product_id): object
    {
        $special=(new ProductSpecial())->getSpecialInfo($product_id);
        if (!$special){
            throw new ProductNotFoundException($product_id,'Not Found Special');
        }
        return $special;
    }

}