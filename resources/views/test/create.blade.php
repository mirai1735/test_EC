@extends('layout')
@section('title', 'テスト新規投稿')
@section('content')


<div>

  <form action="{{ route('testexeCreate') }}" method="POST">
    @csrf

    <table class="table card">
      <tbody class="card-body bg-light">
        <tr class="border">
          <td class="w-25">タイトル</td>
          <td class=""><input type="text" name="title"></td>
        </tr>
        <tr>
          <td>本文</td>
          <td><textarea name="content" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" class="btn btn-success w-100"></td>
          <td></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>


@endsection