@extends('layout')
@section('title', 'ログイン画面')
@section('content')


<div class="login_head">
  <h3>管理画面</h3>
</div>


<section class="login_body">
  <form action="" method="post" accept-charset="utf-8">
  <div class="">

    <table class="m-auto login_table">
      <tr>
        {{-- <th>ID</th> --}}
        <td class="login_th__login_id">
          <input class="login_input w-100 mb_20" type="text" name="LOGIN_ID" value="">
        </td>
      </tr>
      <tr>
        {{-- <th>パスワード</th> --}}
        <td class="login_th__login_password">
          <input class="login_input w-100 mb_40" type="password" name="PASSWORD" value="">
        </td>
      </tr>
      <tr>
        {{-- <th></th> --}}
        <td>
          <button class="login_btn w-100" type="submit">ログイン</button>
        </td>
      </tr>
    </table>
    
  </div>

  
  </form>
</section>

@endsection