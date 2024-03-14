<header class="header">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fd6500;
            height: 80px;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .logo {
            font-size: 2rem;
            color: white;
            font-weight: bold;
            margin-right: auto;
        }

        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .nav-item {
            margin-left: 20px;
            color: white;
            font-size: 1.5rem;
            text-decoration: none;
            text-transform: uppercase;
            border-bottom: 2px solid transparent;
            transition: border-bottom 0.3s ease-in-out;
        }

        .nav-item:hover {
            border-bottom: 2px solid white;
        }

        .nav-item.active {
            border-bottom: 2px solid white;
        }

        .header-right {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: auto;
        }

        .header-right a {
            color: white;
            font-size: 1.1rem;
            text-decoration: none;
            margin-left: 20px;
            text-transform: uppercase;
            border: 1px solid white;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .header-right a:hover {
            background-color: white;
            color: #4CAF50;
        }
    </style>
    <div class="logo">UD Laris</div>
    <nav class="navbar">
        <a href="/" class="nav-item">Home</a>

        <a href="#" class="nav-item">Kostumisasi</a>
        <a href="#" class="nav-item">Contact</a>
    </nav>
    <div class="header-right">
        <a href="#">----</a>
        <a href="#">----</a>
    </div>
</header>
