<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    //一覧画面
    public function showIndex() {
        $test = Test::all();

        // dd($test);

        // viewを表示
        return view('test.index', ['test' => $test]);
    }

    //編集画面
    public function showEdit($id) {
        $test = Test::find($id);
        
        // dd($test);
        return view('test.edit', ['test' => $test]);
    }

    //更新処理
    public function exeUpdate(TestRequest $request) {
        // 投稿された値を全て見る
        // dd($request->all());

        // ブログのデータを受け取る
        $inputs = $request->all();

        // どんな内容が送られているか確認
        // dd($inputs);

        \DB::beginTransaction();
        try {
            // ブログを更新
            $test = Test::find($inputs['id']);
            $test->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
            ]);
            $test->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        // dd($test);

        \Session::flash('err_msg', 'ブログを更新しました');
        return redirect(route('testIndex'));
    }
}
