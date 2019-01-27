<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Entities\Order;
use App\Entities\Transaction;

class OrderController extends Controller
{

    public function make()
    {
        // buat transaksi baru di table transaksi
        // isert order item dengan referensi transaksi id di table order
        // kirim pesan sukses atau error

    }

    public function show($request, $response, $args)
    {
        //representate of transaction id
        $id = $args['id'];

        $sort = $request->getParams('sort'); //asc or dsc
        $filter = $request->getParams('filter'); // ['date','trans','refs']
        $key = $request->getParams('key');

        $transaction_data = [];

        // fungsi untuk filter data lagnsung dari database
        // filter berdasrkan tgl, id_ref, id_trans
        switch ($filter) {
            case 'date':
                # code... get trans where date is (equals or greater less than) with key
                break;

            case 'transaction':
                # code...  get trans where id_trans is (equals or greater less than) with key
                break;

            case 'references':
                # code... get trans where id_ref is (equals or greater less than) with key
                break;

            default:
                # code...
                break;
        }

        // fungsi untuk sorting data array di variable $transaction_data yang hasil dari database
        // sort Ascending , Descending
        // Key - krsort() | Value - arsort()
        switch ($sort) {
            case 'asc':
                # code...
                break;

            case 'dsc':
                # code...
                break;

            default:
                # code...
                break;
        }

        // return data
    }

}