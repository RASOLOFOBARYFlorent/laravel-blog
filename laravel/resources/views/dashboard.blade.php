<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Document</title>
</head>
<body>
    <div id="sidebar" class="sidebar80">
        <div class="toogleimagecont">
            
        </div>
        <div class="links">
            <ul>
                <li><a href=""><img src="{{asset('image/gauge-simple-high.svg')}}" alt=""> <span id="span" class="show">Dashboard</span></a></li>
                <li><a href=""><img src="{{asset('image/menu3.svg')}}" alt=""> <span id="span" class="show">Menu</span></a></li>
                <li><a href=""><img src="{{asset('image/product-hunt.svg')}}" alt=""> <span id="span" class="show">Sales</span></a></li>
                <li><a href=""><img src="{{asset('image/cart-shopping.svg')}}" alt=""> <span id="span" class="show">Cart</span></a></li>
                <li><a href=""><img src="{{asset('image/user.svg')}}" alt=""> <span id="span" class="show">Users</span></a></li>
                <li><a href=""><img src="{{asset('image/alarm.svg')}}" alt=""> <span id="span" class="show">Notifications</span></a></li>
            </ul>
        </div>
    </div>

    <div class="all">
        <div id="maincontainer" class="sidemain80">
            <div class="navbartop" id="navbar">
                <div class="left">
                    <h1>Logo</h1>
                </div>
                <div class="right">
                    <div class="search">
                        <form action="" method="post">
                            <input type="text" placeholder="Search">
                            <button>
                                <img src="{{asset('image/search.png')}}" alt="">
                            </button>
                        </form>
                    </div>
                    <div class="notification">
                        <img src="{{asset('image/alarm.svg')}}" alt="">
                    </div>
                    <div class="dropdownuser">
                        <img src="{{asset('image/user.svg')}}" alt="" id="dropdownuser">
                    </div>
    
                    <ul class="dropusershow">
                        <a href="">Edit</a>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input type="submit" value="Logout">
                        </form>
                    </ul>
                </div>
            </div>
    
            <div class="infoscontainer">
                <div class="row1">
                    <div class="left card" style="background-color: rgb(200, 200, 200);" >
                     
                        <div class="right">
                        <?php

                                $data=[15000,5000,100000,20000,30000,60000,40000,80000,120000,10000,110000,70000];
                                $legends=['Jan','Fevr','Mars','Avr','Mai','Juin','Juil','Aout','Sept','Oct','Nov','Dec'];
                                $colors=[[255,0,0],[51,0,255],[51,255,51],[255,153,0],[0,204,
                                153],[204,255,102],[255,102,102],[102,204,255],[204,153,255],
                                [255,51,153],[204,0,255],[255,255,51]];

                                $sumdata=array_sum($data);
                                $width=300;
                                $height=300;
                                $dx=9;
                                $barwidth=46;
                                $image=imagecreate($width,$height);   
                                imagecolorallocate($image,20,20,20);       
                                $start[0] = 0;
                                for ($i=0; $i<12; $i++){
                                    $slice = $data[$i]/$sumdata*360;
                                    if ($i>0) $start[$i] = $end[$i-1];
                                    $end[$i] = $start[$i] + $slice;
                                }
                                for($i=0;$i<12;$i++){
                                    $color[$i]=imagecolorallocate($image,$colors[$i][0],$colors[$i][1],$colors[$i][2]);
                                    @imagefilledarc($image,150,90,180,180,$start[$i],$end[$i],$color[$i],IMG_ARC_PIE);
                                }
                                
                                
                                
                                
                                $color=array();
                                
                                for($p=0;$p<6;$p++){
                                    $begin=$p*$barwidth+$dx;
                                    $end=($p+1)*$barwidth;
                                    @$color[$p]=imagecolorallocate($image,$colors[$p][0],$colors[$p][1],$colors[$p][2]);
                                    imagefilledrectangle($image,$begin,190,$end,210,$color[$p]);
                                    imagestring($image,12,$begin,210+$dx,$legends[$p],$color[$p]);
                                }
                                for($p=6;$p<12;$p++){
                                    $begin=($p-6)*$barwidth+$dx;
                                    $end=($p-5)*$barwidth;
                                    @$color[$p]=imagecolorallocate($image,$colors[$p][0],$colors[$p][1],$colors[$p][2]);
                                    imagefilledrectangle($image,$begin,240,$end,260,$color[$p]);
                                    imagestring($image,12,$begin,260+$dx,$legends[$p],$color[$p]);
                                }
                                

                                ob_start();
                                imagegif($image);
                                $dataimage=ob_get_clean();

                                echo '<img src="data:image/gif;base64,'.base64_encode($dataimage).'" alt="image 1">';


                            ?>
                        </div>
                    </div>
                    <div class="middle card" >
                
                        <div class="right">
                           
<?php
                           
$width=300;
$height=300;
$data=[15000,5000,100000,20000,30000,60000,40000,80000,120000,10000,110000,70000];
$legends=['Jan','Fevr','Mars','Avr','Mai','Juin','Juil','Aout','Sept','Oct','Nov','Dec'];
$colors=[[255,0,0],[51,0,255],[51,255,51],[255,153,0],[0,204,
153],[204,255,102],[255,102,102],[102,204,255],[204,153,255],
[255,51,153],[204,0,255],[255,255,51]];
$yecart=10;


$image=imagecreate($width,$height);
imagecolorallocate($image,20,20,20); 
$linecolor=imagecolorallocate($image,20,20,100);
imagesetthickness($image,4);
imageline($image,10,10,10,280,$linecolor);
imageline($image,10,280,280,280,$linecolor);


for($i=0;$i<12;$i++){
    $color[$i]=imagecolorallocate($image,$colors[$i][0],$colors[$i][1],$colors[$i][2]);
    $h[$i]=(280-(($data[$i]*280)/max($data)));
    $w[$i]=$yecart+(290/13)*($i+1);
    imagesetthickness($image,2);
    if($i==0){
        imageline($image,$yecart,280,$w[$i],$h[$i],$linecolor);
        imagefilledarc($image,$w[$i],$h[$i],15,15,0,360,$color[$i],IMG_ARC_PIE);
        imagestring($image,12,$w[$i]-10,$h[$i]+15,$legends[$i],$color[$i]);

    }else{
        imageline($image,$w[$i-1],$h[$i-1],$w[$i],$h[$i],$linecolor);
        imagefilledarc($image,$w[$i],$h[$i],15,15,0,360,$color[$i],IMG_ARC_PIE);
        imagestring($image,12,$w[$i]-10,$h[$i]+15,$legends[$i],$color[$i]);
        
    }
}


ob_start();
imagegif($image);
$data=ob_get_clean();


echo '<img src="data:image/gif;base64,'.base64_encode($data).'">';





?>
                        </div>
                    </div>
                    <div class="right card" style="background-color: rgb(11, 140, 145);">
                        <div class="left">
                            <h1>Users</h1>
                            <h2>All</h2>
                        </div>
                        <div class="right">
                            <a href="">View all</a>
                            <img src="{{asset('image/user.svg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row2">
                    <div class="left card" style="background-color: rgb(43, 211, 1);">
                        <div class="left">
                            <h1>Users</h1>
                            <h2>All</h2>
                        </div>
                        <div class="right">
                            <a href="">View all</a>
                            <img src="{{asset('image/user.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="left card" >
                        <div class="left">
                            <h1>Users</h1>
                            <h2>All</h2>
                        </div>
                        <div class="right">
                            <a href="">View all</a>
                            <img src="{{asset('image/user.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="left card" style="background-color: rgb(235, 220, 13);">
                        <div class="left">
                            <h1>Users</h1>
                            <h2>All</h2>
                        </div>
                        <div class="right">
                            <a href="">View all</a>
                            <img src="{{asset('image/user.svg')}}" alt="">
                        </div>
                    </div>
    
                </div>
                <div class="row3" >
                    <div class="left card" >
                        <div class="top">
                            <h2>Infos about Sales</h2>
                            <a href="">View all</a>
                        </div>
                        <div class="table" style="background-color: rgb(11, 168, 155);">
                            <table>
                                <thead>
                                    <th>Name</th>
                                    <th>Countrie</th>
                                </thead>
                                <tbody>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, consequuntur laboriosam quasi, assumenda consequatur, eveniet dolore perspiciatis laudantium ab deleniti eius quas et? Maiores, cum magni natus iure ad reiciendis voluptatibus laborum optio ex reprehenderit. Corporis exercitationem a culpa repudiandae vel nostrum dignissimos quas officiis aliquid, voluptates voluptatibus minus doloribus veritatis iusto, amet eveniet aperiam, fugit dicta dolores ipsa beatae maiores eos nihil! Eos et, quod autem, illum mollitia delectus ut, reiciendis ducimus recusandae veniam harum beatae? Ratione id non a velit molestiae aperiam rem aut voluptas, maxime sint sit facilis doloremque asperiores excepturi recusandae, quidem at quas laborum doloribus.</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab rem quo earum est mollitia nemo alias. Quaerat similique in cum saepe voluptatem corrupti facere suscipit laboriosam dolorem, deleniti doloremque maxime quas non quidem quisquam quo ipsum excepturi error repellendus sit nam recusandae enim mollitia. Dolore cupiditate, commodi minima enim autem dolor. Mollitia at ex vitae, neque cum reiciendis voluptate. Impedit consectetur repellendus, itaque sequi in quis tempore animi pariatur iste cupiditate nihil ratione laboriosam non molestias? Ipsa amet dolor hic temporibus ullam expedita quisquam sit veniam repudiandae illo obcaecati nisi nulla beatae architecto accusamus, est sapiente voluptates quis itaque consectetur. Iusto id similique beatae tempora inventore. Illo, quas sit distinctio eaque esse, deleniti fuga temporibus veritatis molestias quam nesciunt harum! Commodi eligendi, ab consectetur laboriosam perspiciatis autem nobis id vitae itaque soluta, inventore hic maxime a fuga illum recusandae, ea amet quo repellat. Vero ducimus eius eligendi, quod earum explicabo animi in quibusdam, quisquam autem vitae vel a necessitatibus at commodi doloremque praesentium accusantium. Id aliquid neque libero non asperiores repellendus veritatis maxime dolores iste unde. Nulla reiciendis iusto quia culpa doloremque necessitatibus, quaerat voluptate aperiam praesentium vitae, voluptatibus totam rerum. Nemo, omnis. Magnam ipsam deleniti doloribus! Magni, ipsum quasi.</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <script>
            /// Dorp down user profile

        let userdropdown=document.getElementById("dropdownuser");

        userdropdown.addEventListener("click", ()=>{
            let listdrop=document.querySelector(".dropusershow");
            listdrop.classList.toggle("dropuserhide");
        });
    </script>
</body>
</html>