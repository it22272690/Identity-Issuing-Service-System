var searchButton = document.querySelector('.buttonF');

  searchButton.addEventListener('click', function()
  {
    var searchInput = document.getElementById('sss');
    var searchTerm = searchInput.value;

    if (searchTerm.trim() === '')
	{
      alert('Please enter a search term.');
    } 
	else 
	{
      alert('If not found, please fill out the quick contact form.');
    }
  };