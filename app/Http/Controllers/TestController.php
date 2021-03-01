<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{



    /* ********************************************
    * 一覧画面
    *********************************************** */
    public function showIndex() {
        $test = Test::all();

        // dd($test);

        // viewを表示
        return view('test.index', ['test' => $test]);
    }



    /* ********************************************
    * 編集画面
    *********************************************** */
    public function showEdit($id) {
        // テストモデルからidを取得する
        $test = Test::find($id);
        
        // 取得したidに基づいたページを表示する
        return view('test.edit', ['test' => $test]);
    }



    /* ********************************************
    * 編集処理
    *********************************************** */
    public function exeUpdate(TestRequest $request) {
        // ブログのデータを受け取る
        $inputs = $request->all();

        // テストモデルのidをpostしたidと照合する
        $test = Test::find($inputs['id']);

        /*
        *  更新する内容はfillを使う
        *  配列も可
        */ 
        $test->fill([
            'title' => $inputs['title'],
            'content' => $inputs['content'],
        ]);
        // dd($test);
        // DBにデータを保存
        $test->save();

        return redirect(route('testIndex'));
    }



    /* ********************************************
    * 新規投稿画面
    *********************************************** */
    public function showCreate() {
        // viewを表示
        return view('test.create');
    }

    public function exeCreate(TestRequest $request) {
        // ブログのデータを受け取る
        $inputs = $request->all();

        // 新しくDBを作成する
        Test::create($inputs);

        return redirect(route('testIndex'));
    }



    /* ********************************************
    * 新規投稿画面
    *********************************************** */
    public function exeDelete($id) {
        Test::destroy($id);

        return redirect(route('testIndex'));
    }
}
