<?php 
    session_start();
    include_once('connect_db.php');
    if (isset($_POST['login'])) {
        $uname = $_POST['email'];
        $sql = "SELECT * FROM register WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $uname);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row > 0 ) {
            $isThen = password_verify($_POST['pass'], $row['pass_word']);
            if ($isThen) {
                $_SESSION['email'] = $row['email'];
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal.fire({
                    title: "สำเร็จ!",
                    text: "ยินดีต้อนรับเข้าสู่ระบบ",
                    type: "success",
                    icon: "success"
                });';
                echo '}, 500 );</script>';
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { 
                    window.location.href = "index.php";';
                echo '}, 3000 );</script>';
            } else {
                // echo "2";
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal.fire({
                    title: "ผิดพลาด!",
                    text: "กรุณาลองใหม่!",
                    type: "warning",
                    icon: "error"
                });';
                echo '}, 500);</script>';
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { 
                window.location.href = "login.php";';
                echo '}, 3000 );</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                title: "ผิดพลาด!",
                text: "กรุณาลองใหม่!",
                type: "warning",
                icon: "error"
            });';
            echo '}, 500);</script>';
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
            window.location.href = "login.php";';
            echo '}, 3000 );</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    <div class="container pt-5 d-flex justify-content-center">
        <div class="card" style="width:20rem">
            <div class="card-body px-4">
                <h1>เข้าสู่ระบบ</h1>
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check_me" value="1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>