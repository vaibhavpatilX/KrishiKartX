<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    
    <style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
/* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  background: #eef5fe;
}
/* Pre css */
.flex {
  display: flex;
  align-items: center;
}
.nav_image {
  display: flex;
  min-width: 55px;
  justify-content: center;
}
.nav_image img {
  height: 35px;
  width: 35px;
  border-radius: 50%;
  object-fit: cover;
}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 270px;
  background: #fff;
  padding: 15px 10px;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
  transition: all 0.4s ease;
}
.sidebar.close {
  width: calc(55px + 20px);
}
.logo_items {
  gap: 8px;
}
.logo_name {
  font-size: 22px;
  color: #333;
  font-weight: 500px;
  transition: all 0.3s ease;
}
.sidebar.close .logo_name,
.sidebar.close #lock-icon,
.sidebar.close #sidebar-close {
  opacity: 0;
  pointer-events: none;
}
#lock-icon,
#sidebar-close {
  padding: 10px;
  color: #4070f4;
  font-size: 25px;
  cursor: pointer;
  margin-left: -4px;
  transition: all 0.3s ease;
}
#sidebar-close {
  display: none;
  color: #333;
}
.menu_container {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-top: 40px;
  overflow-y: auto;
  height: calc(100% - 82px);
  font-size:initial;
}
.menu_container::-webkit-scrollbar {
  display: none;
}
.menu_title {
  position: relative;
  height: 50px;
  width: 55px;
}
.menu_title .title {
  margin-left: 15px;
  transition: all 0.3s ease;
}
.sidebar.close .title {
  opacity: 0;
}
.menu_title .line {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  height: 3px;
  width: 20px;
  border-radius: 25px;
  background: #aaa;
  transition: all 0.3s ease;
}
.menu_title .line {
  opacity: 0;
}
.sidebar.close .line {
  opacity: 1;
}
.item {
  list-style: none;
}
.link {
  text-decoration: none;
  border-radius: 8px;
  margin-bottom: 8px;
  color: #707070;
}
.link:hover {
  color: #fff;
  background-color: #4070f4;
}
.link span {
  white-space: nowrap;
}
.link i {
  height: 50px;
  min-width: 55px;
  display: flex;
  font-size: 22px;
  align-items: center;
  justify-content: center;
  border-radius: 4px;
}

.sidebar_profile {
  padding-top: 15px;
  margin-top: 15px;
  gap: 15px;
  border-top: 2px solid rgba(0, 0, 0, 0.1);
}
.sidebar_profile .name {
  font-size: 18px;
  color: #333;
}
.sidebar_profile .email {
  font-size: 15px;
  color: #333;
}

/* Navbar */
.navbar {
 /* max-width: 500px;*/
  width: 100%;
  position: fixed;
  top: 0;
  left: 60%;
  transform: translateX(-50%);
  background: #fff;
  padding: 10px 20px;
  border-radius: 0 0 8px 8px;
  justify-content: space-between;
}
#sidebar-open {
  font-size: 30px;
  color: #333;
  cursor: pointer;
  margin-right: 20px;
  display: none;
}
.search_box {
  height: 46px;
  max-width: 500px;
  width: 100%;
  border: 1px solid #aaa;
  outline: none;
  border-radius: 8px;
  padding: 0 15px;
  font-size: 18px;
  color: #333;
}
.navbar img {
  height: 40px;
  width: 40px;
  margin-left: 20px;
}

/* Responsive */
@media screen and (max-width: 1100px) {
  .navbar {
    left: 65%;
  }
}
@media screen and (max-width: 800px) {
  .sidebar {
    left: 0;
    z-index: 1000;
  }
  .sidebar.close {
    left: -100%;
  }
  #sidebar-close {
    display: block;
  }
  #lock-icon {
    display: none;
  }
  .navbar {
    left: 0;
    max-width: 100%;
    transform: translateX(0%);
  }
  #sidebar-open {
    display: block;
  }
}

* {
  box-sizing:border-box;
  margin:0;
}

body {
	/*background: linear-gradient(90deg, #BE8CEF 0%, rgba(61, 46, 232, 0.83) 100%);*/
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
  font-size:10px;
	height: 100vh;
	margin: -20px 0 50px;
}

.container {
	background-color: $white;
	border-radius: 5px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
  min-width:370px;
}

h2 {
  font-size:2rem;
  margin-bottom:1rem;
}
.form-container {
  display:flex;
}

.left-container {
  flex:1;
  height:480px;
  /* background-color:$teal; */
  background:url(images/feedback.jpg);
  background-position:center;
  background-size:cover;
}
.right-container {
  display:flex;
  flex:1;
  height:460px;
  background-color: $white;
  justify-content:center;
  align-items:center;
}

.left-container {
  display:flex;
  flex:1;
  height:480px;
  justify-content:center;
  align-items:center;
    color:$white;
    /* background-color:#ddd; */
    /* background:url(images/feedback.jpg); */
}

.left-container p {
  font-size:0.9rem;
}

.right-inner-container {
  width:70%;
  height:80%;
  text-align:center;
}

.left-inner-container {
  height:50%;
  width:80%;
  text-align:center;
  line-height:22px;
  background-color:black;
}

input, textarea {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
  font-size:0.8rem;
}

input:focus, textarea:focus{
  outline:1px solid $teal;
}

button {
	border-radius: 20px;
	border: 1px solid #00b4cf;
	background-color: #00b4cf;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
  cursor:pointer;
}

button:hover {
  opacity:0.7;
}
@media only screen and (max-width: 600px) {
  .left-container{
    display: none;
  }
  .lg-view {
    display:none;  
  }
}

@media only screen and (min-width: 600px) {
  .sm-view {
    display:none;  
  }
}

form p {
  text-align:left;
}

    </style>
</head>
<body>
<?php include_once "customerSidebar.php"; ?>

<div class="container">
  <div class="form-container">
    <div class="left-container">
      
      </div>
    <div class="right-container">
      <div class="right-inner-container">
        <form action="" method="Post">
			<h2 class="lg-view">Feedback</h2>
      <h2 class="sm-view">Let's Chat</h2>
           <p>* Required</p>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
          <input type="text" placeholder="Name *"  />
      <input type="email" placeholder="Email *" />
		
			<input type="phone" placeholder="Phone" />
          <textarea rows="4" placeholder="Message"></textarea>
			<button name='submit'>Submit</button>
		</form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php if(isset($_POST['submit'])){ ?>
<script>
 
    alert("Data Submited");
 
</script>
<?php } ?>