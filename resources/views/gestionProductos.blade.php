<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form  method="POST" action="{{route('productos.store')}}">
        {{-- no olvidar este comando que es el de seguridad para que funcione --}}
        @csrf
        <label for="">nombre
            <input type="text" name="nombre" id="nombre">
        </label>
        <label for="">precio
            <input type="number" name="precio" id="precio">
        </label>
        <label for="">descripcion
            <input type="text" name="descripcion" id="descripcion">
        </label>
        <button type="submit">enviar</button>
    </form>
</body>
</html>
