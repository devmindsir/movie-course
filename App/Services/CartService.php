<?php

namespace App\Services;

use App\Exceptions\CourseNotFoundException;
use App\Exceptions\ProductNotFoundException;
use App\Models\Courses;
use App\Models\ProductColor;
use App\Models\Products;
use Exception;

class CartService extends BaseService
{
    private array $validProductType=['course','product'];

    public function checkProductType(string $productType){
    if (!in_array($productType,$this->validProductType)){
        throw new Exception('product Type not Valid');
    }
    return $productType;
    }

    public function getProduct($product_id,$product_type){
        if ($product_type==='course'){
            return $this->checkCourse($product_id);
        }else{
            return $this->checkProduct($product_id);
        }
    }
    public function checkCourse(int $course_id){
        $course=(new Courses())->find($course_id);
        if (!$course) {
            $this->logger->error("Course not found: ID $course_id");
            throw new CourseNotFoundException($course_id, 'Course not found');
        }
        return $course;
    }

    public function checkProduct(int $product_id){
        $product=(new Products())->find($product_id);
        if (!$product) {
            $this->logger->error("Product not found: ID $product_id");
            throw new ProductNotFoundException($product_id, 'Product not found');
        }
        return $product;
    }

    public function getColor(int $color_id){
        $color=(new ProductColor())->find($color_id);
        if (!$color) {
            $this->logger->error("Color not found: ID $color");
            throw new ProductNotFoundException($color, 'Color not found');
        }
        return $color->title;
    }


}