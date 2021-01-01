<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haber Ekle</title>
</head>
<body>
<form action="{{ route('haberler.store') }}" method="POST">
    @csrf
    <label for="">Haber Başlığı</label>
    <br>
    <input type="text" name="baslik" placeholder="Haber Başlığı Giriniz" value="{{ old('baslik') }}">
    @error('baslik')
        <small style="color: red;">{{ $message }}</small>
    @enderror
    <br><br>
    <label for="">İçerik</label>
    <br>
    <textarea name="icerik" rows="10" cols="20">{{ old('icerik') }}</textarea>
    @error('icerik')
    <small style="color: red;">{{ $message }}</small>
    @enderror
    <br><br>
    <button type="submit">Gönder</button>
</form>

</body>
</html>
