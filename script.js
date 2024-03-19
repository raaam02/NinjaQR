document.addEventListener("DOMContentLoaded", function () {
  const url = document.getElementById("url");
  const colorInput = document.getElementById("colorInput");
  const image = document.getElementById("image");
  const eyeStyle = document.getElementById("eyeStyle");
  const dotStyle = document.getElementById("dotStyle");
  const size = document.getElementById("size");

  let op = {
    width: 300,
    height: 300,
    type: "svg",
    data: "https://github.com/raaam02",
    image: "images/Ninja NO BG Sharp.png",
    dotsOptions: {
      color: "#8c52ff",
      type: "rounded",
    },
    eyeOptions: {
      shape: "circle",
      color: "#000000",
    },
    backgroundOptions: {
      color: "#e9ebee",
    },
    imageOptions: {
      crossOrigin: "anonymous",
      margin: 2,
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

  eyeStyleDropdown.addEventListener("change", (e) => {
    const selectedEyeStyle = e.target.value;
    if (selectedEyeStyle) {
      op.eyeOptions = { shape: selectedEyeStyle };
      render();
    }
  });

  //   end
});
