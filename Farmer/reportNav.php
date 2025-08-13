<?php 
echo'
<style>
.navbar2 {
    width: 100%;
   height: 50px;
    margin-top: 15px;
    margin-bottom: 20px; /* Adjust as needed based on your existing navbar height */
    background: #fff;
   padding: 5px;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    justify-content: center; 
}

.nav-links {
    list-style-type: none;
    text-align: center;
    margin-left: 25%;
    display: flex;

}

.nav-links li {
    margin-right: 20px;
}

/* Style for button property */
.button {
    display: inline-block;
    padding: 5px 20px;
    text-decoration: none;
    color: Black;
    transition: background-color 0.3s ease;
    border: 2px solid;
    border-image: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5) 1;
    /* Ensure the border image slices evenly */
    border-image-slice: 1;
    /* Set border radius */
    border-radius: 10px; /* Adjust the value as needed */
    /* Set border color */
    border-color: #333; 
    cursor: pointer;
}

.button:hover {
  color: #7F7FD5;
}
</style>


<div class="navbar2">
<ul class="nav-links">
    <li><a href="orderReport.php" class="button">Order Report</a></li>
    <li><a href="salesReport.php" class="button">Sales Report</a></li>
    <li><a href="paymentReport.php" class="button">Payment Report</a></li>
    <li><a href="graphReport.php" class="button">Graphs</a></li>

</ul>
</div>';
?>