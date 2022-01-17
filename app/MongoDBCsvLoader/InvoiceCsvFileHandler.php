<?php

namespace App\MongoDBCsvLoader;
use App\Models\Invoice;

class InvoiceCsvFileHandler{

    private $csvLine;
    private $fileds ;
    private $file;
    public function load($file_path){
        if($this->checkIsCsvFile($file_path)){
            if(file_exists($file_path)){
                $this->file = fopen($file_path, "r");
                if ( ($this->fileds = fgetcsv($this->file, 1000, ",")) === false ) 
                    throw new  \Exception("Error Processing csv file");       
            }
            else{
                throw new \Exception("file not found");
            }

        }
        else{
            throw new \Exception("is not a csv file");
        }
    }

    private function checkIsCsvFile($file){
        return preg_match("#\.csv$#", $file);
    }

    public function ReadNextLine(){
        $this->csvLine = fgetcsv($this->file, 1000, ",");
        if ($this->csvLine)
            return true;
        return false;
    }

    /*
    *
    * This solution requires the use of the $fillable property, so we opt for the second one
    *
    public function InsertInvoice(){
        $invoiceTable = [];
        if($this->csvLine && $this->fileds){
            for( $i = 0; $i < count($this->csvLine); $i++){
                $invoiceTable[$this->fileds[$i]] = $this->csvLine[$i];
            }
            if(Invoice::create($invoiceTable) != null) return true;
        }
        return false;
    }*/
    public function InsertInvoice(){
        $invoice = new Invoice();
        if($this->csvLine && $this->fileds){
            for( $i = 0; $i < count($this->csvLine); $i++){
                $invoice->{$this->fileds[$i]}= $this->csvLine[$i];
            }
            if($invoice->save()) return true;
        }
        return false;
    }
}

