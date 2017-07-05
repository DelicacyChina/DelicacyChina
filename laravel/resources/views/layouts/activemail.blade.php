<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    尊敬的 {{ $name }} 用户，
    <br>
    <a href="{{ URL('home/mailBox?uid='.$uid.'&activationcode='.$activationcode) }}">
        请点击此处激活美食中国账号,请在60s内激活
    </a>
</body>
</html>