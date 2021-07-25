<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Mostra a listagem dos usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();
        return view('index', compact('usuario'));
    }

    /**
     * Mostra o formulario para o cadastro de um novo usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Armazena os dados do usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255|unique:usuarios',
            'cpf' => 'required|numeric|unique:usuarios',
            'email' => 'required|email|max:255',
            'password' =>'required|confirmed|max:255',
            'address' =>'required|max:255',
            'status' =>'required|max:255',
        ], [
            'name.required' => 'O Nome deve ser preenchido',
            'name.unique:usuarios' => 'O Nome já está sendo utilizado',
            'cpf.required' => 'O CPF deve ser preenchido',
            'cpf.numerico' => 'O CPF deve conter somente numeros',
            'email.required' => 'O Email deve ser preenchido',
            'email.unique:usuarios' => 'O Email já esta sendo utilizado',
            'email.email' => 'O Email está incorreto',
            'password.required' => 'A Senha deve ser preenchida',
            'password.confirmed' => 'A Confirmação da Senha deve ser igual a Senha',
            'address.required' => 'O Endereço deve ser preenchido',
            'status.required' => 'O Status deve ser preenchido',
        ]);
        $usuario = Usuario::create($storeData);

        return redirect('/usuarios')->with('completed','Usuario foi salvo com sucesso!');
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Mostra o formulario para editar o usuario
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('edit', compact('usuario'));
    }

    /**
     * Atualiza o usuario requisitado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255|unique:usuarios',
            'cpf' => 'required|numeric|unique:usuarios',
            'email' => 'required|email|max:255|unique:usuarios',
            'password' =>'required|confirmed|max:255',
            'address' =>'required|max:255',
            'status' =>'required|max:255',
        ], [
            'name.required' => 'O Nome deve ser preenchido',
            'name.unique:usuarios' => 'O Nome já está sendo utilizado',
            'cpf.required' => 'O CPF deve ser preenchido',
            'cpf.numerico' => 'O CPF deve conter somente numeros',
            'email.required' => 'O Email deve ser preenchido',
            'email.unique:usuarios' => 'O Email já esta sendo utilizado',
            'email.email' => 'O Email está incorreto',
            'password.required' => 'A Senha deve ser preenchida',
            'password.confirmed' => 'A Confirmação da Senha deve ser igual a Senha',
            'address.required' => 'O Endereço deve ser preenchido',
            'status.required' => 'O Status deve ser preenchido',
        ]);
        Usuario::whereId($id)->update($updateData);
        return redirect('/usuarios')->with('completed','Usuario foi atualizado');
    }

    /**
     * Remove o usuario requisitado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect('/usuarios')->with('completed','Usuario foi removido');
    }

}
