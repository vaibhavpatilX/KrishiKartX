<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        $teal:#00b4cf;
$white:#ffffff;

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

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
  background-color:$teal;
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
    background-color:#ddd;
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="js/form_val.js"></script>

</head>
<body>
<?php include_once "navbar.php"; ?>

<div class="container">
  <div class="form-container">
    <div class="left-container">
      
      <img src="images/location.png" alt="Logo">

      </div>
    <div class="right-container">
      <div class="right-inner-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.4997769291117!2d75.451846040264!3d20.526722489292943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd963f9693ba6b5%3A0xc1824819c6c06ef8!2sFARM%20DEVELOPER%20VISHVAJIT%20PATIL!5e0!3m2!1sen!2sin!4v1713031009195!5m2!1sen!2sin" width="650" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    

  </div>
</div>
</body>
</html>
<?php if(isset($_POST['submit'])){ ?>
<script>
 
    alert("Data Submited");
 
</script>
<?php } ?>