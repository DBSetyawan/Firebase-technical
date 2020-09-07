<?php

namespace App\Http\Controllers;

use Kreait\Firebase;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;

class FirebaseController extends Controller
{

    protected $req;
    // protected $db;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->req = $request;
        // $db = 
        // $this->db = new FirestoreClient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravel-api-product-5d8c1c05fa00.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravel-api-product.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $newPost = $database
        ->getReference('/product')
        ->push([
            'product' => 'barang 213' ,
            'product_description' => 'test barang masuk realtime data.'
        ]);
        // $db = new FirestoreClient();

        // $citiesRef = $db->collection('product');
        // $query = $citiesRef->where('product', '=', 'Lorems C');
        // $snapshot = $query->documents();
        // foreach ($snapshot as $document) {
        //     printf('Document %s returned by query state=CA' . PHP_EOL, $document->id());
        // }
        echo '<pre>';


        print_r($newPost->getvalue());
    }

    public function firestoreSet(){
          $db = new FirestoreClient([
            'projectId' => 'laravel-api-product']
          );

        $data = [
            'product' => $this->req->product,
            'product_description' => $this->req->product_description
        ];

        // return [$data];die;

        $db->collection('products')->document('products')->set($data);
    }

}
