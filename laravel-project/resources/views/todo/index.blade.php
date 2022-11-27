@extends("layouts.app")
@section("content")
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        一覧画面
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <a href="{{ url('todos/create') }}" class="btn btn-success mb-3">登録</a>
        <table class="table">
          <thead>
            <tr>
              <th>ToDo ID</th>
              <th>タイトル</th>
              <th>作成日</th>
              <th>更新日</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($todos as $todo)
            <tr>
              <td>{{ $todo->id }}</td>
              <td>{{ $todo->title }}</td>
              <td>{{ $todo->created_at }}</td>
              <td>{{ $todo->updated_at }}</td>
              <td><a href="{{ url('todos/' . $todo->id) }}" class="btn btn-info">詳細</a></td>
              <td><a href="{{ url('todos/' . $todo->id . '/edit') }}" class="btn btn-primary">編集</a></td>
              <td>
                <form method="POST" action="/todos/{{ $todo->id }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">削除</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection