<?php

namespace App\Controllers;

use App\Models\ProductModel;

class PageLoader extends BaseController
{

    private function page_loader($view,$data)
    {

        echo view("templates/header",$data);
        echo view("pages/".$view,$data);
        echo view("templates/footer",$data);
        
    }

    public function products($success="",$error="")
    {
        
        $productModel = new ProductModel();
        
        $allProducts = $productModel->findAll();

        $data = array(
            "title" => "Products",
            "products" => $allProducts,
            "success" => $success,
            "error" => $error
        );

        helper("form");

        $this->page_loader("products",$data);
        
    }

    public function add_product($success="",$error="")
    {
        


        $data = array(
            "title" => "Add Product",
            "success" => $success,
            "error" => $error
        );

        helper("form");

        $this->page_loader("add_product",$data);
        
        
    }

    public function edit_product($slug,$success="",$error="")
    {
        
        $productModel = new ProductModel();

        $productData = $productModel->where("uid",$slug)->first();

        $data = array("title"=>"Edit ".$productData["name"],"product"=>$productData,"success"=>$success,"error"=>$error);

        helper('form');

        $this->page_loader("edit_product",$data);
        
        
    }

    public function employees()
    {

        $db      = \Config\Database::connect();

     

        $query = "SELECT e.name as name,e.code as code,es.salary as salary FROM employees e JOIN employee_salary es ON es.employee_id = e.code";

        $query = $db->query($query);

       

        foreach ($query->getResult() as $row) {
            $employees[] = $row;
        }



        $data = array(
            "title" => "Employees",
            "employees" => $employees
        );

        $this->page_loader("employees",$data);
        
    }

    public function fare_breakup()
    {

        $fareJson = '{
            "Currency":"INR",
            "BaseFare":"10800",
            "Tax":"1008",
            "YQTax":"0",
            "AdditionalTxnFee":"0",
            "AdditionalTxnFeeOfrd":"0",
            "AdditionalTxnFeePub":"0",
            "OtherCharges":"215.66",
            "Discount":"0",
            "PublishedFare":"12023.66",
            "CommissionEarned":"108",
            "IncentiveEarned":"0",
            "OfferedFare":"11915.66",
            "TdsOnCommission":"21.6",
            "TdsOnIncentive":"0",
            "ServiceFee":"0"
        }';

        $fareObj = json_decode($fareJson,TRUE);

        $data = array(
            "title" => "Fare",
            "fare" => $fareObj
        );

        $this->page_loader("fare",$data);
        
        
    }

}
