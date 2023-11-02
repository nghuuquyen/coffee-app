<ul>
    @foreach ($hobbies as $item)
        <li>
            <span style="font-weight: 700">{{ $item['name'] }}</span>
            <span>- {{ $item['description'] }}</span>
        </li>
    @endforeach
</ul>