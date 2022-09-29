const product = [
  {
    id: 1,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 2,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 3,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 4,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 5,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 6,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 7,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 8,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 9,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 10,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 11,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 12,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 13,
    image: "../img/img_item/item2.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 14,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 15,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 16,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 17,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 18,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 19,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 20,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
  {
    id: 21,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 22,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 23,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 24,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 25,
    image: "../img/img_item/item3.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 27,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 28,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 29,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 30,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 31,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 32,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },

  {
    id: 33,
    image: "../img/img_item/item1.jpg",
    name: "BELL PERPER",
    evaluate: "Perfect",
    price: "$4.90",
  },
];

// const list_element = document.getElementById('list');
// const pagination_element = document.getElementById('pagination')

let current_page = 1;
let perPage = 12;
let start = 0;
let end = perPage;
const totalPages = Math.ceil(product.length / perPage);

const btnNext = document.querySelector(".btn_next");
const btnPrev = document.querySelector(".btn_prev");

function renderProduct() {
  html = "";
  const content = product.map((item, index) => {
    if (index >= start && index < end) {
      html += '<div class="col_product">';
      html += '<div class="product_item">';
      html += '<a href="#">';
      html += '<div class="product_img">';
      html += "<img src= " + item.image + ">";
      html += "</div>";
      html += '<div class="product_text">';
      html += "<h6>" + item.name + "</h6>";
      html += "<p>" + item.evaluate + "</p>";
      html += '<div class="price">' + item.price + "</div>";
      html += "</div>";
      html += '<div class="icon_product">';
      html += '<i class="bi bi-heart-fill favorites"></i>';
      html += '<i class="bi bi-cart-fill cart"></i>';
      html += "</div>";
      html += "</a>";
      html += "</div>";
      html += "</div>";
      return html;
    }
  });
  document.getElementById("product").innerHTML = html;
}
renderProduct();

btnNext.addEventListener("click", () => {
  current_page++;

  if (current_page > totalPages) {
    current_page = totalPages;
  }

  $('.number_page li').removeClass('active');
  $(`.number_page li:eq(${current_page -1})`).addClass('active');

  start = (current_page - 1) * perPage;
  end = current_page * perPage;

  renderProduct();
});

btnPrev.addEventListener("click", () => {
  current_page--;

  if (current_page <= 1) {
    current_page = 1;
  }

  $('.number_page li').removeClass('active');
  $(`.number_page li:eq(${current_page -1})`).addClass('active');


  start = (current_page - 1) * perPage;
  end = current_page * perPage;

  renderProduct();
});

function renderListPage() {
  let html = "";
  html += `<li class="active"><a>${1}</a></li>`;

  for (let i = 2; i <= totalPages; i++) {
    html += `<li><a>${i}</a></li>`;
  }
  document.getElementById("number_page").innerHTML = html;
}

renderListPage();

function changePage() {
  const currentPages = document.querySelectorAll(".number_page li");
  console.log(currentPages);
  for (let i = 0; i < currentPages.length; i++) {
    currentPages[i].addEventListener("click", () => {
      let value = i + 1;
      current_page = value;
      $('.number_page li').removeClass('active');
      currentPages[i].classList.add('active');
      start = (current_page - 1) * perPage;
      end = current_page * perPage;
      renderProduct();
    });
  }
}

changePage();


