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
            
                <a href="{{route('index')}}">Home</a>
                @auth
                    <div class="myaccount">
                        <a href="{{route('profile',auth()->user()->id)}}">Mon Compte</a>
                    </div>
                @endauth
    
            </div>
        </div>

        <section class="connexion" id="connexion" style="display: none;">
            <div class="top">
                <h1 class="title">Connexion</h1>
                <div class="links">
                    <p>Vous n'avez pas encore de compte? <a href="#inscrire" class="atag">Inscrire</a></p>
                </div>
            </div>
            <form action="{{route('login')}}" method="post">
                @csrf
                <h6>Identifiant</h6>
                <input type="email" placeholder="Votre email" name="email">
                <h6>Mot de passe</h6>
                <input type="password" placeholder="Votre mot de passe" name="password">
                <div class="forgetpassword">
                    <a href="forget.html">Mot de passe oublié?</a> <div class="line"></div>
                </div>
                <input type="submit" value="Validez">
                <div class="loginwith">
                    <h5>Connectez vous avec</h5>
                    <div class="images">
                        <a href=""><img src="{{asset('svgs/brands/google.svg')}}" alt=""></a>
                        <a href=""><img src="{{asset('svgs/brands/google.svg')}}" alt=""></a>
                        <a href=""><img src="{{asset('svgs/brands/google.svg')}}" alt=""></a>
                        <a href=""><img src="{{asset('svgs/brands/google.svg')}}" alt=""></a>
                    </div>
                </div>
            </form>
        </section>

        <section class="connexion" id="inscrire" >
            <div class="top">
                <h1 class="title">Inscription</h1>
                <div class="links">
                    <p>Vous avez déjà un compte? <a href="#connexion" class="atag">Se connecter</a></p>
                </div>
            </div>
            <form action="{{route('register')}}" method="post">
                @csrf
                <h6>Nom</h6>
                <input type="text" placeholder="Votre nom" name="name">
                <h6>Email</h6>
                <input type="email" placeholder="Votre email" name="email">
                <h6>Mot de passe</h6>
                <input type="password" placeholder="Votre mot de passe" name="password">
                <div class="forgetpassword">
                    <a href="forget.html">Conditions d'utilisations?</a> <div class="line"></div>
                </div>
                <input type="submit" value="Validez">
                <div class="loginwith">
                    <h5>Inscrivez vous avec</h5>
                    <div class="images">
                        <a href=""><img src="{{asset('svgs/brands/google.svg')}}" alt=""></a>
                        <a href=""><img src="{{asset('svgs/brands/google.svg')}}" alt=""></a>
                        <a href=""><img src="{{asset('svgs/brands/google.svg')}}" alt=""></a>
                        <a href=""><img src="{{asset('svgs/brands/google.svg')}}" alt=""></a>
                    </div>
                </div>
            </form>
      
        </section>




    </div>
    <script>
                let allatag=document.querySelectorAll('.atag');
        allatag.forEach(allatag =>{
            allatag.addEventListener('click',()=>{
                let attributehref=allatag.getAttribute('href');
                let elementstodisplay=document.querySelector(attributehref);

               
                //console.log(elementstodisplay.style.display);

                if(window.getComputedStyle(elementstodisplay)!="block"){
                    document.querySelectorAll('section').forEach(section=>{
                        section.style.display="none";
                    });
                    elementstodisplay.style.display="flex";
                }else{
                    document.querySelectorAll('section').forEach(section=>{
                        section.style.display="none";
                    });
                    elementstodisplay.style.display="flex";
                }
            });
        });
    </script>

</body>
</html>