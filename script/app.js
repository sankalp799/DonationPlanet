const firstPhotoSlider = document.getElementById("first-slider");
const quoteSlider = document.getElementById("quoteSlider");
let index = 0;
let quoteIndex = 0;
let loader = document.getElementById('loader');
let doneTick = document.getElementById('done');

const slider1 = [
    "../css/img/sliderPhotos/img-3.jpeg",
    "../css/img/sliderPhotos/img-4.jpg",
    "../css/img/sliderPhotos/img-6.jpg",
    "../css/img/sliderPhotos/img-7.jpg",
    "../css/img/sliderPhotos/img-8.jpg",
    "../css/img/sliderPhotos/img-11.png",
];

const quotes = [
    `We Make A Living By What <br /> We Get. We Make A Life By What <br /> We Donate.<br />
<br /> Those Who are Happiest are Those <br />Who do Most for Other. <br />
<br />No One Has Ever<br />Become a Poor By Donating.`,
    `Happiness Doesn't Result From What <br />We Get. But What We Give.
<br />
<br /> The Measure Of Life, After <br />All, is not Duration, But its<br />Donation.`,
];

setInterval(() => {
    index = index % slider1.length;
    firstPhotoSlider.style.backgroundImage = `url(${slider1[index]})`;
    index += 1;
}, 3000);

setInterval(() => {
    quoteIndex = quoteIndex % quotes.length;
    quoteSlider.innerHTML = quotes[quoteIndex];
    quoteIndex += 1;
}, 3000);

document.getElementById('getInTouchBtn').addEventListener('click', () => {
    let sent = false;
    Email.send({
        Host: "smtp.gmail.com",
        Username: "helpinghands032021@gmail.com",
        Password: "mcflonomcfloonyloo",
        To: 'sankalpprithyani@gmail.com',
        From: "helpinghands032021@gmail.com",
        Subject: "getInTouch",
        Body: "Welcome to Helping Hand",
    }).then(
        message => {
            alert("mail sent successfully");
            sent = true;
        }
    );
    console.log(sent);
});