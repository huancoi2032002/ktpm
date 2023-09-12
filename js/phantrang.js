let listProduct = document.querySelector('#list_product');
let numberPage = document.querySelector('#page');
let itemPage = document.querySelector('#item_page')
let currentPage = 1;
let product_page_number = 6;

$(document).ready(function(){
    loadData();
    phanTrang();
})


function loadData(){
    $.ajax({
        url: `../user/pagination.php?page=${currentPage}&product_page_number=${product_page_number}`,
        type: 'post',
        typeof: 'json',
        dataType: 'json',
        success: function(data){
            console.log(data);

            let content_str = data.record.map(record => `
                <a href="#">
                    <div class="box-product">
                        <div class="img-product">
                            <img src="${record.product_img}">
                        </div>
                        <div class="name-product">
                            <p>${record.product_name}</p>
                        </div>
                        <div class="price-product">
                            <p>${record.product_price} </p>
                        </div>
                        <div class="btn-product">
                            <script type="text/javascript">
                                
                                <button id="addproduct">Add To Cart</button>;
                            </script>
                        </div>
                    </div>
                </a>
            `).join('');
            listProduct.innerHTML = content_str;
        }
        

    })
}
$("#page").on("click","a li",function(event){
    event.preventDefault();
    currentPage = $(this).text();
    loadData();
})
function phanTrang(){
    $.ajax({
        url: `../user/pagination.php?page=${currentPage}&product_page_number=${product_page_number}`,
        type: 'post',
        typeof: 'json',
        dataType: 'json',
        success: function(data){
            console.log(data);
            let maxPage = Math.floor(data.totolRecord / product_page_number) + 1;

            for(let i=1; i <= maxPage ;i++){
                numberPage.innerHTML += `<a href="product.php?page=${i}" class="number_page" id="item_page"><li>${i}</li></a>`;
            }  
            
        }
    })
}

