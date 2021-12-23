<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MUAWARDS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
    .card-hover:hover {
        background: rgba(0, 0, 0, .5) !important;
    }

    @keyframes bounce {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-50px);
        }
    }

    #success-image {
        animation: bounce 1s infinite alternate;
    }

    .form-control {
        color: #fff !important;
    }

    .form-control::placeholder {
        color: #ccc;
    }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-black"
            style="border-bottom: 1px solid #ccc; position: fixed; width: 100%; z-index: 1111">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php"><img src="images/log.png" alt="...." width="180px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">CONTACT</a></li>
                        <li class="nav-item active"><a class="nav-link" href="register.php">REGISTER</a></li>
                        <li class="nav-item"><a class="nav-link" href="voting.php">VOTE</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->