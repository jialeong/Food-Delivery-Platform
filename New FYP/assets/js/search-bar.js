/* Search bar function */
$(document).ready(function () {
    
    // remove default searchbar
    var itemTable = $('#itemList').DataTable({
        "sDom": "ltipr"
    });
    
    // search function
    $('#itemSearchBar').keyup(function () {
        itemTable.search($(this).val()).draw();
    });

});


// // search-bar : Use to search item

// // Library
// itemLib = [{"img": "assets/img/food-and-beverage/Roti-Kahwin.jpg", "itemName": "Roti Kahwin", "itemPr": "3.00", "itemType": "Food"},
//     {"img": "assets/img/food-and-beverage/Milo-Ais.jpg", "itemName": "Milo Ais", "itemPr": "2.50", "itemType": "Beverage"}];

// // Declaration
// const itemList = document.getElementById('itemList');
// const searchBar = document.getElementById('itemSearchBar');
// let menuItem = [];

// /* Search bar function */
// searchBar.addEventListener('keyup', (e) => {
//     const searchString = e.target.value.toLowerCase();

//     const filteredItem = menuItem.filter((lib) => {
//         return (
//                 lib.itemName.toLowerCase().includes(searchString) ||
//                 lib.itemPr.toLowerCase().includes(searchString)
//                 );
//     });
//     displayItem(filteredItem);
// });

// /* get item list */
// const loadMenuItem = async () => {
//     try {
// //        const res = await fetch(itemLib);
// //        hpCharacters = await res.json();
//         menuItem = itemLib;
//         displayItem(itemLib);
//     } catch (err) {
//         console.error(err);
//     }
// };


// /* DISPLAY ITEMS */
// const displayItem = (lib) => {
//     const htmlString = lib
//             .map((itemLib) => {
//                 return `
//             <tr id="item">
//                 <td><div class="photo">
//                 <img src="${itemLib.img}">
//                 </div>${itemLib.itemName}</td>
//                 <td>${itemLib.itemPr}</td>
//                 <td>${itemLib.itemType}</td>
//                 <td><button class="btn btn-primary btn-border btn-round" 
// data-toggle="modal" data-target="#addItemForm">Edit</button></td>
//             </tr>
//         `;
//             })
//             .join('');
//     itemList.innerHTML = htmlString;
// };

// loadMenuItem();


