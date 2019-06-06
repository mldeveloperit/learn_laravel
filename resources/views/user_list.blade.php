<html>
    <body>
        <div>
            <ul>
                @foreach($names as $email => $name)
                    <li>{{ $name }} : {{ $email }}</li>
                @endforeach
            </ul>
        </div>
    </body>
</html>