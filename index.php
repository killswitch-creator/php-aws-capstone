<!DOCTYPE html>
<html>
<head>
    <title>PHP Capstone Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
            background-color: #f4f6f9;
        }
        .container {
            background-color: #ffffff;
            display: inline-block;
            padding: 30px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 { color: #2c3e50; }
        p { color: #555; }
        .success { color: #27ae60; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Capstone Project Successfully Deployed!</h1>
        <p class="success">Application Status: Online & Running</p>
        <p>PHP Version: <?php echo phpversion(); ?></p>
        <p>Server Hostname: <?php echo gethostname(); ?></p>
    </div>
</body>
</html>
