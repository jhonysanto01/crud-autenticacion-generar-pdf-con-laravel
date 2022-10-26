<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container text-center">
        <a href="{{ route('productos.create')}}" class="btn btn-success">
            Crear producto
        </a>
        <br>
        <a href="{{ route('descargar-pdf')}}" class="btn btn-success">
            Generar pdf de los productos (PDF)
        </a>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
