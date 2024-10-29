<?php
include('header.php');
?>
<div id="page_caption" class="hasbg parallax  withtopbar  " style="background-image:url(upload/driver-2.jpg);">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1 class="withtopbar">Contact Us</h1>
                <div class="page_tagline">
                    This is sample of page tagline and you can set it up using page option </div>
            </div>
        </div>
    </div>

</div>

<div class="ppb_wrapper hasbg withtopbar">
    <div class="one withsmallpadding ppb_text" style="text-align:center;padding:0px 0 0px 0;margin-top:20px;">
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:80%">
                        </p>
                        <h4 class="p1"><span class="s1"><b>Just over a month into my trip and I wonder how I’ve changed, if at all. Certainly the experiences I’ve had and things I’ve seen have shaped me in someway. </b></span></h4>
                        <div style="margin-top: 30px;">
                            <div class="social_wrapper shortcode dark ">
                                <ul>
                                    <li class="facebook"><a target="_blank" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="youtube"><a target="_blank" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li class="pinterest"><a target="_blank" title="Pinterest" href="https://pinterest.com/#"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="instagram"><a target="_blank" title="Instagram" href="https://instagram.com/theplanetd"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="one withsmallpadding ppb_text" style="text-align:left;padding:0px 0 0px 0;margin-bottom:60px;">
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:60%">
                        <div role="form" class="wpcf7" id="wpcf7-f2465-o1" lang="en-US" dir="ltr">
                            <div class="screen-reader-response"></div>
                            <form class="quform" action="" method="post" enctype="multipart/form-data" onclick="">

                                <div class="quform-elements">
                                    <div class="quform-element">
                                        <br>
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input id="name" type="text" name="name" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Name*" required>
                                        </span>
                                    </div>
                                    <div class="quform-element">
                                        <br>
                                        <span class="wpcf7-form-control-wrap your-email">
                                            <input id="email" type="email" name="email" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Email*" required>
                                        </span>
                                    </div>
                                    <div class="quform-element">
                                        <br>
                                        <span class="wpcf7-form-control-wrap your-message">
                                            <textarea id="message" name="message" cols="40" rows="10" class="input1" aria-invalid="false" placeholder="Message*" required></textarea>
                                        </span>
                                    </div>

                                    <!-- Begin Submit button -->
                                    <div class="quform-submit">
                                        <div class="quform-submit-inner">
                                            <button type="send" name="send" class="submit-button"><span>Send</span></button>
                                        </div>
                                        <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="one_half_bg withsmallpadding ppb_text_image withbg parallax " style="font-size:18px;background-image:url(upload/pexels-photo-165888.jpeg);background-position: center center;text-align:center;padding:100px 0 100px 0;color:#ffffff !important;">
        <div class="overlay_background" style="background:#000000;background:rgb(0,0,0,0.5);background:rgba(0,0,0,0.5);"></div>
        <div class="page_content_wrapper">
            <div class="inner">
                <div style="margin:auto;width:100%">
                    </p>
                    <h2 style="color: #fff;">California</h2>
                    <p>78 Collective Street
                        <br /> Manhattan
                        <br /> Kingston
                        <br /> United State
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="one_half_bg last withsmallpadding ppb_text_image withbg parallax " style="font-size:18px;background-image:url(upload/cfi7_hcxecu-anthony-delanoix.jpg);background-position: center center;text-align:center;padding:100px 0 100px 0;color:#ffffff !important;">
        <div class="overlay_background" style="background:#000000;background:rgb(0,0,0,0.5);background:rgba(0,0,0,0.5);"></div>
        <div class="page_content_wrapper">
            <div class="inner">
                <div style="margin:auto;width:100%">
                    </p>
                    <h2 style="color: #fff;">London</h2>
                    <p>732/21 Second Street
                        <br /> King Street
                        <br /> Kingston
                        <br /> United Kingdom
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['send'])) {
    // echo '<pre>';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = " INSERT INTO `contact`(`name`, `email`, `message`)
         VALUES ('$name','$email','$message')";

    $query = mysqli_query($conn, $sql);
    if ($query) {
?>
        <script>
            window.location.href = "index.php";
        </script>
<?PHP
    } else {
        echo "no" . mysqli_error($conn);
    }
}

?>

<?php

include('footer.php');
// test git
?>

