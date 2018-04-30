<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use willvincent\Rateable\Rating;
use DB;
use App\Annonce;
use App\User;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Annonce::orderBy('created_at', 'desc')->paginate(10);
        return view('annonce.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonce.add');
    }

    public function search()
    {
        $taille = Input::get ( 'taille' );
        $couleur = Input::get ( 'couleur' );
        $min_price = Input::get ( 'min_price' );
        $max_price = Input::get ( 'max_price' );
        $city = Input::get ( 'city' );
        $note = Input::get ( 'note' );
        $categorie = Input::get ( 'categorie' );
        $annonce = DB::table('annonces')
            ->join('photos', 'annonces.id', '=', 'photos.annonce_id')
            ->join('users', 'annonces.user_id', '=', 'users.id')
            ->when($taille, function ($query) use ($taille) {
                return $query->where('taille', $taille);
            })
            ->when($couleur, function ($query) use ($couleur) {
                return $query->where('couleur', $couleur);
            })
            ->when($categorie, function ($query) use ($categorie) {
                return $query->where('categorie', $categorie);
            })
            ->when($min_price, function($query) use($min_price){
                return $query->where('prix', '>=', $min_price);
            })
            ->when($max_price, function($query) use($max_price){
                return $query->where('prix', '<=', $max_price);

            })
            ->when($city, function($query) use($city){
                return $query->where('city', $city);
            })
            ->get();
        return view('/annonce/search')->withDetails($annonce);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Annonce $annonce)
    {
        $annonce->description = $request->description;
        $annonce->titre = $request->titre;
        $annonce->categorie = $request->categorie;
        $annonce->note = $request->note;
        $annonce->taille = $request->taille;
        $annonce->couleur = $request->couleur;
        $annonce->prix = $request->prix;
        $annonce->user_id = \Auth::user()->id;
        $annonce->save();
        return view('photo.add', compact('annonce'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(\Auth::id() == $id) {
            return view('annonce.show')->with('annonces', Annonce::orderBy('created_at', 'desc')->where('user_id', $id)->get());
        }else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonce = Annonce::findOrfail($id);
        if(\Auth::id() == $annonce->user_id) {
        return view('annonce.edit', compact('annonce'));
        }else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annonce = Annonce::findOrfail($id);
        if(\Auth::id() == $annonce->user_id) {
            \DB::table('annonces')
                ->where('id', $id)
                ->update(array('titre' => $request->titre,
                    'description' => $request->description,
                    'prix' => $request->prix,
                    'couleur' => $request->couleur,
                    'categorie' => $request->categorie,
                    'taille' => $request->taille,
                    'user_id' => \Auth::id(),
                ));
            return view("photo.edit", compact('annonce'));
        }else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annonce = Annonce::findOrfail($id);
        if(\Auth::id() == $annonce->user_id) {
            $annonce->delete();
            \Session::flash('flash_message', 'Your article has been deleted !');
            return redirect('ad');
        } else {
            abort(404);
        }
    }
}
