@extends('layout')
@section('title', 'テスト編集')
@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>ブログ編集フォーム</h2>
    <form method="POST" action="{{ route('testUpdate') }}" onSubmit="return checkSubmit()">
      @csrf
      <input type="hidden" name="id" value="{{ $test->id }}">

      {{-- タイトル --}}
      <div class="form-group">
        <label for="title">タイトル</label>
        <input id="title" name="title" class="form-control" value="{{ $test->title }}" type="text">
      </div>

      {{-- 本文 --}}
      <div class="form-group">
        <label for="content">本文</label>
        <textarea id="content" name="content" class="form-control" rows="4">{{ $test->content }}</textarea>
      </div>

      <div class="mt-5">
        <a class="btn btn-secondary" href="{{ route('testIndex') }}">キャンセル</a>
        <button type="submit" class="btn btn-primary">更新する</button>
      </div>
    </form>
  </div>
</div>


<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection