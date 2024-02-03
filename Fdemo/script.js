const shop = document.getElementById('shop')

let basket = JSON.parse(localStorage.getItem('data')) || []

let generateShop = () => {
  shop.innerHTML = shopItemsData.map((x) => {
        
      let {id,name,price,description,image} = x 
      console.log(image)

    return `
          <div class='shop_item'  id=prodcut-id-${id}>
               <img src= '${image}' alt='' />
               <div class='product_info' >
                      <h5>${name}</h5>
                      <p  class='price'> <span>$:</span> ${price} </p>
                       <p> ${description} </p>

                       <button onclick ="add_to_cart('${id}','${name}','${price}','${image}')">Add to Cart </button>
               </div>
           </div>  
    `

   })
}

let add_to_cart = (id,name,price,image) => {
 
  basket.push({
    id: id,
    item: 1,
    name: name,
    price: price,
    img:image
    })

  localStorage.setItem('data',JSON.stringify(basket))


  calculate()
}

let calculate = () => {
  let cart_icon = document.getElementById('cart_amount')
  let cart_amount = basket.length

   cart_icon.innerHTML = cart_amount
}


calculate()
generateShop()