@extends("layouts.app")
@section("content")
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        登録画面
      </div>
      <div class="card-body">
        <form method="POST" action="/todos">
          @csrf
          <div class="form-group">
            <label for="title" class="control-label">タイトル</label>
            <input class="form-control" name="title" type="text">
            <label for="description" class="control-label">内容（140文字以内）</label>
            <input class="form-control" name="description" type="text" maxlength="140">
          </div>
          <button class="btn btn-primary" type="submit">登録</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection