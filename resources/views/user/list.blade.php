<html>
    <body>
        <div>
            <ul>
                @foreach($users as $user)
                    <li>
                        <a href="{{ route('user.show', ['id' => $user->id]) }}">{{ $user->id }} : {{ $user->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </body>
</html>