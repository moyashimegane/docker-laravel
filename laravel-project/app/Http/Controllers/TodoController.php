<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
//    public function index(Todo $todo)
    public function index(Request $request)
    {
        $previous_url = url()->previous();
        $length = explode('=', $previous_url);
        if (count($length) === 1) {
            $order = null;
        } else {
            $order = $length[count($length) - 1];
        }

        //パラメータが無い場合（デフォルト）はidの降順（desc）を設定
        if (is_null($order)) {
            $order_param = 'desc';
            $order = 'desc';
        } elseif ($order == "desc") {
            $order_param = "asc";
            $order = 'asc';
        } else {
            $order_param = "desc";
            $order = 'desc';
        }

        $todos = Todo::orderBy('id', $order)->paginate();
        return view('todo.index', [
            'todos' => $todos,
            'order' => $order_param,   //viewのリンクパラメータを設定
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->save();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を登録しました!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);

        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->title = $request->input('title');
        $todo->save();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を更新しました!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を削除しました!'
        );
    }
}
