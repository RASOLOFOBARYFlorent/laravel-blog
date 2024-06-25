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
                <h1 class="title" >Solo E-Catalogue</h1>
            </div>
            <div class="right">
                <div class="cart">
                    <h1>{{$cartsnumbers}}</h1>
                    <img src="{{asset('image/icones/icone_1.png')}}" alt="">
                </div>
                <a href="{{route('index')}}">Home</a>
                <div class="myaccount">
                    <a href="{{route('profile',auth()->user()->id)}}">Mon Compte</a>
                </div>
            </div>
        </div>
        <div class="panier">
            <div class="top">
                <h1 class="title">Recapitilatif du panier</h1>
            </div>
            <div class="cardscart">
                @foreach ($carts as $cart)
                    
               
                <div class="card">
                    <div class="imgofcart">
                        <img src="{{url('storage',$cart[0]['image'])}}" alt="">
                    </div>
                    <div class="name">
                        <h2 class="name">
                            {{$cart[0]['name']}}
                        </h2>
                        <p>Bon état</p>
                    </div>
                    <div class="price">
                        {{$cart[0]['price']}}$
                    </div>
                    <div class="number">
                        <h1>1 * {{$cart[0]['price']}}$</h1>
                    </div>
                    <div class="cancel">
                        <form action="{{route('removefromcart',$cart[0]['id'])}}" method="post">
                            @csrf
                            <button type="submit"><img src="{{asset('image/icones/cancelx.svg')}}" alt=""></button>
                        </form>
                    </div>
                </div>

                @endforeach
                <div class="buttonsend">
                    <div class="gobuy">
                        <a href="{{route('index')}}"> Continuer mes achats</a>
                    </div>
                    <div class="gocommande">
                        <a href="#commande">Passer aux payments</a>
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