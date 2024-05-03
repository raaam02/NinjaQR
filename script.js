document.addEventListener("DOMContentLoaded", function () {
  const url = document.getElementById("url");
  const colorInput = document.getElementById("colorInput");
  const image = document.getElementById("image");
  const eyeStyle = document.getElementById("eyeStyle");
  const dotStyle = document.getElementById("dotStyle");
  const size = document.getElementById("size");
  const eyeColor = document.getElementById("eyeColor");
  const bgColor = document.getElementById("bgColor");
  const eyeDotColor = document.getElementById("eyeDotColor");
  const deleteLogo = document.getElementById("deleteLogo");
  const dnQR = document.getElementById("dnQR");

  let op = {
    width: 300,
    height: 300,
    type: "svg",
    data: "https://github.com/raaam02",
    image: "images/Ninja NO BG Sharp.png",
    dotsOptions: {
      color: "#8c52ff",
      type: "rounded",
      //   gradient: ,
    },
    cornersSquareOptions: {
      color: "#8c52ff",
      type: "", //dot, square, extra-rounded
    },
    cornersDotOptions: {
      color: "#8c52ff",
      //type: "dot",
    },
    downloadOptions: {
      name: "ninjaQR",
      extension: "svg", // 'png' 'jpeg' 'webp' 'svg'
    },
    backgroundOptions: {
      color: "#e9ebee",
    },
    imageOptions: {
      crossOrigin: "anonymous",
      margin: 2,
      //   imageSize: 0.4,
    },
    qrOptions: {
      errorCorrectionLevel: "H",
    },
  };

  var qrCode;

  function render() {
    qrCode = new QRCodeStyling(op);
    let canvas = document.querySelector("#canvas");
    canvas.innerHTML = "";
    qrCode.append(canvas);
    canvas.nextElementSibling.innerHTML = `${op.width}px x ${op.height}px`;
  }

  render();

  size.addEventListener("input", (e) => {
    op.width = e.target.value * 10;
    op.height = e.target.value * 10;
    render();
  });

  url.addEventListener("keyup", (e) => {
    op.data = e.target.value;
    render();
  });

  colorInput.addEventListener("input", (e) => {
    op.dotsOptions = { color: e.target.value };
    render();
  });

  bgColor.addEventListener("input", (e) => {
    op.backgroundOptions = { color: e.target.value };
    render();
  });

  eyeColor.addEventListener("input", (e) => {
    op.cornersSquareOptions = { color: e.target.value };
    render();
  });

  eyeDotColor.addEventListener("input", (e) => {
    op.cornersDotOptions = { color: e.target.value };
    render();
  });

  deleteLogo.addEventListener("click", (e) => {
    delete op.image;
    render();
  });

  dnQR.addEventListener("click", (e) => {
    op.downloadOptions = { name: "NinjaQR", extension: "png" };
    qrCode.download();
  });

  const imageInput = document.getElementById("image");
  imageInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (event) {
        op.image = event.target.result;
        render();
      };
      reader.readAsDataURL(file);
    }
  });

  const dotStyleItems = document.querySelectorAll("#dotStyle .dropdown-item");
  dotStyleItems.forEach((item) => {
    item.addEventListener("click", (e) => {
      const dotType = e.target.dataset.type;
      if (dotType) {
        op.dotsOptions.type = dotType;
        render();
      }
    });
  });
  const eyeStyleItems = document.querySelectorAll("#eyeStyle .dropdown-item");
  eyeStyleItems.forEach((item) => {
    item.addEventListener("click", (e) => {
      const eyeType = e.target.dataset.type;
      if (eyeType) {
        op.cornersSquareOptions.type = eyeType;
        render();
      }
    });
  });

  //insta button
  const insta = document.getElementById("insta");
  insta.addEventListener("click", function () {
    op.image = "images/insta.png";
    op.imageOptions.margin = 12;
    op.imageOptions.imageSize = 0.3;
    op.dotsOptions.color = "#dd2a7b";
    op.cornersSquareOptions.color = "#8134af";
    op.cornersDotOptions.color = "#515bd4";

    const buttons = document.querySelectorAll(".btn");
    buttons.forEach((button) => button.classList.remove("active"));
    insta.classList.add("active");

    render();
  });

  //All Link Button
  const linkButton = document.getElementById("link");
  linkButton.addEventListener("click", function () {
    op.image = "images/Ninja NO BG Sharp.png";
    op.imageOptions.margin = 2;
    op.imageOptions.imageSize = 0.4;
    op.dotsOptions.color = "#8c52ff";
    op.cornersSquareOptions.color = "#8c52ff";
    op.cornersDotOptions.color = "#8c52ff";

    const buttons = document.querySelectorAll(".btn");
    buttons.forEach((button) => button.classList.remove("active"));
    linkButton.classList.add("active");

    render();
  });

  //facebook button
  const facebook = document.getElementById("facebook");
  facebook.addEventListener("click", function () {
    op.image = "images/facebook.png";
    op.imageOptions.margin = 12;
    op.imageOptions.imageSize = 0.3;
    op.dotsOptions.color = "#1877f2";
    op.cornersSquareOptions.color = "#3b5998";
    op.cornersDotOptions.color = "#adb9d3";

    const buttons = document.querySelectorAll(".btn");
    buttons.forEach((button) => button.classList.remove("active"));
    facebook.classList.add("active");

    render();
  });

  //youtube button
  const youtube = document.getElementById("youtube");
  youtube.addEventListener("click", function () {
    op.image = "images/youtube.png";
    op.imageOptions.margin = 1;
    op.imageOptions.imageSize = 0.4;
    op.dotsOptions.color = "#ff4400";
    op.cornersSquareOptions.color = "#282828";
    op.cornersDotOptions.color = "#ff0000";

    const buttons = document.querySelectorAll(".btn");
    buttons.forEach((button) => button.classList.remove("active"));
    youtube.classList.add("active");

    render();
  });
});
