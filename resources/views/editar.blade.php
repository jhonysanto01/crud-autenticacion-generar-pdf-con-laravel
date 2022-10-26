<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edicion</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <h1>entro a  la edicion</h1>
    <div class="container text-center">
        {{-- se debe cambiar la variable para poder actualizar tanto la edicion de  los productos como en el update que los recibe --}}
        <form  method="POST" action="{{route('productos.update', $productos->id)}}">
            {{-- no olvidar este comando que es el de seguridad para que funcione --}}
            @csrf
            @method('PUT')
            <label for="">nombre
                <input type="text" name="nom" id="nom" value="{{ $productos->nombre }}">
            </label>
            <label for="">precio
                <input type="number" name="preci" id="preci" value="{{ $productos->precio }}">
            </label>
            <label for="">descripcion
                <input type="text" name="descri" id="descri" value="{{ $productos->descripcion }}">
            </label>
            <button type="submit">actualizar</button>
        </form>
    </div>

</body>
</html>
