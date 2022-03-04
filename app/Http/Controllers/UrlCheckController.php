<?php

namespace App\Http\Controllers;

use App\Models\UrlCheck;
use Illuminate\Http\Request;

class UrlCheckController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $url_id)
    {
        $urlCheck = new UrlCheck();
        $urlCheck->url_id = $url_id;
        $urlCheck->title = $request['title'];
        $urlCheck->save();

        flash('Проверка добавлена')->success();         

        return redirect()->route('urls.show', $url_id);
    }
}
