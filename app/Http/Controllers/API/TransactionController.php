<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Csv\Reader;

class TransactionController extends Controller
{
   /** 
     * Register API user
     * 
     * @return \Illuminate\Http\Response 
     */
   	public function transactions(Request $request) 
    {
    	// File to read
    	$file = storage_path('transactions.csv');

    	// Create object to read the file
    	$reader = Reader::createFromPath($file, 'r');

    	// Get all records from .csv
    	$records = $reader->getRecords();

    	// Infantilize array
    	$transactions = [];

    	// Iterate on the records and save into array
    	foreach ($records as $offset => $record) {
    		array_push($transactions, $record);
    	}

    	// Return response in JSON
    	return response()->json(['transactions'=> $transactions], 200); 
    }
}
