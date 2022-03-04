<?php

namespace App\Http\Controllers;

use App\Models\UrlCheck;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DiDom\Document;

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

        $document = new Document($response->body());

        if ($title = $document->first('title::text')) {
            $urlCheck->title = $title;
        }

        if ($h1 = $document->first('h1::text')) {
            $urlCheck->h1 = $h1;
        }

        if ($meta = $document->first('meta[name=description]::attr(content)')) {
            $urlCheck->description = $meta;
        }

        $urlCheck->save();

        flash('Проверка добавлена')->success();         

        return redirect()->route('urls.show', $url_id);
    }
}
