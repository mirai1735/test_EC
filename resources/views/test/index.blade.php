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
        <th><a href="/testEC/public/test/edit/{{ $test->id }}" type="button" class="btn">編集</a></th>
        <th><button type="button" class="btn">削除</button></th>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $test->id }}

</div>
@endsection