<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('user_id', $request->user()->id)
            ->get();

        return view('categories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $categoryName = $request->input('category_name');

        if (is_string($categoryName)) {
            $categoryName = mb_convert_kana($categoryName, 'aKV', 'UTF-8');
            $categoryName = strtoupper($categoryName);
            $categoryName = strtr($categoryName, [
                '～' => '~',
                '＂' => '"',
                "＇" => "'",
                '＼' => '\\',
            ]);
            $request->merge([
                'category_name' => $categoryName,
            ]);
        }

        $validated = $request->validate([
            'category_name' => [
                'bail',
                'required',
                'string',
                'max:32',
                'not_regex:/[\s\p{Z}\p{Cc}]/u',
                Rule::unique('categories', 'category_name')
                    ->where('user_id', $request->user()->id)
            ],
        ], [
            'category_name.required' => 'カテゴリ名を入力してください',
            'category_name.string' => 'カテゴリ名は文字列で入力してください',
            'category_name.max' => 'カテゴリ名は32文字以内で入力してください',
            'category_name.not_regex' => 'カテゴリ名にスペース・改行・制御文字は使用できません',
            'category_name.unique' => 'このカテゴリ名はすでに登録されています',
        ]);

        $category = new Category;
        $category->category_name = $validated['category_name'];
        $category->user_id = $request->user()->id;
        $category->save();
        
        return redirect()->route('categories.index');
    }
}
