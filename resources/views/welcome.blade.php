<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IM+Fell+DW+Pica&family=Inder&family=Indie+Flower&display=swap" rel="stylesheet">
</head>
<body>
    
</body>
<div class="landing-page">
    <div class="navigation">
        <div class="logo">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo">
        </div>
        <div class="ore-text">
            <p>
                <span class="ore-letter">O</span>
                <span class="ore-letter">r</span>
                <span class="ore-letter">e</span>
                <span class="ore-letter">'</span>
                <span class="ore-letter">s</span>
            </p>
        </div>

        <div class="navbar">
            <div class="search-bar">
                <input type="text" placeholder="Search Recipe..">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
        <div class="nav-links">
            <a href="/about" class="nav-link">About Us</a>
            <span class="link-space"></span>
            <a href="/contact" class="nav-link1">Contact</a>
            <span class="link-space"></span>
        </div>

    <div class="center-left">
        <h2 class="ore-text fade-in-left">
            <span class="ore-highlight">Ore’s</span><br />
            Health Place
        </h2>
        <p class="descrip fade-in-left">Get fresh and tasty continental and intercontinental <br>recipes and how to make them, check and calculate <br>their <span class="calo">calorie</span> count </p>
    </div>
    <div class="learn fade-in-up">
    <a href="{{ route('register') }}" class="learn-more">Sign Up Here</a>
    </div>
    <ul class="thumb">
        <li><a href="#"><img src="{{ asset('assets/pg1.png') }}"></a></li>
        <li><a href="#"><img src="{{ asset('assets/pg2.png') }}"></a></li>
        <li><a href="#"><img src="{{ asset('assets/pg3.png') }}"></a></li>
    </ul>
    <router-view />
</div>

<style>

        body{
        margin: 0;
        padding: 0;
        background: linear-gradient(99deg, rgba(128, 0, 128, 0.13) 24.29%, rgba(128, 0, 128, 0.17) 58.64%, rgba(128, 0, 128, 0.00) 100%);
        font-family: 'Inder', sans-serif;
    }
.landing-page {
    background: url('/images/bg3.png'); 
    background-repeat: no-repeat;
    background-size: contain;
    background-position: right top;
    width: 1366px;
    height: 578px;
    padding-top: 40px;
    
}

.logo {
    display: inline-block;
    vertical-align: middle;
    margin-left: 67px; 
    
  }
  
  .logo img {
    width: 50px; 
    height: auto;
  }
  
  .ore-text {
    display: inline-block;
    vertical-align: middle;
    margin-left: 10px; 
    font-family: 'Inder';
    margin-bottom: 30px;
  }
  .ore-letter {
    font-size: 24px; 
    font-weight: bold;
    font-family: 'Inder';
  }
  
  .ore-letter:nth-child(1) {
    color: #800080; 
  }
  
  .ore-letter:nth-child(2) {
    color: rgba(128, 0, 128, 0.52); 
  }
  
  .ore-letter:nth-child(3) {
    color: #800080; 
  }
  
  .ore-letter:nth-child(4) {
    color: rgba(128, 0, 128, 0.52);
  }
  
  .ore-letter:nth-child(5) {
    color: #800080;
  }

  .navbar {
    display: inline-block;
    vertical-align: middle;
    
  }

  .navigation{
    margin-top: -130px;
  }

  .nav-links{
    display: inline-block;
    vertical-align: middle;
    margin-left: 86px;
    gap: 20px;  
  }
  .link-space {
    margin-left: 70px; 
    display: inline-block;
  }
  
  .nav-link {
    box-shadow: inset 0 0 0 0 #800080;
    text-decoration: none;
    color: #800080;
    margin: 0 -.25rem;
    padding: 0 .25rem;
    transition: color .15s ease-in-out, box-shadow .15s ease-in-out; 
  }
  
  .nav-link:hover {
    box-shadow: inset 100px 0 0 0 #800080;
    color: white;
  }


  .nav-link1 {
    box-shadow: inset 0 0 0 0 #800080;
    color: #800080;
    text-decoration: none;
    margin: 0 -.25rem;
    padding: 0 .25rem;
    transition: color .15s ease-in-out, box-shadow .15s ease-in-out;
  }
  
  .nav-link1:hover {
    box-shadow: inset 100px 0 0 0 #800080;
    color: white; 
  }
  

  .search-bar {
    position: relative;
    display: flex;
    align-items: center;
    margin-left: 76px; 
  }
  
  .search-bar input {
    padding: 8px 30px 8px 10px; 
    border: 1px solid rgba(128, 0, 128, 0.52);
    border-radius: 4px;
    color: rgba(128, 0, 128, 0.52);
  }
  
  .search-icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    background-size: contain;
  }
  
  
  .search-bar input::placeholder {
    color: transparent;
  }
  
  
  .search-bar input:hover::placeholder,
  .search-bar input:focus::placeholder {
    color:rgba(128, 0, 128, 0.52);
    font-family: 'Inder';
  }
  
  .button-space {
    width: 79px;
    display: inline-block;
    vertical-align: middle;
  }




.center-left{
    margin-left: 55px;
    margin-top: -130px;

}

.ore-highlight {

    color: #800080;
    font-family: IM FELL DW Pica;
    font-size: 128px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.ore-text{

color: #000;
font-family: Kameron;
color: #000;
font-family: Kameron;
font-size: 80px;
font-style: normal;
font-weight: 700;
line-height: normal;
}

.calo{

    color: #000;
    font-family: Inter;
    font-size: 24px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}

.descrip{
    color: #575353;
    word-wrap: break-word;
    font-family: Inter;
    font-size: 24px;
    font-style: normal;
    margin-top: -30px;
    margin-left: 15px;
}


.learn{
  display: inline-block;
  vertical-align: middle;
  margin-left: 70px;
  font-family: 'Inder';
}

.learn-more {
  padding: 12px 28px;
  border-radius: 45px;
  border: 1px solid #800080;
  background-color: #800080; 
  color: #fff;
  font-weight: 600;
  cursor: pointer;
  font-family: 'Inder';
  margin-right: 30px;
  transition: background-color 0.3s;
  flex-shrink: 0;
  text-decoration: none;
}

.learn-more:hover {
  background: rgba(217, 217, 217, 0.00);
  color: #000;
    }

.thumb{
  position: absolute;
  left: 50%;
  bottom: -10px;
  transform: translate(-50%);
  display: flex;
}
.thumb li{
  list-style: none;
  display: inline-block;
  margin: 0 20px;
  cursor: pointer;
  transition: 0.6s;
}
.thumb li:hover{
  transform: translateY(-15px);
}
.thumb li img{
  max-width: 60px;
}
.fade-in-left {
        animation: fadeInLeft 1s ease-in-out;
    }

    .fade-in-up {
        animation: fadeInUp 1s ease-in-out;
    }

    .landing-page .ease-in {
        transition: opacity 0.5s ease-in, transform 0.5s ease-in;
    }
</style>
</body>
</html>