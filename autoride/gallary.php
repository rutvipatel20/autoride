<?php include('header.php'); ?>



<div id="page_caption" class="withtopbar ">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <h1 class="withtopbar">Gallery</h1>
            <!-- <div class="page_tagline">
                This is sample of gallery excerpt and you can set it up using gallery option </div> -->
        </div>
    </div>
</div>
<!-- Begin content -->

<div id="page_content_wrapper" class="">
    <div class="inner">
        <div class="inner_wrapper nopadding">
            <div id="page_main_content" class="sidebar_content full_width nopadding fixed_column">
                <div id="portfolio_filter_wrapper" class="gallery four_cols portfolio-content section content clearfix"
                    data-columns="4">
                    <?php 
                        $gallary = "SELECT * FROM `gallary` WHERE is_active= 1 ORDER BY position ASC ";
                        $result = mysqli_query($conn,$gallary);
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                    <div class="element grid classic4_cols">
                        <div class="one_fourth gallery4 static filterable gallery_type animated1" data-id="post-1">
                            <a data-caption="The road to success and the road to failure are almost exactly the same"
                                class="fancy-gallery" href="admin/gallary/<?= $row['image'] ?>">
                                <img src="admin/gallary/<?= $row['image'] ?>" alt="" style="height: 300px;"/>
                            </a>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br class="clear" />
</div>

<?php include('footer.php'); ?>