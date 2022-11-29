//select_categorys

let category = document.querySelector('#category')

let cards = document.querySelectorAll('.card')
// console.log(cards);

category.addEventListener('change', function(){
  console.log(category.value);
  cards.forEach(function(card){
    if(!card.classList.contains(category.value)){
      card.style.display = 'none'
    }else{
      card.style.display = 'block'
    }
  })
})