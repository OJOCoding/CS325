let galleryImages= document.querySelectorAll(".gallery-img");
let getLatestImage;
let windowWidth = window.innerWidth;

if(galleryImages){
    galleryImages.forEach(function(image, index){
        image.onclick = function(){
            let getElementCss = window.getComputedStyle(image);
            let getFullImgUrl = getElementCss.getPropertyValue("background-image");
            let getImageUrlPos = getFullImgUrl.split("images/gallery_thumbnails/");
            let setNewImgUrl= getImageUrlPos[1].replace('.png")','.jpg');
            
            getLatestImage = index + 1;
            let container = document.body;
            let newImgWindow = document.createElement("div");
            container.appendChild(newImgWindow);
            newImgWindow.setAttribute("class", "img-window");
            newImgWindow.setAttribute("onclick", "closeImg()");

            let newImg = document.createElement("img");
            newImgWindow.appendChild(newImg);
            newImg.setAttribute("src", "images/gallery_imgs/"+ setNewImgUrl);
            newImg.setAttribute("id", "current-img");
        
            newImg.onload = function(){

                let imgWidth= this.width;
                let calcImgToEdge = ((windowWidth - imgWidth)/2) - 80;
                
                let newPreviousBtn= document.createElement("a");
                let newPreviousLabel= document.createTextNode("<");
                newPreviousBtn.appendChild(newPreviousLabel);
                container.appendChild(newPreviousBtn);
                newPreviousBtn.setAttribute("class","img-btn-prev");
                newPreviousBtn.setAttribute("onclick","changeImg(0)");
                newPreviousBtn.style.cssText="left: "+ calcImgToEdge+"px;";


                let newNextBtn= document.createElement("a");
                let newNextLabel= document.createTextNode(">");
                newNextBtn.appendChild(newNextLabel);
                container.appendChild(newNextBtn);
                newNextBtn.setAttribute("class","img-btn-next");
                newNextBtn.setAttribute("onclick","changeImg(1)");
                newNextBtn.style.cssText="right: "+ calcImgToEdge+"px;";

            }

            

        }
    });
}

function closeImg(){
    document.querySelector(".img-window").remove();
    document.querySelector(".img-btn-next").remove();
    document.querySelector(".img-btn-prev").remove();
    
}

function changeImg(changeDirection){
    document.querySelector("#current-img").remove();
    
    let getImgWindow = document.querySelector(".img-window");
    let newImg = document.createElement("img");
    getImgWindow.appendChild(newImg);
    
    let calcnewimg;
    if(changeDirection === 1 ){
        calcnewimg = getLatestImage + 1;
        if(calcnewimg > galleryImages.length){
            calcnewimg = 1;
        }
    }
    else if(changeDirection === 0)
    {
        calcnewimg = getLatestImage - 1;
        if(calcnewimg < 1){
            calcnewimg = galleryImages.length;
        }
    }

    newImg.setAttribute("src", "images/gallery_imgs/img"+ calcnewimg + ".jpg");
    newImg.setAttribute("id", "current-img");

    getLatestImage= calcnewimg;

    newImg.onload = function(){
        let imgWidth = this.width;
        let calcImgToEdge = ((windowWidth - imgWidth)/2) - 80;
        let nextBtn = document.querySelector(".img-btn-next");
        nextBtn.style.cssText = "right:" + calcImgToEdge + "px;"; 
        let prevBtn = document.querySelector(".img-btn-prev");
        prevBtn.style.cssText = "left:" + calcImgToEdge + "px;";     
    }

}