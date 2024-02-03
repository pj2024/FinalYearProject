// import products from "./products";

const iconCart = document.querySelector(".cart-logo svg");
const closeCart = document.querySelector(".cartTab .btns .close");
const body = document.querySelector('body');
const searchBtn = document.querySelector(".search-icon svg");
const searchBarForm = document.querySelector(".search-input-form .search-form");

searchBtn.addEventListener("click", ()=>{
    searchBarForm.classList.toggle('active');
});

// open and close tab
iconCart.addEventListener('click', () => {
    body.classList.toggle('activeTabCart');
})
closeCart.addEventListener('click', () => {
    body.classList.toggle('activeTabCart');
})

const shop = document.getElementById('contentTab');

let basket = JSON.parse(localStorage.getItem('data')) || [];
// console.log(basket);


let generateShop = () => {
  shop.innerHTML = products.map((x) => {
        // console.log(x);
      let {id,name,price,image,description} = x;
        // console.log(image);
    return `<div class='item'>
                <div class="product-image">
                    <img src="${image}">
                </div>
                <div class="text-content">
                    <h2 class="product-name">${name}</h2>
                    <div class="product-desc">${description}</div>
                    <span id="price">$${price}</span>
                </div>
                <button class="add-to-cart" onclick ="add('${id}','${name}','${price}','${image}')">Add to Cart </button>
            </div>`;

   })
}

let add = (id,name,price,image) => {

    basket.push({
            id: id,
            item: 1,
            name: name,
            price: price,
            image:image
            })

    localStorage.setItem('data',JSON.stringify(basket));


    calculate();
}
    
generateShop();
// let newProduct = document.createElement('div');
// newProduct.classList.add('item');
// newProduct.innerHTML = 
    
  
let calculate = () => {
let cart_icon = document.getElementById('cart_amount')
let cart_amount = basket.length

    cart_icon.innerHTML = cart_amount
}

  
// calculate();