<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwitController;
use App\Models\Seguidor;
use App\Models\Twit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/index', function () {

        $seguidores = Seguidor::where('seguidor_id', Auth::id())->get();

        // Inicializar un array para almacenar los twits
        $twits = [];

        // Iterar sobre los seguidores y recoger sus twits
        foreach ($seguidores as $seguidor) {
            $seguido = $seguidor->seguido_id;

            // Obtener los twits del usuario seguido
            $registros_twits = Twit::where('user_id', $seguido)->get();

            // Agregar los twits del usuario seguido al array de twits
            foreach ($registros_twits as $twit) {
                $twits[] = $twit;
            }
        }

        // Devolver la vista con los twits
        return view('twits.index', [
            'twits' => $twits,
        ]);
    });





    Route::get('/{user:email}', function (User $user) {

        $twits = Twit::where('user_id', $user->id)->get();

        return view('users.show', [
            'user' => $user,
            'twits' => $twits,
        ]);
    });


    Route::post('/{user:email}', [TwitController::class, 'seguir'])->name('users.show');

});

require __DIR__ . '/auth.php';
