@extends('layouts.quiz')


@section('title', $bq->title)
@section('heading', $bq->title)
<!-- 設問に関するループ -->
@section('quiz_content')
    @foreach ($bq->questions as $question)
        <!-- クイズボックス -->
        <div class="quiz-box">
            @include('components.question_head', [
                'iteration' => $loop->iteration,
                'image' => $question->img,
            ])
            <ul id="choices{{ $question->id }}" class="choices-list">
                <!-- 選択肢に関するループ -->
                @foreach ($question->choices as $choice)
                    @include('components.choice', [
                        'question_id' => $question->id,
                        'iteration' => $loop->iteration,
                        'valid' => $choice->valid,
                        'name' => $choice->name,
                    ])
                @endforeach
            </ul>
        </div>
        <!-- コメントボックス -->
        @include('components.comment', ['question_id' => $question->id])
    @endforeach
@endsection

@section('script')
    <script src="{{ asset('js/quiz.js') }}"></script>
@endsection
