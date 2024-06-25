<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/db1.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="all">
        <div class="sidebar">
            <div class="top">
                <img src="image/img3.jpg" alt="">
                <h2>Admin-Dashboard</h2>
            </div>

            <div class="bottom" id="hidesidetohide">

                <div class="middle">
                    <h1>Main</h1>
                    <ul>

                        <li><a href="{{route('index.admin')}}"><img src="{{asset('image/gauge.svg')}}" alt=""><span>Dasboard</span></a></li>
                        <li><a href="{{route('admin.products')}}"><img src="{{asset('image/product-hunt.svg')}}" alt=""><span>Products</span></a></li>
                        <li><a href="{{route('admin.transaction')}}"><img src="{{asset('image/money-bill-transfer.svg')}}" alt=""><span>Payments</span></a></li>
                        <li><a href="{{route('admin.users')}}"><img src="{{asset('image/user-group.svg')}}" alt=""><span>Users</span></a></li>
                        <li><a href="{{route('admin.company')}}"><img src="{{asset('image/rectangle-list.svg')}}" alt=""><span>Company</span></a></li>
                    </ul>
                </div>
    
           
            </div>

        </div>
        <div class="maincontent">
            <div class="navbar">
                <div class="left">
                    <img src="{{asset('image/menu.png')}}" alt="" id="hideside">
                    <a href="#">Home</a>
                </div>
                <div class="right" id="dropdownuser">
                    <img src="/image/img3.jpg" alt="">
                    <span>Administrator</span>
                    <div class="dropdown">
                    </div>
                </div>
                <div class="dropusershow" id="dropshow">
                    <h4>Rasolofobary</h4>
                    <a href="{{route('admin.profile',auth()->user()->id)}}">Mon compte</a>
                </div>
            </div>




            


            <div class="bottomcontainer"  id="containersomething">





                <div class="container1">
                    <div class="row1">
                        <div class="first">
                            <div class="top">
                                <div class="left">
                                    <h1>{{$usersinthismoth}}</h1>
                                    <h4>User subscribe this months</h4>
                                </div>
                                <img src="image/users.svg" alt="">
                            </div>
                            <div class="barprogress">
                                <div class="fill" style="--c:#ec9109;--p:60%;"></div>
                            </div>
                        </div>
                        <div class="first">
                            <div class="top">
                                <div class="left">
                                    <h1>{{$usersinthismoth}}</h1>
                                    <h4>User view this months</h4>
                                </div>
                                <img src="image/eye.svg" alt="">
                            </div>
                            <div class="barprogress">
                                <div class="fill" style="--c:#d60d0d;--p:80%;"></div>
                            </div>
                        </div>
                        <div class="first">
                            <div class="top">
                                <div class="left">
                                    <h1>{{$usersinthismoth/2}}</h1>
                                    <h4>Total commandes this month</h4>
                                </div>
                                <img src="image/cart-flatbed.svg" alt="">
                            </div>
                            <div class="barprogress">
                                <div class="fill" style="--c:#0d2bd6;--p:20%;"></div>
                            </div>
                        </div>
                        <div class="first">
                            <div class="top">
                                <div class="left">
                                    <h1>80 000 000</h1>
                                    <h4>Total amount this months</h4>
                                </div>
                                <img src="image/sack-dollar.svg" alt="">
                            </div>
                            <div class="barprogress">
                                <div class="fill" style="--c:#0dd617;--p:40%;"></div>
                            </div>
                        </div>
                    </div>
    
                  
                    <div class="row3">
                        <div class="lastsales">
                            <h1>The last sales in this week</h1>
                            <table>
                                <thead>
                                    <th>Profile</th>
                                    <th>Buyer's Name</th>
                                    <th>Products</th>
                                    <th>Frequency buying</th>
                                    <th>Options</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="image/img3.jpg" alt=""></td>
                                        <td>RASOLOFOBARY Florent</td>
                                        <td><span>IST</span> <img src="image/scientwom.jpg" alt=""></td>
                                        <td>28</td>
                                        <td><form action="" method="post">
                                            <input type="submit" value="Delete">
                                        </form></td>
                                    </tr>
                                    <tr>
                                        <td><img src="image/img3.jpg" alt=""></td>
                                        <td>RASOLOFOBARY Florent</td>
                                        <td><span>IST</span> <img src="image/scientwom.jpg" alt=""></td>
                                        <td>28</td>
                                        <td><form action="" method="post">
                                            <input type="submit" value="Delete">
                                        </form></td>
                                    </tr>
                                </tbody>
                            </table>
    
                        </div>
                  
                        <div class="latestusers">
                            <h1>The latest users</h1>
                            <table>
                                <thead>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Countries</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td><img src="image/img3.jpg" alt=""></td>
                                        <td>{{$user->name}}</td>
                                        <td>Madagascar</td>
                                    </tr>
                                    @endforeach
                                  
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>


    <script>
        let userdropdown=document.getElementById("dropdownuser");
         userdropdown.addEventListener("click", ()=>{
             let listdrop=document.querySelector(".dropusershow");
             listdrop.classList.toggle("dropuserhide");
         });
         window.addEventListener('scroll',()=>{
             let listdrop=document.getElementById("dropshow");
             if(listdrop.classList.contains('dropuserhide')){
                 listdrop.classList.remove("dropuserhide");
             }
         });

         document.getElementById('containersomething').addEventListener('click',()=>{
             let listdrop=document.getElementById("dropshow");
             if(listdrop.classList.contains('dropuserhide')){
                 listdrop.classList.remove("dropuserhide");
             }
         });
         

         let hideside=document.getElementById('hideside');
         hideside.addEventListener('click',()=>{
             let side=document.getElementById('hidesidetohide');
             side.classList.toggle('hidethen');
         })
 
     </script>
</body>
</html>