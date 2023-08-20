
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IM+Fell+DW+Pica&family=Inder&family=Indie+Flower&display=swap" rel="stylesheet">
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        background: linear-gradient(99deg, rgba(128, 0, 128, 0.13) 24.29%, rgba(128, 0, 128, 0.17) 58.64%, rgba(128, 0, 128, 0.00) 100%);
        font-family: 'Inder', sans-serif;
    }
      .card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 40px;
  }
  
  .card {
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 15px;
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
    height: 140px;
  }
  
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
  }
  
  .card img {
    width: 100%;
    height: auto;
    border-radius: 8px;
  }
  
  .card h3 {
    margin-top: 10px;
  }
  
  .card-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .card-popup-content {
    background-color: white;
    padding: 20px; 
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    max-width: 400px; 
    margin: 0 auto;
    margin-top: 80px;
}
  
  .cancel-button {
    background: none;
    border: none;
    cursor: pointer;
    position: absolute; 
    top: 10px;
    right: 10px; 
  }
  
  .cancel-button .material-icons {
    font-size: 24px;
  }

  .search-bar {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
   
}

.search-form {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    background-color: white; /* Example background color */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.search-form input[type="text"] {
    padding: 8px;
    border: none;
    border-radius: 4px;
}

.search-button {
    background-color: purple; 
    color: white; 
    border: none;
    padding: 8px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}
button {
  margin-left: 10px;
  padding: 8px 16px;
  background-color: #800080;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.sidebar {
  position: fixed;
  bottom: -20%;
  left: 100px;
  margin-left: -230;
  transform: translateY(-50%);
  width: 40px;
  height: 60%;
  display: flex;
  align-items: center;
  flex-direction: column;
  border-radius: 9px;
  background: #FFF;
  backdrop-filter: blur(17px);
  --webkit-backdrop-filter: blur(17px);
  border-right: 1px solid rgb(255, 255, 255);
  transition: width 0.6s ease;
}

.sidebar:hover {
  width: 260px;
}

.sidebar .logo {
  color: #000;
  display: flex;
  align-items: center;
  padding: 25px 10px 15px;
}

.logo img {
  width: 43px;
  border-radius: 50%;
}

.logo h2 {
  font-size: 1.15rem;
  font-weight: 600;
  margin-left: 15px;
  display: none;
}

.sidebar:hover .logo h2 {
  display: block;
}

.sidebar .links {
  list-style: none;
  margin-top: 20px;
  overflow-y: auto;
  scrollbar-width: none;
  height: calc(100% - 140px);
}

.sidebar .links::-webkit-scrollbar {
  display: none;
}

.links li {
  display: flex;
  border-radius: 4px;
  align-items: center;
}

.links li:hover {
  cursor: pointer;
  background: linear-gradient(99deg, rgba(128, 0, 128, 0.13) 24.29%, rgba(128, 0, 128, 0.17) 58.64%, rgba(128, 0, 128, 0.17) 59.67%);
}

.links h4 {
  color: #222;
  font-weight: 500;
  display: none;
  margin-bottom: 10px;
}

.sidebar:hover .links h4 {
  display: block;
}

.links hr {
  margin: 10px 8px;
  border: 1px solid #4c4c4c;
}

.sidebar:hover .links hr {
  border-color: transparent;
}

.links li span {
  padding: 12px 10px;
}

.links li a {
  padding: 10px;
  color: #000;
  display: none;
  font-weight: 500;
  white-space: nowrap;
  text-decoration: none;
}

.sidebar:hover .links li a {
  display: block;
}

.material-icons {
  margin-left: -37px;
  color: purple;
}
 </style>
<body>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Restaurants by Location</h1>
        <p>Enter a location name to find restaurants in that area.</p>
        
        <form action="{{ route('restaurants.searchByLocation') }}" method="GET">
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" placeholder="Enter location name" required>
                <small class="form-text text-muted">Enter a city or area name (e.g., Ajah, Ikeja).</small>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <div class="container">
    <div class="card-grid">
        @foreach ($restaurants as $restaurant)
            <div class="card" onclick="showRestaurantPopup(this, '{{ $restaurant->name }}', '{{ $restaurant->address }}', '{{ $restaurant->thumbnail }}')">
                <img src="{{ $restaurant->thumbnail }}" alt="{{ $restaurant->name }}" width="100">
                <h3>{{ $restaurant->name }}</h3>
                <p>Address: {{ $restaurant->address }}</p>
            </div>
        @endforeach
    </div>

    <div class="card-popup" id="restaurantPopup" style="display: none;">
        <div class="card-popup-content">
            <button class="cancel-button" onclick="closeRestaurantPopup()">
                <span class="material-icons">cancel</span>
            </button>
            <h2 id="popupTitle">Restaurant Name</h2>
            <p id="popupAddress">Address:</p>
            <img id="popupThumbnail" src="" alt="Restaurant Thumbnail">
        </div>
    </div>
</div>

<script>
    function showRestaurantPopup(cardElement, name, address, thumbnail) {
        const popup = document.getElementById('restaurantPopup');
        const popupTitle = popup.querySelector('#popupTitle');
        const popupAddress = popup.querySelector('#popupAddress');
        const popupThumbnail = popup.querySelector('#popupThumbnail');

        popupTitle.textContent = name;
        popupAddress.textContent = `Address: ${address}`;
        popupThumbnail.src = thumbnail;

        // Show the popup
        popup.style.display = 'block';
    }

    function closeRestaurantPopup() {
        const popup = document.getElementById('restaurantPopup');
        popup.style.display = 'none';
    }

    function setActiveTab(tab) {
  var links = document.querySelectorAll('.links li');
  for (var i = 0; i < links.length; i++) {
    links[i].classList.remove('active');
  }
  var activeTab = document.querySelector('.' + tab + '-link');
  activeTab.classList.add('active');
}
</script>

    </div>

    <aside class="sidebar">
  <div class="logo">
    <!-- Logo content here -->
  </div>
  <ul class="links">
    <li class="home-link">
      <span class="material-icons">home</span>
      <a href="{{ route('home') }}" onclick="setActiveTab('home')">Home</a>
    </li>
    <br><br>
    <li>
      <span class="material-icons">restaurant</span>
      <a href="{{ route('restaurants.searchByLocation') }}">Restaurants</a>
    </li>
    <br><br>
    <li class="logout-link">
      <span class="material-icons">logout</span>
      <a href="#">Logout</a>
    </li>
  </ul>
</aside>
@endsection
</body>
</html>