<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> <!-- Menambahkan font Poppins -->
    <title>NEOSTORE</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins untuk seluruh body */
        }
        .header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 20px;
            background-color: #dfdfdf;
        }
        .logo {
            max-width: 80px;
            margin-right: 10px;
        }
        .store-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #205989;
        }
        .login-link {
            color: #205989;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem; /* Ukuran font untuk link login */
            padding: 5px 10px; /* Tambahkan padding untuk ruang di sekitar teks */
            border-radius: 5px; /* Sudut melengkung pada link */
            transition: background-color 0.3s; /* Animasi saat hover */
        }
        .login-link:hover {
            text-decoration: underline;
            background-color: rgba(32, 89, 137, 0.1); /* Warna latar belakang saat hover */
        }
        .main-content {
            text-align: center;
        }
        h1 {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins untuk elemen h1 */
            font-weight: 600; /* Menetapkan berat font */
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="d-flex align-items-center">
            <img src="{{ asset('asset/logotoko.png') }}" alt="Logo Toko" class="logo">
            <div class="store-name">NEOSTORE</div> <!-- Nama Toko -->
        </div>
        <div class="login-button">
            <a href="{{ url('/login') }}" class="login-link">Login</a> <!-- Teks link login -->
        </div>
    </div>
    
    <div class="main-content">
        <img src="{{ asset('asset/logotoko.png') }}" alt="Logo Toko" class="logo" style="max-width: 200px; opacity: 0.7;"> <!-- Logo yang lebih besar dan transparan -->
        <h1>Selamat Datang di Toko NEOSTORE</h1>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
