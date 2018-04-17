<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title> -->
    <?php wp_head();?>
</head>
<body>
    <header class="header">
        <div class="header__navigation">
            <div class="fixed">
                <div class="row">
                    <div class="brand">          
                    
                        <a href='<?php echo site_url( )?>'>
                            <svg class="brand__img">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/img/sprite.svg#newresonance"></use>
                            </svg>   
                        </a> 
                    
                        <a class="brand__text" href="<?php echo site_url( )?>"><strong>Resonance</strong>Realty</a>
                    </div>
                    <nav>
                        <div class="nav-mobile">
                            <a id="nav-toggle" href="#!"><span></span></a>
                        </div>
                        <ul class="nav-list">
                            <li><a href="<?php echo site_url( '/sell' );?>">Sell</a>
                                <ul class="nav-dropdown">
                                    <li><a href="#!">Fast Cash Offer</a></li>
                                    <li><a href="#!">Already Moved</a></li>
                                    <li><a href="#!">Stop Foreclosure</a></li>
                                    <li><a href="#!">No Equity</a></li>
                                    <li><a href="#!">Previously Listed</a></li>
                                    <li><a href="#!">Code Violations</a></li>
                                    <li><a href="#!">Inheritance</a></li>
                                    <li><a href="#!">Double Payments</a></li>
                                    <li><a href="#!">Problem Rental</a></li>
                                </ul>
                            </li>
                            <li><a href="#!">Buy</a></li>
                            <li><a href="leaseoption.html">Lease</a></li>
                            
        
                            <li><a href="#!">About</a>
                                <ul class="nav-dropdown">
                                    <li><a href="<?php echo site_url( '/about-us' )?>">About Us</a></li>
                                    <li><a href="<?php echo site_url( '/privacy-policy' )?>">Privacy Policy</a></li>
                                    <li><a href="#!">Opportunities</a></li>
                                </ul>
                            </li>
                            <li><a href="#!">Blog</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>    
    
