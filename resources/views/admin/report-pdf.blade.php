<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>{{ $name }}</h2>
    <table>
        <thead>
            <tr>
                @if($type == 'Flight Report')
                    <th>Flight No</th><th>Departure</th><th>Destination</th><th>Date</th><th>Status</th>
                @else
                    <th>Name</th><th>Passport No</th><th>Flight No</th><th>Destination</th><th>Status</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                @if($type == 'Flight Report')
                    <td>{{ $item->flight_no }}</td><td>{{ $item->departure }}</td><td>{{ $item->destination }}</td><td>{{ $item->date }}</td><td>{{ $item->status }}</td>
                @else
                    <td>{{ $item->name }}</td><td>{{ $item->passport_no }}</td><td>{{ $item->flight_no }}</td><td>{{ $item->destination }}</td><td>{{ $item->status }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>