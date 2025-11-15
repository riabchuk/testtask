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
<table class="table table-striped table-bordered">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Назва компанії</th>
        <th>ЄДРПОУ</th>
        <th>Адреса</th>
        <th>Створено</th>
        <th>Історія</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->edrpou }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ \Carbon\Carbon::parse($company->created_at)->format('d.m.Y h:m') }}</td>
            <td><a class="btn btn-primary" href="{{route('companies.history',$company->id)}}">Перегляд</a> </td>
        </tr>
    @endforeach
    </tbody>
</table></body>
</html>

