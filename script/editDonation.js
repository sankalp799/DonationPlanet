let donationBtns = document.querySelectorAll('#donationBarBtns button');

donationBtns.forEach(curr => {
    curr.addEventListener('click', () => {
        let donationID = curr.parentNode.parentNode.firstElementChild.innerHTML;
        let code = curr.getAttribute('verify');
    });
});


let editDonationRequest = (donationID = null, verificationCode = null) => {
    $.ajax({
        url: 'php/DonationSectionRequest.php',
        method: "POST",
        data: {
            donationID: donationID,
            verificationCode: verificationCode
        },
        success: function(data) {
            $('#').html(data);
        }
    });
}