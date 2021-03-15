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

/*
// fetch donations according to categories 
filterBtns.forEach((current) => {
    current.addEventListener('click', () => {
        categoryView.innerText = current.innerText;
        filter = categoryView.innerText;
        fetchDonationData(filter, searchBar.innerText);
    });
});

// fetch donation data through search bar
searchBar.addEventListener('keyup', (evt) => {
    console.log(searchBar.innerText);
    fetchDonationData(filter, searchBar.innerText);
});

*/

$('#donationSearchBar').keyup(function() {
    var text = $('#donationSearchBar').val();
    var exp = new RegExp(text, "i");
    console.log(exp);
})