let filterBtns = document.querySelectorAll('#donationFilterBtn');
let categoryView = document.getElementById('category');
let filter = categoryView.innerText;
let searchBar = document.getElementById('donationSearchBar');
let donationSearchBtn = document.getElementById('donationSearchBtn');

// donation data fetch function
function fetchDonationData(category, searchText) {
    $.ajax({
        url: '../php/fetchDonation.php',
        method: "POST",
        data: {
            filter: category,
            search: searchText
        },
        success: function(data) {
            $('#donationViewSection').html(data);
        }
    });
}

fetchDonationData("All", "");


// fetch donations according to categories 
filterBtns.forEach((current) => {
    current.addEventListener('click', () => {
        console.log(true);
        categoryView.innerText = current.innerText;
        filter = categoryView.innerText;
        fetchDonationData(filter, searchBar.innerText);
        console.log(filter, searchBar.textContent);
    });
});

// fetch donation data through search bar
searchBar.addEventListener('keyup', (evt) => {
    console.log(true);
    console.log(searchBar.innerText);
    fetchDonationData(filter, searchBar.innerText);
});