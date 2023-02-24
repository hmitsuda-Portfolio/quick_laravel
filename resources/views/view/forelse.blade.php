<table class="table">
    <tr>
        <th>値</th>
        <th>index</th>
        <th>iteration</th>
        <th>count</th>
        <th>first</th>
        <th>last</th>
        <th>even</th>
        <th>odd</th>
        <th>depth</th>
    </tr>
    @forelse($weeks as $week)
    <tr>
        <td>{{$week}}</td>
        <td>{{$loop ->index}}</td>
        <td>{{$loop ->iteration}}</td>
        <td>{{$loop ->count}}</td>
        <td>{{$loop ->first}}</td>
        <td>{{$loop ->last}}</td>
        <td>{{$loop ->even}}</td>
        <td>{{$loop ->odd}}</td>
        <td>{{$loop ->depth}}</td>
    </tr>
    @empty
    <p>データは存在しません。</p>
    @endforelse
</table>
