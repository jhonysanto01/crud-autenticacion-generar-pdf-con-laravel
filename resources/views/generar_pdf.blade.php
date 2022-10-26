<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->descripcion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
