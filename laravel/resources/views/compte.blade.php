<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div class="all">
        <div class="navbar">
            <div class="left">
                <h1 class="title">Solo E-Catalogue</h1>
            </div>
            <div class="right">
                <div class="cart">
                    <h1>{{$cartsnumbers}}</h1>
                    <img src="{{asset('image/icones/icone_1.png')}}" alt="">
                </div>
                <a href="{{route('index')}}">Home</a>
                <div class="myaccount">
                    <a href="#">Mon Compte</a>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="comptes">
             <div class="left">
                <ul>
                    <li>
                        <a href="#">Mes informations</a>
                    </li>
                    <li>
                        <a href="">Mes historiques de commandes</a>
                    </li>
                    <li>
                        <a href="{{route('cart',auth()->user()->id)}}">Mes carts</a>
                    </li>
                </ul>
                <div class="deconect">
                    <form action="{{route('logout')}}" method="POST"> 
                        @csrf
                        <input type="submit" value="Déconnexion">
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="row1">
                    <h1>
                        Informations personnelles
                    </h1>
                    <div class="profile">
                        <h5>Nom:{{auth()->user()->name}}</h5>
                        <h5>Email:{{auth()->user()->email}}</h5>
                    </div>
                    <div class="change">
                        <form action="" method="post">
                            <input type="submit" value="Modifier">
                        </form>
                    </div>
                </div>
                <div class="newproduct">
                    <h1>Ne ratez pas nos nouveaux produits</h1>
                    <div class="links">
                        <a href="">Jeter un coup d'oeil</a>
                    </div>
                </div>
            </div>
            </div>
           
        </div>


        <!-- footer  -->
        <div class="footer">
            <div class="links">
                <h1>Accès rapide</h1>
                <ul>
                    <li><a href="">A propos</a></li>
                    <li><a href="">Panier</a></li>
                    <li><a href="">Mon compte</a></li>
                    <li><a href="">Home</a></li>
                </ul>
            </div>
            <div class="socialnetworks">
                <h1>Nos reseaux sociaux</h1>
                <ul>
                    <li><a href=""><img src="{{asset('image/icones/icon_facebook_footer.png')}}" alt=""></a></li>
                    <li><a href=""><img src="{{asset('image/icones/icon_facebook_footer.png')}}" alt=""></a></li>
                    <li><a href=""><img src="{{asset('image/icones/icon_facebook_footer.png')}}" alt=""></a></li>
                </ul>
            </div>
            <div class="messages">
                <h1>Vos avis comptent pour nous</h1>
                <form action="{{route('feedback',auth()->user()->id)}}" method="post">
                    @csrf
                    <input type="email" name="email" id="" placeholder="votre addresse email">
                    <textarea name="idea" id="" cols="20" rows="4" placeholder="Votre idée"></textarea>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
        <!-- footer  -->

    </div>
</body>
</html>