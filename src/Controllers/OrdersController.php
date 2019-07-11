<?php
    require_once 'src/Controllers/Controller.php';
    require_once 'src/Models/Order.php';

    //Ajouter une verification avant d'ajouter

    class OrdersController extends Controller
    {
        public function __construct()
        {
            $this->model = new Order();
        }
        public function addWhynoteOrder($dataclient){
            $this->model->addWhynoteOrder($dataclient);
            echo'Commande Ajouté';
            die();
        }
        
        public function getProductWhynoteFilter($dataFilter){
            
            if (count($dataFilter['filterWhyNote'])==1 && $dataFilter['filterWhyNote'] !== 0){
                if(array_key_exists('product_name',$dataFilter['filterWhyNote'])){
                    echo json_encode( $this->model->getProductsOneFilter('product_name',$dataFilter['filterWhyNote']['product_name']));
                }
                else{
                    echo json_encode( $this->model->getProductsOneFilter('product_color',$dataFilter['filterWhyNote']['product_color']));
                }
            }
            else{
                $filter=['product_name','product_color'];
                $value=[$dataFilter['filterWhyNote']['product_name'],$dataFilter['filterWhyNote']['product_color']];
                echo json_encode( $this->model->getProductsTwoFilter($filter,$value));
            }

        }

    }