<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container"></div>
<h1> Поточні дані компанії</h1>
<p><b>Назва: </b>{{$company->name}}</p>
<p><b>Єдрпоу: </b>{{$company->edrpou}}</p>
<p><b>Адреса: </b>{{$company->address}}</p>
<p><b>Створено: </b>{{ \Carbon\Carbon::parse($company->created_at)->format('d.m.Y h:m') }}</p>
<p><b>Оновлено: </b>{{ \Carbon\Carbon::parse($company->updated_at)->format('d.m.Y h:m') }}</p>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Назва компанії</th>
        <th>Адреса</th>
        <th>Створено</th>
        <th>Версія</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companyHistory as $history)
        <tr>
            <td>{{ $history->id }}</td>
            <td>{{ $history->name }}</td>
            <td>{{ $history->address }}</td>
            <td>{{ $history->created_at }}</td>
            <td>{{ $history->version }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-success" href="{{route('companies.index')}}">На головну</a>
</body>
</html>

