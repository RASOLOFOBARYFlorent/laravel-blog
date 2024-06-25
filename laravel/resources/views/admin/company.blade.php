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





            <div class="allcompany" id="containersomething">
                <div class="verytop">
                    <h2>Company report</h2>
                    
                        <input type="checkbox" name="check" id="ch">
                        <label for="ch" id="top">Add new company</label>
                    
                        <div class="addform">
                            <h1>Add coworker company</h1>
                            <form action="{{route('company.create')}}" method="post">
                                @csrf
                                <div class="container">
                                    <h2>Company's Name</h2>
                                    <input type="text" name="name" id="" placeholder="Company name">
                                </div>
                                <div class="container">
                                    <h2>CEO's name</h2>
                                     <input type="text" name="owner" id="" placeholder="Company's owner">
                                </div>
                                <div class="container">
                                    <h2>CEO's phone number</h2>
                                    <input type="number" name="phone" id="" placeholder="Company's owner number">
                                </div>
                                <div class="container">
                                    <h2>Company's Place</h2>
                                    <input type="text" name="place" id="" placeholder="Company Place">
                                </div>
                        
                                <div class="bottom">
                                    <input type="submit" value="Save">
                                    <label for="ch">Cancel</label>
                                </div>
                            </form>
                        
                        
                        </div>
                </div>


            
                <div class="table">
                    <table>
                        <thead>
                            <th>#</th>
                            <th>Company</th>
                            <th>Owner</th>
                            <th>Info</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->owner}}</td>
                                <td>
                                    <h3>Created by it's owner</h3>
                                    <div class="account">
                                        <h3>Phone: <span>{{$company->ownerphone}}</span></h3>
                                        <h3>Place: <span>{{$company->place}}</span></h3>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{route('company.delete',$company->id)}}" method="POST">
                                        @csrf
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                       
                      
                        </tbody>
                    </table>
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