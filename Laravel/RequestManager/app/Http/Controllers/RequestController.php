<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8080/api/items');
        $items = json_decode($response->getBody()->getContents());
        return view('index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
            'body' => 'required',
        ]);
        $item = [
            'text' => $request->input('text'),
            'body' => $request->input('body')
        ];
        $client = new Client();
        try {
            $client->post('http://127.0.0.1:8080/api/items',['json' => $item]);
        } catch (RequestException $e){
            return redirect('/')->with('fail','Failed to create an item');
        }
        return redirect('/')->with('success','Item created successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8080/api/items/'.$id);
        $item = json_decode($response->getBody()->getContents());
        return view('edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required',
            'body' => 'required',
        ]);
        $item = [
            'text' => $request->input('text'),
            'body' => $request->input('body')
        ];
        $client = new Client();
        try {
            $client->put('http://127.0.0.1:8080/api/items/'.$id,['json' => $item]);
        } catch (RequestException $e){
            return redirect('/')->with('fail','Failed to update an item');
        }
        return redirect('/')->with('success','Item updated successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client();
        try {
            $client->delete('http://127.0.0.1:8080/api/items/'.$id);
        } catch (RequestException $e){
            return redirect('/')->with('fail','Failed to delete an item');
        }
        return redirect('/')->with('success','Item deleted successfully!!!');
    }
}
