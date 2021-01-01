<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haberler</title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

</head>
<body>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Başlık</th>
            <th>İçerik</th>
            <th>Eklenme Tarihi</th>
        </tr>
    </thead>
    <tbody id="news_body">
        @forelse($news as $haber)
            <tr>
                <td>{{ $haber->id }}</td>
                <td>{{ $haber->baslik }}</td>
                <td>{{ $haber->icerik }}</td>
                <td>{{ $haber->created_at }}</td>
            </tr>
        @empty

        @endforelse
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script>
    var socket = io("http://localhost:3000");
    socket.on("show_news",function (data){
        var html = "<tr>" +
            "<td>"+data.id+"</td>" +
            "<td>"+data.baslik+"</td>" +
            "<td>"+data.icerik+"</td>" +
            "<td>"+data.created_at+"</td>" +
            "</tr>";

        $("#news_body").prepend(html);
    });
</script>

</body>
</html>
