document.getElementById("outer3").addEventListener("click", toggleState3);
    
    function toggleState3() {
      let galleryView = document.getElementById("galleryView")
      let tilesView = document.getElementById("tilesView")
      let outer = document.getElementById("outer3");
      let slider = document.getElementById("slider3");
      let tilesContainer = document.getElementById("tilesContainer");
      if (slider.classList.contains("active")) {
        slider.classList.remove("active");
        outer.classList.remove("outerActive");
        galleryView.style.display = "flex";
        tilesView.style.display = "none";
        
        while (tilesContainer.hasChildNodes()) {
          tilesContainer.removeChild(tilesContainer.firstChild)
          }  
      } else {
        slider.classList.add("active");
        outer.classList.add("outerActive");
        galleryView.style.display = "none";
        tilesView.style.display = "flex";
         
        for (let i = 0; i < imgObject.length - 1; i++) {
          let tileItem = document.createElement("div");
          tileItem.classList.add("tileItem");
          tileItem.style.background =  "url(" + imgObject[i] + ")";
          tileItem.style.backgroundSize = "contain";  
          tilesContainer.appendChild(tileItem);      
        }
      };
    }
    
    let imgObject = [
      "https://media-cdn.tripadvisor.com/media/photo-s/13/38/ba/99/photo1jpg.jpg",
      "https://media.sosanhnha.com/webp/450x450/2022/09/1662726404-picturex6okl.jpg",
      "https://media-cdn.tripadvisor.com/media/photo-s/14/a9/f3/f2/new-dormitory-at-mountain.jpg",
      "https://pt123.cdn.static123.com/images/thumbs/450x300/fit/2022/06/08/e16846cf-a3e1-4cc2-aa0c-b88a7ea143d9_1654656281.jpg",
      "https://media.sosanhnha.com/webp/450x450/2022/08/1660815525-pictureashci.jpg",
      "https://media.sosanhnha.com/webp/450x450/2022/08/1660473026-picturea30wy.jpg",
      "https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,e_sharpen:60,f_auto,h_450,q_auto,w_450/itemimages/96/58/9658230.jpeg",
      "https://media.sosanhnha.com/webp/450x450/2022/08/1660815525-pictureashci.jpg",
    ];
    
    let mainImg = 0;
    let prevImg = imgObject.length - 1;
    let nextImg = 1;
    
    function loadGallery() {
    
      let mainView = document.getElementById("mainView");
      mainView.style.background = "url(" + imgObject[mainImg] + ")";
    
      let leftView = document.getElementById("leftView");
      leftView.style.background = "url(" + imgObject[prevImg] + ")";
      
      let rightView = document.getElementById("rightView");
      rightView.style.background = "url(" + imgObject[nextImg] + ")";
      
      let linkTag = document.getElementById("linkTag")
      linkTag.href = imgObject[mainImg];
    
    };
    
    function scrollRight() {
      
      prevImg = mainImg;
      mainImg = nextImg;
      if (nextImg >= (imgObject.length -1)) {
        nextImg = 0;
      } else {
        nextImg++;
      }; 
      loadGallery();
    };
    
    function scrollLeft() {
      nextImg = mainImg
      mainImg = prevImg;
       
      if (prevImg === 0) {
        prevImg = imgObject.length - 1;
      } else {
        prevImg--;
      };
      loadGallery();
    };
    
    document.getElementById("navRight").addEventListener("click", scrollRight);
    document.getElementById("navLeft").addEventListener("click", scrollLeft);
    document.getElementById("rightView").addEventListener("click", scrollRight);
    document.getElementById("leftView").addEventListener("click", scrollLeft);
    document.addEventListener('keyup',function(e){
        if (e.keyCode === 37) {
        scrollLeft();
      } else if(e.keyCode === 39) {
        scrollRight();
      }
    });
    
    loadGallery();