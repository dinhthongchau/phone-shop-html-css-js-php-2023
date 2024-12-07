//--------------------Index ------------//



    const imgPosition = document.querySelectorAll(".img-container img");
    const imgContainer = document.querySelector('.img-container');
    const dotItem = document.querySelectorAll(".dot");
    // đếm số ảnh
    let imgNumber = imgPosition.length;
    // bắt đầu với chỉ mục hình ảnh là 0
    let index = 0;

    // dyệt qua từng hình ảnh và dấu chấm
    imgPosition.forEach(function (image, index) {
    
        image.style.left = index * 100 + "%";
       
        dotItem[index].addEventListener("click", function () {
            slider(index); 
        });

    });
    

    // chuyen anh theo thu tu
    function imgSlide() {
        index++;
        // nếu đã đến ảnh cuối cùng, quay lại ảnh đầu
        if (index >= imgNumber) {
            index = 0;
        }
        slider(index); // cập nhật 
    }   

    // cập nhật 
    function slider(index) {
        // chuyển vị trí ảnh
        imgContainer.style.left = "-" + index * 100 + "%";
        const dotActive = document.querySelector('.active');
        dotActive.classList.remove("active");

     
        dotItem[index].classList.add("active");
    }

    // Hàm lặp lại sau 4s
    setInterval(imgSlide, 4000);
//-----------------------------------Header ------------------------------//

    document.querySelector(".fa-magnifying-glass").addEventListener("click", function() {
        document.getElementById("searchForm").submit(); // Gửi form
    });
    
    document.getElementById("searchInput").addEventListener("keydown", function(event) {
        if (event.keyCode === 13) { // 13 là mã phím cho phím Enter
            event.preventDefault();
            document.getElementById("searchForm").submit(); 
        }
    });

//--------------------category ------------//
function redirectToProductDetail(productId) {
    window.location.href = 'product.php?product_id=' + productId;
}




function sortProducts() {
    var sortValue = document.getElementById("sortSelect").value;
    var url = 'category.php?search=' +'&sort=' + sortValue;
    window.location.href = url;
}


function searchByModel() {
    var selectedModel = document.getElementById("searchSelect").value;

    if (selectedModel) {
        window.location.href = 'category.php?search=' + selectedModel;
    }
    
}



    


//------------------------Product-------------------------//


const bigImg = document.querySelector(".product-content-left-big-img img");
const smallImg =document.querySelectorAll(".product-content-left-small-img img");
smallImg.forEach(function(imgItem, index){
    imgItem.addEventListener("click",function(){
       bigImg.src = imgItem.src;
    })
});









