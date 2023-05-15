const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
  bar.addEventListener('click', () => {
    nav.classList.add('active');
  })
}

if (close) {
  close.addEventListener('click', () => {
    nav.classList.remove('active');
  })
}

function checkForNumber() {
  const firstChar = document.getElementById('nameForm').value['0'];
  try {
    if (!isNaN(firstChar)) {
      throw 'number';
    }
    if(!firstChar.match(/[a-z]/i)){
      throw 'character';
    }
  }catch(err){
    alert(`Name should not start with ${err}`);
  }
}

function greet(name) {
  alert(`Thank you for contacting us ${name}`);
}
function callback1(callback) {
  const name = document.getElementById('nameForm').value;
  callback(name)
}


////





function checkEmpty(gName, gEmail, gSubject) {

  if (gName.value == "") {
    alert("Please enter Name");
    event.preventDefault();
  } else {
    if (gEmail.value == "") {
      alert("Please enter Email");
      event.preventDefault();
    } else {
      if (gSubject.value == "") {
        alert("Please write a Subject");
        event.preventDefault();
      } else {
        setTimeout(() => {
          callback1(greet);
        }, 2000);
        event.preventDefault();
      }
    }
  }
}



/////Object Books
var dollar = "$";

const books = [
  {
    bookName: "Harry Potter and the Philosopher's Stone",
    authorName: "J.K",
    authorSurname: "Rowling",
    price: 12
  },
  {
    bookName: "Harry Potter and the Prisoner of Azkaban",
    authorName: "J.K",
    authorSurname: "Rowling",
    price: 12
  },
  {
    bookName: "Game of Thrones",
    authorName: "George",
    authorSurname: "R. Martin",
    price: 24
  },
  {
    bookName: "The Winds of Winter",
    authorName: "George",
    authorSurname: "R. Martin",
    price: 24
  }
];



function getFullName(item) {
  return [item.authorName, item.authorSurname].join(" ");
}

$("#author1").html(books.map(getFullName)[0]);
$("#bookName1").html(books.map(books => books.bookName)[0]);
$("#bookPrice1").html(books.map(books => books.price)[0] + dollar);

$("#author2").html(books.map(getFullName)[1]);
$("#bookName2").html(books.map(books => books.bookName)[1]);
$("#bookPrice2").html(books.map(books => books.price)[1] + dollar);

$("#author3").html(books.map(getFullName)[2]);
$("#bookName3").html(books.map(books => books.bookName)[2]);
$("#bookPrice3").html(books.map(books => books.price)[2] + dollar);

$("#author4").html(books.map(getFullName)[3]);
$("#bookName4").html(books.map(books => books.bookName)[3]);
$("#bookPrice4").html(books.map(books => books.price)[3] + dollar);




///// Check Stock for product
function checkStock(a) {
  if (a > 10) {
    alert("There is only 10 books in stock");
  }
}


//// 

$("#select").on('change', function () {
  switch ($(this).find('option:selected').text()) {
    case "Hardcover":
      $("#bookDes").html("Hardocover Description");
      break;
    case "Audiobook":
      $("#bookDes").html("Audiobook Description");
      break;
    default:
      $("#bookDes").html("PDF Description");
  }
});

////loop
function totalPrice(quantity) {
  var initialPrice = 12.00; // Initial price of the product
  var totalPrice = 0; // Variable to store the total price

  for (var i = 1; i <= quantity; i++) {
    totalPrice += initialPrice;
  }

  document.getElementById("price").innerHTML = '$' + totalPrice.toFixed(2);
}



////constructor object at contact
function Book(product, price) {
    this.productName = product;
    this.productPrice = price;
  }
  
  
  const cartBook1 = new Book("Sekretet e Familjes Tajd", 67);
  const cartBook2 = new Book("Harry Potter", 34);
  const cartBook3 = new Book("Kura e Shopenhauerit", 72);

  $("#product1").html(cartBook1.productName);
  $("#price1").html(cartBook1.productPrice);
  $("#product2").html(cartBook2.productName);
  $("#price2").html(cartBook2.productPrice);
  $("#product3").html(cartBook3.productName);
  $("#price3").html(cartBook3.productPrice);


  /////date object
  const d = new Date();
  document.getElementById("date").innerHTML = d;

function changeF(){
  let changeParagraph = document.getElementById("changeTake").innerHTML; 
  let changed = changeParagraph.replace(/R/g, 'W');
  document.getElementById("changeTake").innerHTML = changed;
}


 ////slide Effect
 $(document).ready(function(){
    $(".bUp").click(function(){
      $(".small-img-col").slideUp();
    });
    $(".bDown").click(function(){
      $(".small-img-col").slideDown();
    });
    
  });
//// hide and show
function Hide(){
  $("#cart").hide("fast", () => {
    alert("YOUR CART HAS BEEN HIDDEN");
  });

}

function Show(){
  $("#cart").show();
}

////
function fadeNote() {
  $('#thankNote').fadeIn(3000);
}
function animate1(){
  $('#animateButton').animate({left:'200px'}, 1000);
}
function getUrla(){
  $("#getButton").click(function(){
    alert($("#geturl1").attr("href"));
  });
}
function setTextt(textId){
  $(textId).text("OMG YOU FOUND ME");
  $('#appendButton').fadeIn(50);
}

function removeProduct(product){
    product.remove();
}
function appendText1(){
  $('#setText').append(' .OMG YOU FOUND ME. ');
}