<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanaman</th>
            <th>Keterangan</th>
            <th>Author</th>
            <th>Radial Images</th>
            <th>Tangen Images</th>
            <th>Transversal Images</th>
        </tr>
    </thead>
    <tbody>
        @foreach($amakro as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->tanaman->nama }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->User->name }}</td>
                <td>{{ implode(', ', json_decode($item->radial_images, true) ?? []) }}</td>
                <td>{{ implode(', ', json_decode($item->tangen_images, true) ?? []) }}</td>
                <td>{{ implode(', ', json_decode($item->transversal_images, true) ?? []) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
