<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 10px 0;
            background-color: #f4f4f4;
            border-bottom: 2px solid #ddd;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px 12px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <header>
        <h1>{{ $title }}</h1>
    </header>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Reserva</th>
                <th>Cancha</th>
                <th>Fecha de Reserva</th>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->reservation_id }}</td>
                <td>
                    {{ $reservation->matchday->championship->name ?? '-'}}
                </td>
                <td>{{ $reservation->field->field_id }}</td>
                <td>{{ $reservation->reservation_date->format('d/m/Y') }}</td>
                <td>{{ $reservation->reservation_time->format('H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        <p>Generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
    </footer>
</body>

</html>