<?php

namespace App\Http\Controllers\Admin\Globals;
use App\Article;
use App\Http\Requests\ArticleRequest as Request;
use App\Http\Controllers\Admin\BaseController;
class ArticleController extends BaseController
{
    protected $header = [['title' => 'Адмін Панель', 'link' => 'global_dashboard'], ['title' => 'Новини', 'link' => 'global_dashboard']];
    protected $aside = 'Global';

    public function showArticles(){
        $articles = Article::paginate(25);
        $this->content = view('OLEGYERA.adm.articles.show')->with([
            'articles' => $articles,
        ])->render();
        return $this->renderPage();
    }

    public function createArticle(Request $request){
        if ($request->isMethod('post')) {
            $data = [];
            if(isset($request->image)){
                $data['image'] = $request->alias . '_' . $request->image->getClientOriginalName();
                $request->image->move(storage_path('app/public/images/'), $data['image']);
            }
            $data['title'] = $request->title;
            $data['alias'] = $request->alias;
            $data['text'] = $request->text;
            if (isset($request->fix)) {
                $data['fix'] = 1;
            }else{
                $data['fix'] = 0;
            }
            if (isset($request->show)) {
                $data['show'] = 1;
            }else{
                $data['show'] = 0;
            }
            if (isset($request->category)) {
                $data['category'] = $request->category;
            }else{
                $data['category'] = 0;
            }
            $article_new = Article::create($data);
            return redirect()->route('edit_article', $article_new->alias);
        }
        $this->content = view('OLEGYERA.adm.articles.create')->render();
        return $this->renderPage();
    }

    protected function uploadFile(Request $request){
        $path = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(storage_path('app/public/images/'), $path);
        return response()->json(asset('storage/images/' . $path));
    }

    public function editArticle(Request $request, $alias){
        $article = Article::where('alias', $alias)->first();
        if ($request->isMethod('post')) {
            $data = [];
            if(isset($request->image)){
                if($article->image != null){
                    unlink(storage_path('app/public/images/' . $article->image));
                }
                $article->image = $request->alias . '_' . $request->image->getClientOriginalName();
                $request->image->move(storage_path('app/public/images/'), $article->image);
            }
            if($article->title != $request->title){
                $article->title = $request->title;
                $article->alias = $request->alias;
            }

            if($article->text != $request->text){
                $article->text = $request->text;
            }

            if($request->fix == 'on'){
                $article->fix = 1;
            }else{
                $article->fix = 0;
            }

            if($request->show == 'on'){
                $article->show = 1;
            }else{
                $article->show = 0;
            }
//            dd($article);
            $article->category = $request->category;
            $article->save();
            return redirect()->route('edit_article', ['alias' => $article->alias]);
        }
        $this->content = view('OLEGYERA.adm.articles.edit')->with(['article' => $article])->render();
        return $this->renderPage();
    }

    public function deleteArticle($alias){
        $article = Article::where('alias', $alias)->first();
        if(!empty($article->image)){
            unlink(storage_path('app/public/images/' . $article->image));
        }
        $article->delete();
        return redirect()->route('global_articles');
    }
}
