<?php
include('conection.php');
session_start();
$tot = 0;


if(isset($_GET['subodNo'])){
    $odno = $_SESSION['orderno'] = $_GET['orderno'];

}else if(isset($_GET['no'])){
    $odno = $_GET['no'];
}else{
    $odno = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- header design -->
    <header class="header">
        <a href="#" class="logo">ROYAL <span>look</span></a>
        <img src="icon/menu.png" alt="">
        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#services">Collections</a>
            <a href="#portfolio">Product</a>
            <a href="#tabeT">Order</a>
        </nav>
    </header>
    <!-- home section design -->
        <section class="home" id="home">
            <div class="home-content">
                <h3>ආයුබෝවන්!, wellcome!</h3>
                <h1>ROYAL <span>look</span></h1>
                <h3>NEWEST FASHION <span>TRENDS FOR ALL ALIKE</span></h3>
                <p>Quintessentially chic, Dilly’s has been a popular and
                    well-respected local brand for over 25 years. As part
                    of a fashion retail evolutionary ethos, Dilly's has
                    re-branded and come to life as "Dilly & Carlo" in order
                    to cater to the modern man and woman's complete wardrobe
                    requirement.</p>
                <div class="social-media">
                    <a href="#"><img src="icon/fb.png" alt=""></a>
                    <a href="#"><img src="icon/wh.png" alt=""></a>
                    <a href="#"><img src="icon/in.png" alt=""></a>
                    <a href="#"><img src="icon/i5.png" alt=""></a>
                </div>
                <a href="" class="btn">Download<img src="icon/download.png" alt=""></a>
            </div>
                <div class="home-img">
                <img src="icon/dd.jpg" alt="">
                </div>
        </section>

    
        <section class="about" id="about">
            <div class="about-img">
                <img src="icon/fashion1.jpg" alt="">
            </div>
            <div class="about-content">
                <h3>ROYAL <span>look</span></h3>
                <h2 class="heading">About <span>Us</span></h2>
               
                <p>Discover adorable fashion for your little ones with TFS Kids Collection.
                    Exceptional style, just at LKR 590/-! 
                    Visit us at our Nugegoda and Bambalapitiya branches.
                    Your child's next favourite outfit is just a store visit away!
                    Please note: We're all about ensuring you have the best shopping experience,
                    and currently offer in-store shopping only. We look forward to welcoming you
                    at our stores!</p>
                <a href="#" class="btn">Read More</a>
            </div>
        </section>

        <!-- services section design -->
        <section class="services" id="services">
            <h2 class="heading">Our <span>Collections</span></h2>
            <div class="services-container">
                <div class="services-box">
                   
                    <img src="icon/profile3.png" alt="">
                    <h3>MEN'S</h3>
                    <h2><span>view collection</span></h2>
                    <p>Humble Beginning To South Asia's
                    Largest Single Owner Department Store
                    We believe in a philosophy that, if you
                    look good, you’ll feel great and when you
                    feel amazing, that positive feeling is infectious
                    and this
                    </p>
                    <a href="#" class="btn">View More</a>
                </div>

                <div class="services-box">
                    <img src="icon/profile7.png" alt="">
                    <h3>WOMEN'S</h3>
                    <h2><span>view collection</span></h2>
                    <p>Humble Beginning To South Asia's
                    Largest Single Owner Department Store
                    We believe in a philosophy that, if you
                    look good, you’ll feel great and when you
                    feel amazing, that positive feeling is infectious
                    and this
                    </p>
                    <a href="#" class="btn">View More</a>
                </div>

                <div class="services-box">
                    <img src="icon/kid.png" alt="">
                    <h3>KIDS</h3>
                    <h2><span>view collection</span></h2>
                    <p>Humble Beginning To South Asia's
                    Largest Single Owner Department Store
                    We believe in a philosophy that, if you
                    look good, you’ll feel great and when you
                    feel amazing, that positive feeling is infectious
                    and this
                    </p>
                    <a href="#" class="btn">View More</a>
                </div>

            </div>
        </section>
         <!-- portfolio section design -->
        <section class="portfolio" id="portfolio">
            <h2 class="heading">NEW <span>ARRIVALS</span></h2>
            <div class="portfolio-container">

            <?php
                $query = "select * from product";
                $result = mysqli_query($conn,$query);
                while($row =mysqli_fetch_assoc($result)){
       
            ?>

            <form action="backend.php">

                <div class="portfolio-box">
                <!-- <img src="icon/phone1.png" alt="" class="myimg"> -->
                <img src="<?php echo $row['image1'] ?>" class="myimg">
                <img src="<?php echo $row['image2'] ?>" class="myimg2">
                <div class="portfolio-layer">
                    <h4>ROYAL look</h4>
                    <h4><?php echo $row['productName'];?></h4>
                    <h4><?php echo $row['price'];?></h4>

                    <input type="hidden" name="productid" value="<?php echo $row['pid'];?>">
                    <input type="hidden" name="productPrice" value="<?php echo $row['price'];?>">
                    <input type="hidden" name="oderid" value="<?php echo $odno ?>">




                    <p><?php echo $row['description'];?></p>
                    <input type="number" name="qty" Required value="1" min="0"><br>
                    <input type="submit" value="Order" id="b2">
                    <a href="#tabeT"><img src="icon/buy.png" alt=""></a>
                </div>
                </div>

                </form>  
                         
                <?php
                    }
                ?>

            </div>      
        </section>

         <!-- footer tabel design -->
         <section class="tabel" id="tabeT">
         <div class="column2">
                <form action="">
                    <input type="number" name="orderno" min="0" value="<?php echo $odno ?>" class="t1">
                    <a href="#tabeT"><input type="submit" name="subodNo" id="b1"></a>
                </form>
                <table border="1">
                <thead>
		            <tr>
			            <th>order id</th>
			            <th>product id</th>
			            <th>Product Price</th>
                        <th>contity</th>
                        <th>total price</th>
                        <th>Remove</th>           
                        
            
		            </tr>
	            </thead>
		        <tbody>
                <?php
                    $query = "select * from ordertabel where orderid='$odno'";
                    $result = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_assoc($result)){
                    ?>
		            <tr >
           
                        
			            <td><?php echo $data['orderid']; ?></td>
                        <td><?php echo $data['pid']; ?></td>
                        <td><?php echo $data['price']; ?></td>
                        <td><?php echo $data['qty']; ?></td>


                        <td><?php echo $data['price'] * $data['qty']; ?></td>

                        <?php $tot += $data['qty'] * $data['price'] ?>
                        <td><a href="remove.php?ord=<?php echo $data['orderid']; ?>&id=<?php echo $data['pid']; ?>"><img src="icon/remove2.png" alt=""></a></td>

            
           
		            </tr>
                <?php
                    }
                    echo '<tr>';
                    echo '<td colspan=4 class="tdTot1">Total</td>';
                    echo '<td class="tdTot1">' . $tot . '</td>';
                    echo '</tr>';
                ?>

	            </tbody>
	
	            </table>
            </div>
        </section>







       <!-- footer design -->

       <footer class="footer">
        <div class="footer-text">
            <p>Copyright &copy; 2023 by codehel | All Rights Reserved.</p>
        </div>

        <div class="footer-iconTop">
            <a href="#">Home<img src="icon/up.png" alt=""></a>
        </div>

       </footer>
      
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <script src="javascript.js"></script>
</body>
</html>