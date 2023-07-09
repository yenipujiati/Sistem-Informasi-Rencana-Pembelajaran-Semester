<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement of Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            color: #666;
        }
        .announcement {
            background-color: #f5f5f5;
            padding: 20px;
            margin-bottom: 20px;
        }
        .announcement h2 {
            margin-top: 0;
            color: #333;
        }
        .announcement p {
            margin-bottom: 10px;
        }
        .line {
        border-top: 1px solid black;
        margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>Redundancy Information</h1>
    <div class="line"></div>
    <div class="announcement">
        @if($duplicates->isNotEmpty())
            <p><h4><strong>There is topic redundancy</strong></h4></p>
            <br>
            <table class="table table-bordered">
                <tr>
                    <th><strong>Topik</strong></th>
                    <th><strong>Matakuliah</strong></th>
                </tr>
                @foreach($duplicates as $redundancy)
                <tr>
                    <td>{{ $redundancy->topik}}</td>
                    <td>{{ $redundancy->matkul_name}}</td>
                </tr>
                @endforeach
            </table>
        @else
            <p><h3>No redundancy found.<strong></strong></h3></p>
        @endif
    </div>
</body>
</html>

