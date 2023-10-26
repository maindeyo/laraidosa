<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisteredUserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect(url('/'));
    } else {
        return view ('dashboard');
    }
});

Route::get('/login', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Route::get('/login', [AuthController::class, 'create']); //a funcao executada vai ser a create do controller
// Route::post('/login', [AuthController::class, 'auth'])->name('login');

// //Route::get('/login', function(){
//     //return view('auth.login');


// /*Route::post('/login', function (Request $request){ //lembrar de importar em cima
//    //colocar dentro do parentesse oq quer pegar do formulário
//     $nome = $request->post('nome');
//     $senha = $request->senha;

//     //colocar uma condição se quiser
//     if ($nome == 'maria' && $senha == 123123){
//         return redirect()->to( url('/dashboard', [ 'nome' => $nome]) );
//         //logou
//     } else {
//         //retorna p formulário de login
//         //volta para os imputs e preserva oq digitou antes e tem q colocar no arquivo do form
//         return back()->withInput();
//     }
     
// })->name('login'); */


//     Route::get('/dashboard/{nome}', function(String $nome){
//         return view('dashboard', [
//             'nome' => $nome

//         ]);
//     });
    

// Route::get('/dashboard/{disciplina}/{assunto}',
//     function(String $disciplina, String $assunto){
//         return $disciplina . " " . $assunto;

//     });

//     Route::get('/logout/{nome}', [AuthController::class, 'logout']); //como juan fez
//     //Route::get('/logout/{nome}', function(String $nome) { //como romerito fez
//     //    echo 'Voce saiu';
//     //});
    
    

// //quebra o redic. do login
// //Route::get('/dashboard/{nome}', function(String $nome){
//     //return view('dashboard', [
//         //'nome' => $nome,
//    // ]);
// //});
// //registro de rota para requisição GET
// //dps da barra retorna a página
// //dps da vírgula é a ação (função), e n precisa ter nome pq vai ter essa função apenas nessa rota
// //Route::get('/info1m', function() {
//     //return "Oi Sumidx!";
// //});

// //Route::get('/login', function() {
//     //return view('auth.login'); //ultimo nome  do arquivo
// //});

// // Rotas Tarefas -- CRUD
// Route::get('/create', [TaskController::class, 'create']); //vai pro forms
// Route::post('/store', [TaskController::class, 'store']); //validar o formulario
// Route::get('/show/{id}', [TaskController::class, 'show']); //mostrar 
// Route::get('/edit/{id}', [TaskController::class, 'edit']);
// Route::post('/update/{id}', [TaskController::class, 'update']);