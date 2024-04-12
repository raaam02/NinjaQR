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
      extension: "png", // 'png' 'jpeg' 'webp' 'svg'
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

  //   end dotColor eyeColor
});
