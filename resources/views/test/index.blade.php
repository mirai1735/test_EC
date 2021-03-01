@extends('layout');
@section('title', 'テスト')
@section('content')



<div>
  <table class="table">
    <tbody>
      <tr class="">
        <th class="">id</th>
        <th class="">title</th>
        <th class="">content</th>
        <th class="">created_at</th>
        <th class="">updated_at</th>
        <th></th>
        <th></th>
      </tr>
  
      @foreach ($test as $test)
      <tr>
        <th>{{ $test->id }}</th>
        <th>{{ $test->title }}</th>
        <th>{{ $test->content }}</th>
        <th>{{ $test->created_at }}</th>
        <th>{{ $test->updated_at }}</th>
        <th><a href="/testEC/public/test/edit/{{ $test->id }}" type="button" class="btn btn-primary">編集</a></th>

        <form action="{{ route('exeDelete', $test->id) }}" method="POST">
          @csrf
          <th><button type="submit" class="btn btn-danger">削除</button></th>
        </form>

      </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{ route('testCreate') }}" class="btn btn-success">新規投稿</a>

</div>
@endsection