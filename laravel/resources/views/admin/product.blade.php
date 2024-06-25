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
                    <h2>Company products</h2>
                    
                        <input type="checkbox" name="check" id="ch">
                        <label for="ch" id="top">Add new products</label>
                    
                        <div class="addform">
                            <h1>Add new products in the company</h1>
                            <form action="{{route('products.create')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="container">
                                    <h2>Product's Name</h2>
                                    <input type="text" name="name" id="" placeholder="Product name">
                                </div>
                                <div class="container">
                                    <h2>Products's price</h2>
                                     <input type="number" name="price" id="" placeholder="Product's price">
                                </div>
                                <div class="container">
                                    <h2>Product's stock</h2>
                                    <input type="number" name="stock" id="" placeholder="Products in stock">
                                </div>
                                <div class="container">
                                    <h2>Product's photo</h2>
                                    <input type="file" name="photo" id="">
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
                            <th>Photo</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Info</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    <img src="{{url('storage',$product->image)}}" alt="" style="width:40px;height:40px;border-radius:50%;">
                                </td>
                                <td>
                                    <h3>Name: <span>{{$product->name}}</span></h3>
                                </td>
                                <td>
                                    
                                    <div class="account">
                                        <h3>Price: <span>{{$product->price}}$</span></h3>
                                    </div>
                                </td>
                                <td>
                                    
                                    <div class="account">
                                        <h3>Disponibility: <span>{{$product->infos}}</span></h3>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{route('products.delete',$product->id)}}" method="POST">
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