<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /*
    * ブログ一覧を表示する
    * @return view
    */
    public function showList() {
        $blogs = Blog::all();
        // dd($blogs);
        
        return view('blog.list', ['blogs' => $blogs]);
    }

    /*
    * ブログ詳細を表示する
    * @param int $id
    * @return view
    */
    public function showDetail($id) {
        $blog = Blog::find($id);

        // もしデータが無かった場合
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs')); //web.php で付けたname
        }

        return view('blog.detail', ['blog' => $blog]);
    }

    /*
    * ブログ登録画面を表示する
    */
    public function showCreate() {
        return view('blog.form');
    }

    /*
    * ブログ登録する
    */
    public function exeStore(BlogRequest $request) {
        // 投稿された値を全て見る
        // dd($request->all());

        // ブログのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            // ブログを登録
            Blog::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを登録しました');
        return redirect(route('blogs'));
    }

    // ブログ編集
    public function showEdit($id) {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        return view('blog.edit', ['blog' => $blog]);
    }

    /*
    * ブログ更新する
    */
    public function exeUpdate(BlogRequest $request) {
        // 投稿された値を全て見る
        // dd($request->all());

        // ブログのデータを受け取る
        $inputs = $request->all();

        // どんな内容が送られているか確認
        // dd($inputs);

        \DB::beginTransaction();
        try {
            // ブログを更新
            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
            ]);
            $blog->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを更新しました');
        return redirect(route('blogs'));
    }


    /*
    * ブログ削除
    */
    public function exeDelete($id) {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        try {
            Blog::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('blogs'));

    }
}
