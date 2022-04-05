<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Controllers\PageLoader;

class Products extends BaseController
{

    public function create()
    {

        $productModel = new ProductModel();

        $pageLoader = new PageLoader();


        if ($this->request->getPost("slug")!="") {
            
            $slug = strtolower(url_title($this->request->getPost("slug")));
            
            $exists = $productModel->where("uid",$slug)->first();

            if ($exists) {
                $pageLoader->add_product("","Product slug already exists");
            }
            

        } else {
            

            $slug = uniqid();

            
        }


        


        
        $dataToAdd = array(
            "uid"=> $slug,
            "name" => $this->request->getPost("name"),
            "description" => $this->request->getPost("description"),
            "price" => $this->request->getPost("price"),
            
        );



        $created = $productModel->insert($dataToAdd);

        if ($created) {
            $pageLoader->add_product("Product Added","");
        } else {
            $pageLoader->add_product("","Product not Added");
        }
        
        
        exit;

    }

    public function update()
    {

        $id = $this->request->getPost("id");

        $productModel = new ProductModel();

        $pageLoader = new PageLoader();

        $prevProductData = $productModel->find($id);


        if ($this->request->getPost("slug")!="") {
            
            $slug = strtolower(url_title($this->request->getPost("slug")));
            
            $exists = $productModel->where("uid",$slug)->first();

            if ($exists&&($exists["uid"]!=$prevProductData["uid"])) {
                $pageLoader->add_product("","Product slug already exists");
            }
            

        } else {
            

            $slug = uniqid();

            
        }


        


        
        $dataToUpdate = array(
            "uid"=> $slug,
            "name" => $this->request->getPost("name"),
            "description" => $this->request->getPost("description"),
            "price" => $this->request->getPost("price"),
            
        );



        $created = $productModel->update($id,$dataToUpdate);

        if ($created) {
            $pageLoader->edit_product($slug,"Product Added","");
        } else {
            $pageLoader->edit_product($prevProductData["uid"],"Product not Added");
        }
        
        
        exit;

    }

    public function delete()
    {
        
        $id = $this->request->getPost("id");

        $productModel = new ProductModel();

        $deleted = $productModel->delete($id);

        $pageLoader = new PageLoader();

        if ($deleted) {
            $pageLoader->products("Product Deleted","");
        } else {
            $pageLoader->products("","Product not Deleted");
        }
        
        
    }

}