<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SMIS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #6dd5ed 0%, #2193b0 100%);
            min-height: 100vh;
        }
        .hero {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #fff;
            text-align: center;
        }
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .hero-desc {
            font-size: 1.3rem;
            margin-bottom: 2rem;
        }
        .hero-btns a {
            margin: 0 10px;
            padding: 12px 32px;
            font-size: 1.1rem;
            border-radius: 30px;
            border: none;
            color: #fff;
            background: #2193b0;
            transition: background 0.3s;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .hero-btns a:hover {
            background: #6dd5ed;
            color: #222;
        }
        .features {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            margin: 40px auto;
            max-width: 900px;
            padding: 40px 20px;
        }
        .features h2 {
            color: #2193b0;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .feature-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }
        .feature-item {
            flex: 1 1 220px;
            min-width: 220px;
            max-width: 260px;
            background: #f7fafd;
            border-radius: 16px;
            padding: 24px 16px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(33,147,176,0.07);
        }
        .feature-item i {
            font-size: 2.5rem;
            color: #2193b0;
            margin-bottom: 12px;
        }
        .feature-item h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .feature-item p {
            font-size: 1rem;
            color: #555;
        }
        @media (max-width: 768px) {
            .hero-title { font-size: 2rem; }
            .features { padding: 20px 5px; }
            .feature-list { flex-direction: column; gap: 20px; }
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="container">
            <div class="hero-title">Welcome to SMIS</div>
            <div class="hero-desc">A modern School Management Information System for seamless administration, student management, and communication.</div>
            <div class="hero-btns">
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
            </div>
        </div>
    </div>
    <div class="features">
        <h2>Key Features</h2>
        <div class="feature-list">
            <div class="feature-item">
                <i class="fas fa-users"></i>
                <h4>User Management</h4>
                <p>Manage students, teachers, and staff with ease and assign roles and permissions.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-calendar-alt"></i>
                <h4>Academic Scheduling</h4>
                <p>Organize classes, semesters, and batches for efficient academic planning.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-bell"></i>
                <h4>Notices & Communication</h4>
                <p>Send important updates and notices to all users instantly.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-chart-bar"></i>
                <h4>Statistics Dashboard</h4>
                <p>Get real-time statistics on users, students, teachers, and more.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-lock"></i>
                <h4>Secure & Reliable</h4>
                <p>Built with modern security practices to keep your data safe.</p>
            </div>
        </div>
    </div>
    <footer class="text-center py-4" style="color:#fff;">
        &copy; {{ date('Y') }} SMIS. All rights reserved.
    </footer>
</body>
</html>
