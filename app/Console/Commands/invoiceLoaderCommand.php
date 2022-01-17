<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MongoDBCsvLoader\InvoiceCsvFileHandler;

class invoiceLoaderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:load {file : The invoices csv file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command created for an intern test, used to load the contents of a invoices csv file into a mongodb database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(InvoiceCsvFileHandler $csvLoader)
    {
        $csvFile = $this->argument('file');
        $this->warn("This command will apply some changes on your database");
        if ($this->confirm('Do you wish to continue?', true)) {
            try{
                $csvLoader->load($csvFile);
                $line = 0;
                while($csvLoader->ReadNextLine()){
                    if($invoice = $csvLoader->insertInvoice()){
                        $this->info("Document number ".$line." is created successfully !");
                        $line++;
                    }
                    else{
                        $this->warn("Warning: Document number ".$line." is not created !");
                    }
                }
            }
            catch(\Exception $e){
                echo $e->getMessage();
                if($e->getMessage() === "is not a csv file"){
                    $this->error("The file you entered is not a csv file");
                }
                if($e->getMessage() === "file not found"){
                    $this->error("The file you entered  not found");
                }
            }
        }       
        return 0;
    }
}
