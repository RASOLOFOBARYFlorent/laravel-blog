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

            <div class="allpayments"  id="containersomething">
                <h2>Transactions report</h2>
                <div class="top">
                    <form action="" method="post">
                        <div class="start">
                            <h2>Date from</h2>
                            <input type="date" name="start" id="" value="2024-05-19">
                        </div>
                        <div class="end">
                            <h2>Date to</h2>
                            <input type="date" name="end" id="" value="2024-06-19">
                        </div>
                        <input type="submit" value="Filter">
                    </form>
                    <button  id="print">Print</button>
                </div>
                <div class="table">
                   
                    <table>
                        <thead>
                            <th>#</th>
                            <th>Transaction code</th>
                            <th>Client</th>
                            <th>Info</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>8554564545reddfdg-895522</td>
                                <td>Rasolofobary Florent</td>
                                <td>
                                    <h3>Paid with credit card</h3>
                                    <div class="account">
                                        <h3>Account name: <span>RASOLOFOBARY Florent</span></h3>
                                        <h3>Account id: <span>101 221 128 077</span></h3>
                                    </div>
                                </td>
                                <td>3690 $</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>8554564545reddfdg-895522</td>
                                <td>Rasolofobary Florent</td>
                                <td>
                                    <h3>Paid with credit Paypal</h3>
                                    <div class="account">
                                        <h3>Account name: <span>RASOLOFOBARY Florent</span></h3>
                                        <h3>Account id: <span>101 221 128 077</span></h3>
                                    </div>
                                </td>
                                <td>3690 $</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>





















    
    <script type="text/javascript">
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
         });






     </script>
     <script src="{{asset('js/js.js')}}"></script>
</body>
</html>