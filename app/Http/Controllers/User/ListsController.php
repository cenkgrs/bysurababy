<?php

namespace App\Http\Controllers\User;

use App\Models\User\Lists;
use Illuminate\Http\Request;
use App\Models\User\ListProducts;

class ListsController
{

    public function index()
    {
        $lists = Lists::getLists();

        $data = ['lists' => $lists];

        return view('user.lists.index', $data);
    }

    public function createList(Request $request)
    {
        $input = $request->all();

        Lists::createList($input);

        return response()->json(['status' => true]);
    }

    public function updateList(Request $request)
    {
        $input = $request->all();

        Lists::updateList($input);

        return response()->json(['status' => true]);
    }

    public function clearList(Request $request)
    {
        $input = $request->all();

        ListProducts::clearList($input['list_id']);

        return response()->json(['status' => true]);
    }

    public function addProductToList(Request $request)
    {
        $input = $request->all();

        ListProducts::addProductToList($input['product_id'], $input['list_id']);

        return response()->json(['status' => true]);
    }

    public function removeProductFromList(Request $request)
    {
        $input = $request->all();

        ListProducts::removeProductFromList($input['product_id'], $input['list_id']);

        return response()->json(['status' => true]);
    }
}