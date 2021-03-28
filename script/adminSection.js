let panel = document.getElementById('adminMainSection');
let adminNavigator = document.querySelectorAll('#adminNavigator li a');
let text = 'dashboard';

adminNavigator.forEach(curr => {
    curr.addEventListener('click', () => {
        text = curr.innerHTML.toLowerCase();
        console.log(text);
    });
});

let sectionFetch = (pageReqText) => {
    $.ajax({
        url: '../admin/sectionReq.php',
        method: "POST",
        data: {
            pageName: text
        },
        success: function(data) {
            $('#adminMainSection').html(data);
        }
    });
}