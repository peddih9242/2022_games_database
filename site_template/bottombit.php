<div class="box side">
           
<h2>Add an App | <a class="side" href="showall.php">Show All</a></h2>

<form class="searchform" method="post" action="name_dev.php" enctype="multipart/form-data">

    <input class="search" type="text" name="dev_name" size="30" value="" required placeholder="App Name / Developer Name..."/>
    
    <input class="submit" type="submit" name="find_dev_name" value="&#xf002;" />

</form>

<form class="searchform" method="post" action="free.php" enctype="multipart/form-data">

    <input class="submit free" type="submit" name="free" value="Free with no In App Purchase &nbsp; &#xf002;" />

</form>

<br />
<hr />
<br />

<div class="advanced-frame">

<form class="searchform" method="post" action="advanced.php" enctype="multipart/form-data">

<input class="adv" type="text" name="app_name" size="30" value="" placeholder="App Name / Title..."/>

<input class="adv" type="text" name="dev_name" size="30" value="" placeholder="Developer..."/>

<input class="submit advanced-button" type="submit" name="advanced" value="Search &nbsp; &#xf002;" />

<!-- Genre Dropdown -->

<select name="genre">
<!-- get options from database -->
<?php 
$genre_sql = "SELECT * FROM `genre` ORDER BY `genre`.`Genre` ASC"
$genre_query = mysqli_query($db_connect, $genre_sql);
$genre_rs = mysqli_fetch_assoc($genre_query);

do {
?>

<option value="name">Genre Name</option>

<?php
} // end genre do loop

while ($genre_rs = mysqli_fetch_assoc($genre_query);)

?>

</select>

</form>

</div> <!-- / advanced frame -->

 
</div> <!-- / side bar -->

<div class="box footer">
 CC HP 2022
</div> <!-- / footer -->
     

</div> <!-- / wrapper -->

 
</body>