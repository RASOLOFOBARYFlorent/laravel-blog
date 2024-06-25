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
                    <a href="{{route('cart',auth()->user()->id)}}">
                        <h1>{{$cartsnumbers}}</h1>
                        <img src="image/icones/icone_1.png" alt="">
                    </a>
                </div>
                <a href="">Home</a>
                <div class="myaccount">
                    <a href="{{route('profile',auth()->user()->id)}}">Mon Compte</a>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="products">
                <div class="toppro">
                    <h1> Voici nos produits aujourd'hui</h1>
                    <div class="left">
                        <h1>Filtre à droite</h1>
                    </div>
                    <div class="right">
                        <form action="" method="post">
                            <input type="text" placeholder="Votre rechereche">
                            <button type="submit">
                                <img src="image/icones/search.png" alt="">
                            </button>
                        </form>
                    </div>
                </div>
                <div class="productinfo">
                    <div class="left">
                        <form action="" method="post">
                            <div class="ranges">
                                <input type="range" name="range" id="">
                                <div class="value">
                                    <h1>0$</h1>
                                    <h1>100$</h1>
                                    <h1>500$</h1>
                                </div>
                            </div>
                            <div class="category">
                                <h1>Category</h1>
                                <div class="onecheck">
                                    <input type="checkbox" name="ch1" id="ch1">
                                    <label for="ch1">Bestsellers</label>
                                </div>
                                <div class="onecheck">
                                    <input type="checkbox" name="ch2" id="ch2">
                                    <label for="ch2">Bestsellers</label>
                                </div>
                                <div class="onecheck">
                                    <input type="checkbox" name="ch3" id="ch3">
                                    <label for="ch3">Bestsellers</label>
                                </div>
                                <div class="onecheck">
                                    <input type="checkbox" name="ch4" id="ch4">
                                    <label for="ch4">Bestsellers</label>
                                </div>
                            </div>
                            <input type="submit" value="Filtrer">
                        </form>
                    </div>
                    <div class="right">
                        <div class="cards">


                            @foreach($products as $pr)
                                
                          
                            <div class="card">
                                <div class="top">
                                    <div class="topimage">
                                        <h1>Sale</h1>
                                        <div class="love">
                                            <form action="{{route('love',$pr->id)}}" method="post">
                                                @csrf
                                                <button type="submit">
                                                    <img src="image/icones/icone_7.svg" alt="">
                                                </button>
                                               
                                            </form>
                                            
                                        </div>
                                    </div>
                                    <div class="imageproduct">
                                        <img src="{{url('storage',$pr->image)}}" alt="">
                                    </div>
                                    <div class="nameprice">
                                        <h1>{{$pr->name}}</h1>
                                        <h2><strike>{{$pr->price-5}}$</strike>    {{$pr->price}}$</h2>
                                    </div>
                                </div>
                                <div class="buy">
                                    <form action="{{route('addtocart',$pr->id)}}" method="post">
                                        @csrf
                                        <input type="submit" value="Ajouter au panier">
                                    </form>
                                </div>
                            </div>
                            @endforeach
                            
                            
                         
                            
                         
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>

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
    </div>
</body>
</html>