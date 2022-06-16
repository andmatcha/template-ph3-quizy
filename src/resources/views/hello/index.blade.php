<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <h1>Sample Page</h1>
    @isset($username)
        <p>{{ $username }}</p>
    @else
        <p>Write something.</p>
    @endisset
    <section>
        <h2>Data</h2>
        <p>This is sample page with php template.</p>
        <p>Message: {{ $msg ?? '' }}</p>
        <p>ID: {{ $id ?? '' }}</p>
        <p>Date: {{ date('Y年n月j日') }}</p>
        @isset($data)
            <ul>
                @foreach ($data as $item)
                    <li>No. {{ $loop->iteration }}: {{ $item }}</li>
                @endforeach
            </ul>
        @endisset
    </section>
    <section>
        <h2>Form</h2>
        <p>Input your name.</p>
        <form action="/hello/chapter3" method="POST">
            @csrf
            <input type="text" name="username">
            <input type="submit">
        </form>
    </section>
    <section>
        <ol>
            @for ($i = 1; $i < 100; $i++)
                @if ($i % 2 == 1)
                    @continue
                @elseif ($i <= 10)
                    <li>No. {{ $i }}</li>
                @else
                @break
            @endif
        @endfor
    </ol>
</section>
<section>
    <ol>
        @php
            $counter = 0;
        @endphp
        @while ($counter < count($data))
            <li>{{ $data[$counter] }}</li>
            @php
                $counter++;
            @endphp
        @endwhile
    </ol>
</section>
</body>

</html>
