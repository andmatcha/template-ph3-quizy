@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>わああああ</p>
    <p>view composer message = {{ $view_message }}</p>

    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot

        @slot('msg_content')
            これはメッセージ表示です
        @endslot
    @endcomponent

    @include('components.message', ['msg_title' => 'OK', 'msg_content' => 'さぶびゅーです'])

    @each('components.item', $items, 'item')

@endsection

@section('footer')
    フッターだよおおお
@endsection
