<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyBus</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .background {
            background-image: url('image/449189420_1010083887791924_2375426509725602900_n.jpg'); 
            background-size: cover;
            background-position: center;
            min-height: 100vh; /* Prend toute la hauteur de l'écran */
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .header {
            position: absolute;
            top: 10px;
            left: 10px;
            color: white;
            font-size: 1.5em;
        }
        .header img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .nav {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 20px;
        }
        .nav a {
            color: white;
            text-decoration: none;
            font-size: 1em;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .hero {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('image/449189420_1010083887791924_2375426509725602900_n.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 2rem;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        /* Bus Grid */
        #bus-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            padding: 2rem;
        }

        .bus-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .bus-card:hover {
            transform: translateY(-5px);
        }

        .bus-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .bus-card h3, .bus-card p {
            padding: 1rem;
        }

        

        
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                text-align: center;
            }

            .hero h1 {
                font-size: 2rem;
            }
        }

        /* Bus Lines */
        .bus-line-1 {
            border-left: 5px solid #e74c3c;
            padding-left: 10px;
        }

        .bus-line-2 {
            border-left: 5px solid #3498db;
            padding-left: 10px;
        }

        .bus-line-3 {
            border-left: 5px solid #2ecc71;
            padding-left: 10px;
        }

        .bus-line-4 {
            border-left: 5px solid #f1c40f;
            padding-left: 10px;
        }

        .price-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .price-btn:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="background">
    <div class="header">
        <img src="image/Capture d'écran 2024-11-12 175400.png" alt="EasyBus"> 
        <span>EasyBus</span>
    </div>
    <div class="nav">
        <a href="offre.html" class="button">Offres</a>
        <a href="solde.html" class="button">Sold</a>
        <a href="contact.html" class="button">Contact</a>
        <a href="page3.php" class="button">Déconnexion</a>
    </div>
    <main>
        <section id="accueil" class="hero">
            <h1>Bienvenue sur EasyBus</h1>
            <p>Votre solution de gestion de transport en commun</p>
        </section>

        <section id="bus-grid">
            <div class="bus-card bus-line-1">
                <img src="image/im2.jpg" alt="Bus">
                <h3>Bus 2 Ligne </h3>
                <button class="price-btn">80 Dh</button>
            </div>
            <div class="bus-card bus-line-2">
                <img src="image/im1.jpg" alt="Bus">
                <h3>Bus 3 Ligne </h3>
                <button class="price-btn">100 Dh</button>
            </div>
            <div class="bus-card bus-line-3">
                <img src="image/im3.jpg" alt="Bus">
                <h3>Tout les lignes </h3>
                <button class="price-btn">200 Dh</button>
            </div>
            <div class="bus-card bus-line-4">
                <img src="image/im4.jpg" alt="Bus">
                <h3>Bus Bnidrar</h3>
                <button class="price-btn">200 Dh</button>
            </div>
        </section>
    </main>
</div>



</body>
</html>
