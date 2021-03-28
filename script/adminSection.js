let panel = document.getElementById('adminMainSection');
let adminNavigator = document.querySelectorAll('#adminNavigator li');
let text = 'dashboard';

console.log(adminNavigator);

adminNavigator.forEach(curr => {
    curr.addEventListener('click', () => {
        let text = curr.innerHTML.split('<a>');
        text = text[text.length - 1].split('</a>');
        text = text[0];
        sectionFetch(text);
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
            $('#adminMainSection').innerHTML = data;
        }
    });
}