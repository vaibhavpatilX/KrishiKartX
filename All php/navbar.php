<?php echo" <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
 nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 5px;
    z-index: 1000; /* Ensure nav bar appears above other content */
}
.logo{
width:30%;

}

/* Container Box Styling */
.container {
    display: flex;
    justify-content: center; /* Center the boxes initially */
    align-items: flex-start; /* Adjusted alignment to top */
    width: 95%;
    margin: 170px auto 50px; /* Adjusted margin to create space below nav bar */
    transition: justify-content 0.5s ease; /* Smooth transition for box positioning */
}
.nav-links {
  display: flex;
  align-items: center;
  background:white;
  padding: 10px 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  overflow: hidden;
}

.nav-links li {
  list-style: none;
  margin: 0 15px;
  opacity: 0; /* Start with opacity 0 for fade-in effect */
animation: fadeIn 1s ease-in forwards;
}
@keyframes fadeIn {
  0% {
      opacity: 0;
      transform: translateX(10px); /* Optional: Slide-in effect */
  }
  100% {
      opacity: 1;
      transform: translateX(0);
      }
  }

    .nav-links li a {
      position: relative;
      color: #333;
      font-size: 18px;
      font-weight: 500;
      padding: 6px 0;
      text-decoration: none;
    }

    .nav-links li a:before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      height: 3px;
      width: 0%;
      background: #34efdf;
      border-radius: 12px;
      transition: all 0.4s ease;
    }

    .nav-links li a:hover:before {
      width: 100%;
    }

    .nav-links li.center a:before {
      left: 50%;
      transform: translateX(-50%);
    }

    .nav-links li.upward a:before {
      width: 100%;
      bottom: -5px;
      opacity: 0;
    }

    .nav-links li.upward a:hover:before {
      bottom: 0px;
      opacity: 1;
    }

    .nav-links li.forward a:before {
      width: 100%;
      transform: scaleX(0);
      transform-origin: right;
      transition: transform 0.4s ease;
    }

    .nav-links li.forward a:hover:before {
      transform: scaleX(1);
      transform-origin: left;
    }

    /* Dropdown styles */
    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 200px;
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      z-index: 1;
      margin-top: 5px; /* Add margin-top for space */
      border-radius: 8px; /* Add border radius */
    }
    .dropdown-content ul li a {
      font-size: 14px; /* Change the font size to 14px */
    }

    .dropdown-content li {
      padding: 8px 0; /* Add padding to the dropdown list items */
    }

    .nav-links li.dropdown:hover .dropdown-content {
      display: block;
    }
    h1 {
    font-size: 25px; /* Adjust the font size as needed */
  }
</style>


<nav>
  <div>
    <h1>KrishiKartX</h1>
  </div>

  <ul class='nav-links'>
    <li><a href='index.php'>Home</a></li>
    <li><a href='product.php'>Product</a></li>
    <li><a href='farmer.php'>Farmers</a></li>
    <li><a href='about.php'>About Us</a></li>
    <li><a href='contact.php'>Contact Us</a></li>
    <li><a href='customerDashboard.php'>Account</a></li>
  </ul>
</nav>
";
?>
