<table>
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Judul Agenda</th>
        <th>Deskripsi</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>URL</th>
        <th>Ditambahkan pada</th>
    </tr>
    </thead>
    <tbody>
    @php
        $nomor = 1
    @endphp
    @foreach($agendas as $agenda)
        <tr>
            <td>{{ $nomor }}</td>
            <td>{{ $agenda->title }}</td>
            <td>{{ strip_tags($agenda->description) }}</td>
            @php
                $date = date_create($agenda->date);
            @endphp
            <td>{{ date_format($date,"d-m-Y") }}</td>
            <td>{{ $agenda->time }}</td>
            <td>{{ $agenda->url }}</td>
            <td>{{ date_format($agenda->created_at,"d-m-Y H:i") }}</td>
        </tr>
        @php
            $nomor++;
        @endphp
    @endforeach
    </tbody>
</table>