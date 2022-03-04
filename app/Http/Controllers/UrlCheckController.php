<?php

namespace App\Http\Controllers;

use App\Models\UrlCheck;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $url = Url::findOrFail($url_id);

        $urlCheck = new UrlCheck();
        $urlCheck->url_id = $url_id;

        $response = Http::get($url->name);
        $urlCheck->status_code = $response->status();
        
        $urlCheck->save();

        flash('Проверка добавлена')->success();         

        return redirect()->route('urls.show', $url_id);
    }
}
