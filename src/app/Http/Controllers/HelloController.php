<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
    body {
        font-size: 16px;
        color: #999;
    }
    h1 {
        font-size: 48px;
        color: #eee;
        margin: 40px;
    }
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';
function tag($tag, $text)
{
    return "<{$tag}>" . $text . "</{$tag}>";
}


class HelloController extends Controller
{
    public function index(Request $request, Response $response)
    {
        global $head, $style, $body, $end;
        $html = $head . tag('title', 'Hello/index') . $style . $body
            . tag('h1', 'Index')
            . '<a href="/hello/other">Go to Other Page</a>'
            . tag('h3', 'Request')
            . '<pre>' . $request . '</pre>'
            . tag('h3', 'Response')
            . '<pre>' . $response . '</pre>'
            . $end;
        $response->setContent($html);
        return $response;
    }

    public function other()
    {
        global $head, $style, $body, $end;
        $html = $head . tag('title', 'Hello/other') . $style . $body
            . tag('h1', 'Other')
            . $end;
        return $html;
    }
}
