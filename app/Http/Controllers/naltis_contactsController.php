<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\naltis_contacts;
// use  App\Models\liste;

class naltis_contactsController extends Controller
{
  public function index()
  {
      return view('naltis_contacts.index');
  }

  public function liste()
  {
    $contacts = naltis_contacts::all();
    $contacts = naltis_contacts::orderBy('nom')->get();
      return view('naltis_contacts.liste', ['contacts' => $contacts]);
  }

  public function ajouter(Request $request)
  {  
    $data = $request->validate([
        'id_parent' => 'nullable|integer',
        'nom'       => 'required|string',
        'prenom'    => 'required|string',
        'tel'       => 'required|string',
        'tel2'      => 'nullable|string',
        'email'     => 'nullable|string',
        'mimi'    => 'nullable|string',
        'address'   => 'required|string',
    ]);
      // Create a new contact
    $newContact = naltis_contacts::create($data);
      // Redirect to the contact list view
      return redirect(route('naltis_contacts.liste'))->with('success', 'Contact Added Successfully');

  }
    
  public function edit(naltis_contacts $naltis_contacts)
  {
      // dd($naltis_contacts);
    $contacts = naltis_contacts::orderBy('nom')->get();
      return view('naltis_contacts.edit', ['contacts' => $naltis_contacts]);
  }

  public function update(naltis_contacts $naltis_contacts, Request $request)
  {
    $data = $request->validate([
        'id_parent'=> 'nullable|integer',
        'nom'     => 'required',
        'prenom'  => 'required',
        'tel'     => 'required|String',
        'tel2'    => 'nullable|String',
        'email'   => 'nullable|String', 
        'groupe'  => 'nullable|string',
        'address' => 'required|String'
    ]);
    $naltis_contacts->update($data);
      return redirect(route('naltis_contacts.liste'))->with('success', 'Contact Updated Succesffully');

  }

  public function destroy(naltis_contacts $naltis_contacts)
  {
    $naltis_contacts->delete();
      return redirect(route('naltis_contacts.liste'))->with('success', 'Contact supprimer Succesffully');
  }

  public function add(naltis_contacts $naltis_contacts)
  {
      return redirect(route('naltis_contacts.index'));
  }
}
