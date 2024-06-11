<?php

namespace App\Http\Controllers;

use App\Models\Seguidor;
use App\Models\Twit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TwitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function seguir(Request $request, User $user)
    {
        $registro = Seguidor::where('seguidor_id', Auth::id())
            ->where('seguido_id', $user->id)
            ->first();

        if ($request->has('seguir')) {
            if (!$registro) {
                DB::table('seguidores')->insert([
                    'seguidor_id' => Auth::id(),
                    'seguido_id' => $user->id,
                ]);
                return redirect()->route('users.show', $user->email)->with('success', 'Siguiendo');
            } else {
                return redirect()->route('users.show', $user->email)->with('error', 'Ya le sigues');
            }
        } elseif ($request->has('no_seguir')) {
            if ($registro) {
                DB::table('seguidores')
                    ->where('seguidor_id', Auth::id())
                    ->where('seguido_id', $user->id)
                    ->delete();

                return redirect()->route('users.show', $user->email)->with('success', 'Dejado de seguir');
            } else {
                return redirect()->route('users.show', $user->email)->with('error', 'No le sigues');
            }
        } else {
            return redirect()->route('users.show', $user->email)->with('error', 'Acción no válida');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Twit $twit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Twit $twit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Twit $twit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Twit $twit)
    {
        //
    }
}
