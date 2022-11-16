<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeni İletişim Mesajı</title>
</head>
<body>
<p>Merhaba <b>Admin</b>,<br>
Web sitenizde yeni bir iletişim mesajınız var.</p>

<h3>DETAİLS</h3><hr>
<b>İsim:</b>&nbsp;{{$messageName}}<br>
<b>Email:</b>&nbsp;{{$messageEmail}}<br>
<b>Telefon Numarası:</b>&nbsp;{{$messagePhone}}<br>
<b>Mesaj Konusu:</b>&nbsp;{{$messageSubject}}<br>
<b>Mesaj:</b>&nbsp;{{$messageMes}}<br><br><br><hr>
<b>Tarih:</b>&nbsp;{{$messageCreatedAt}}<br><br>
</body>
</html>

