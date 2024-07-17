window.onbeforeunload = function () {
  window.scrollTo(0, 0);
}


function searchPage() {
  // Get the search input value
  var searchInput = document.querySelector('.search-bar').value.toLowerCase();
  
  // Check if the search input matches any page ID
  if (searchInput === 'nic new') 
  {
    window.location.href = 'services.html'; // Navigate to newnic.html
  } 
  else if (searchInput === 'nic copy') 
  {
    window.location.href = 'services.html'; // Navigate to copynic.html
  } 
  else if (searchInput === 'nic edit') 
  {
    window.location.href = 'services.html'; // Navigate to editnic.html
  } 
  else if (searchInput === 'new nic') 
  {
    window.location.href = 'services.html'; // Navigate to editnic.html
  }
  else if (searchInput === 'copy nic') 
  {
    window.location.href = 'services.html'; // Navigate to editnic.html
  }
  else if (searchInput === 'edit nic') 
  {
    window.location.href = 'services.html'; // Navigate to editnic.html
  }else 
  {
    alert('Page not found.'); // Display an alert if the page is not found
  }
}


/*<div class="search-section">
  <input type="text" class="search-bar" placeholder="Search">
  <button class="search-button" onclick="searchPage()"><b>Search</b></button>
</div>*/

