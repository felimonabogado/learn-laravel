<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Laravel App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    @if( session('status') )
        <div class="alert-status">
            {{ session('status') }}
        </div>
    @endif 

    {{$slot}}
</body>
</html>