<?php
    class csv extends mysqli
    {
        private $state_csv =false;
        public function __construct()
        {
            parent::__construct("localhost","root","","zadatak");//ubaciti ime baze
            if($this->connect_error) {
                echo "Greska prilikom konektovanja na Bazu : ".$this->connect_error;
            }
        }
        public function import($file)
        {
            $first=false;
            $file=fopen($file,'r');
           
           while($row=fgetcsv($file)){
                var_dump($row);
                if(!$first){
                    $first=true;
                }
                else{
                    $first=false;
                }
                    
                
               /* print "<pre>";
                print_r($row);
                print "</pre>";*/
                $value= "'". implode("','",$row) . "'";
                // ovde se ubacuju tabele da bi se file zapravo stavio
                $q="INSERT INTO products(model_number,category_name,deparment_name,manufacturer_name,upc,sku,regular_price,sale_price,description,url) VALUES(".$value.")";
       
                if($this->query($q)){
                    $this->state_csv = true;
                }
                else{
                    $this->state_csv = false;
                    echo $this->error;
                }
            }
            if($this->state_csv) {
                echo "Uspeno ubaceno";
            }
            else{
                echo "Greska pilikom ubacivanje";
            }
             
        }
        public function export()
        {
            $this->state_csv=false;
            $q = "SELECT ";// ovde ide informacije o bazi 
            $run = $this->query($q);
            if($run->num_rows>0){
                $fn = "csv_".uniqid().".csv";
                $file=fopen($fn, "w");
                while($row=$run->fetch_array(MYSQLI_NUM)){
                    if($fputcsv($file,$row)){
                    $this->state_csv = true;
                    }
                    else{
                    $this->state_csv = false;
                    echo $this->error;
                    }
                }
                    if($this->state_csv) {
                        echo "Uspeno exportovano";
                    }
                    else{
                        echo "Greska pilikom ubacivanje";
                    }
                    fclose($file);
            }
            else{
                echo "File nije pronadjen";
            }
        }
    }


?>