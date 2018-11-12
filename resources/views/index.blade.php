<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Abm index</title>
</head>
<body>

  @foreach ($abms as $abm)
      {{$abm->name}} {{$abm->age}}<br>  
  @endforeach

</body>
</html>