<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Csv\Reader;

class TransactionController extends Controller
{
   /** 
     * Get all transactions
     * 
     * @return \Illuminate\Http\Response 
     */
   	public function transactions() 
    {
    	// File to read
    	$file = storage_path('transactions.csv');

    	// Create object to read the file
    	$csv = Reader::createFromPath($file, 'r');

    	// Get all records from .csv
    	$records = $csv->getRecords();

    	// Infantilize array
    	$transactions = [];

    	// Iterate on the records and save into array
    	foreach ($records as $offset => $record) {
    		array_push($transactions, $record);
    	}

    	// Return response in JSON
    	return response()->json(['transactions'=> $transactions], 200); 
    }

    /** 
     * Get one transaction
     * 
     * @return \Illuminate\Http\Response 
     */
   	public function transaction($id) 
    {
    	// File to read
    	$file = storage_path('transactions.csv');

    	// Create object to read the file
    	$csv = Reader::createFromPath($file, 'r');

    	// Get records from .csv to a specific line
    	$csv->setHeaderOffset((int) $id);

    	//Returns line
    	$header_offset = $csv->getHeaderOffset();

    	//Triggers a Exception exception
		$transaction = $csv->getHeader();

    	// Return response in JSON
    	return response()->json(['transaction'=> $transaction], 200); 
    }
}
