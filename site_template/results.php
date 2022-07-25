<?php 
            
if($count < 1) {

    ?>
<div class="error">

    Sorry! There are no results that match your search.
    Please use the search box in the side bar to try again.

</div> <!-- end error  -->

<?php
} // end no results if

else {
    do
    {

    ?>

    <!-- results go here -->
    <div class="results">

        <!-- heading and subtitle -->

        <div class="flex-container">
            <div>
                <span class="sub_heading">
                <a href="<?php echo $find_rs['URL']; ?>">
                <?php echo $find_rs['Name']; ?>
                </a>
                </span>

            </div> <!-- / Title -->

        <?php
            if($find_rs['Subtitle'] != "") {

                ?>

            <div>
                &nbsp; &nbsp; | &nbsp; &nbsp;
                <?php echo $find_rs['Subtitle'] ?>
            </div> <!-- Subtitle -->
               
            <?php
            } // end of subtitle if

            ?>

        </div>  <!-- / flex div -->


        <!-- heading and subtitle -->

    <p>
        <b>Genre</b>:
        <?php echo $find_rs['Genre']; ?>

        <br />

        <b>Developer</b>:
        <?php echo $find_rs['DevName']; ?>

        <br />
    
        <b>Rating</b>:
        <?php echo $find_rs['User Rating']; ?>
        - Based off <?php echo $find_rs['Rating Count']; ?> votes
        
        <br />

        <!-- Price -->
        <?php 
        
        if($find_rs['Price'] == "0")
        {
            ?>
            Free
            
            <?php
                if ($find_rs['Purchases'] == "1")
                { ?>
                    (In App Purchase)
            <?php 
                } // end in app if
            ?>

            <br />

        <!-- put price and age in this paragraph tag -->
            
        <?php
        
        } // end price if

        else {
            ?>

            <b>Price:</b> $<?php echo $find_rs['Price'] ?>
        
        <?php 

        } // end price else (displays cost)
        
        ?>
    
        Suitable for ages <b><?php echo $find_rs['Age']?></b> and up
    </p>

        <br />
        
        <!-- Ratings Area -->
        <div class="flex-container">
            
            <!-- Partial Stars Original Source:
            https://codepen.io/Bluetidepro/pen/GkpEa -->
            <div class="star-ratings-sprite">
            <span style="width:<?php echo $find_rs['User Rating'] / 5 * 100 ?>%" class="star-ratings-sprite-rating"></span>
            </div> <!-- star rating div -->

            <div class="actual-rating">
            (<?php echo $find_rs['User Rating']?> based on <?php echo number_format($find_rs['Rating Count']) ?> ratings)
            </div> <!-- text rating div -->
        </div> <!-- rating flexbox -->

    <hr />
    <p>
    <?php echo $find_rs['Description']; ?>
    </p>
        
    </div> <!-- end of results -->

    <br />

    <?php

    } // end results do 

    while ($find_rs=mysqli_fetch_assoc($find_query));

} // end of else
?>