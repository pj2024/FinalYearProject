import products from './products.js';
import cart from './cart.js';

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


const initApp = () => {
     // load list product
     let listProductHTML = document.querySelector('#contentTab');
     listProductHTML.innerHTML = null;
     
     products.forEach(product => {
         let newProduct = document.createElement('div');
         newProduct.classList.add('item');
         newProduct.innerHTML = 
         `<div class="product-image">
             <img src="${product.image}">
          </div>
          <div class="text-content">
                <div class="product-name">${product.name}</div>
                <div class="product-desc">${product.description}</div>
                <span id="price">$${product.price}</span>
          </div>
         <button 
             class="add-to-cart" 
             data-id='${product.id}'>
                 Add To Cart
         </button>`;
         listProductHTML.appendChild(newProduct);
    });
}

initApp();