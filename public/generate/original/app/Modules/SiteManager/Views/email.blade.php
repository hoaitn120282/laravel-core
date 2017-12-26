<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<title>Email</title>
<style>
    .container{
        max-width: 1170px;
        margin: 0 auto;
    }
</style>
<body>
    <div class="container">
        <h3 style="font-weight: bold">Hi {{ $adminName }}</h3>
        <div> Your website {{ $siteName }} has just been created successfully!</div>
        <div >To deploy the website, please clicking on the <strong style="font-style: italic">link for backend site first</strong> and then input the <strong style="font-style: italic">log-in information</strong> below. </div>
        <div style="padding-left: 15px">Link for frontend site: abcxyz@sanmax.com</div>
        <div style="padding-left: 15px">Link for backend site: abcxyz@sanmax.com/admin</div>
        <div style="padding-left: 15px">Username: {{ $siteName }}</div>
        <div style="padding-left: 15px">Password: {{ $password }}</div>
        <p style="font-weight: bold">Best regards,</p>
    </div>
</body>
</html>


