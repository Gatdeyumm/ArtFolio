<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Clients/Index',[
            'clients' => Client::orderBy('title')->orderBy('artist')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'artist' => 'required',
            'email' => 'required',
            'price' => 'required|numeric',
        ]);

        $fileName = null;

        //process image
        if($request->pic){
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('images/product_pics'), $fileName);
            $fields['pic'] = $fileName;
        }

        Client::create($fields);

        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $client->load('transactions');
        return inertia('Clients/Show',[
            'client'=>$client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return inertia('Clients/Edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $fields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'artist' => 'required',
            'email' => 'required',
            'price' => 'required|numeric',
        ]);
    
        // // Process image
        // if ($request->pic) {
        //     $fileName = time() . '.' . $request->pic->extension();
        //     $request->pic->move(public_path('images/product_pics'), $fileName);
        //     $fields['pic'] = $fileName;
        // }
    
        // Update the attributes of the existing client
        $client->update($fields);
    
        return redirect('/clients/' . $client->id)->with('info', 'Artwork has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Add any validation or authorization checks here before deleting the client.
        // For example, check if the authenticated user has permission to delete clients.
    
        // Perform the deletion
        $client->delete();
        return redirect('/clients')->with('error', 'Artwork has been deleted');
    }

    public function pdf(Client $client) {
        $pdf = Pdf::loadView('pdf.client',[
            'client' => $client
        ]);

        return $pdf->stream();
    }
    public function email(Client $client) {
        //Create the pdf of the statement of the account
        $pdf = Pdf::loadView('pdf.client',[
            'client' => $client
        ]);

        $filename = 'statements/' . $client->title . "_" . $client->id . ".pdf";
        $pdf->save($filename);

        Mail::send('email.soa', ['client'=>$client], function($message) use ($client, $filename){
            $message->to($client->email);
            $message->subject('Statement of Account');
            $message->attach($filename);
        });
    }

    public function toggle(Client $client) {
        $client->enabled = !$client->enabled;
        $client->save();
        return back();
    }

    public function search($searchKey) {
        
        return inertia('Clients/Index', [
            'clients' => Client::where('title', 'like', "%$searchKey%")->orWhere('artist', 'like', "%$searchKey%")->get()
        ]);
    }
    
}
