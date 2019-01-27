<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Page</title>
</head>
<body>
    
    <div style="width:100%;float:left;">
        <h3>Brown Sugar Male</h3>
        <p>Hello Brownsugar</p>
        <p>There is the follwing enquiry:</p>
        <p><strong>Name:</strong><span>{{$data['name']}}</span></p>
        <p><strong>Email:</strong><span>{{$data['email']}}</span></p>
        <p><strong>Subject:</strong><span>{{$data['subject']}}</span></p>
        <p><strong>Message:</strong><span>{{$data['message']}}</span></p>
    </div>
</body>
</html>