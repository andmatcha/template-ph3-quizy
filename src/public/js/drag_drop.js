document.querySelectorAll('.js_drag').forEach(item => {
    item.addEventListener('dragstart', () => {

    });

    item.addEventListener('dragover', () => {

    });

    item.addEventListener('dragleave', () => {

    });

    item.addEventListener('drop', () => {

    });
});



// document.querySelectorAll('.js_drag').forEach(elm => {
//     elm.ondragstart = function () {
//         event.dataTransfer.setData('text/plain', event.target.id);
//     };
//     elm.ondragover = function () {
//         event.preventDefault();
//         let rect = this.getBoundingClientRect();
//         if ((event.clientY - rect.top) < (this.clientHeight / 2)) {
//             //マウスカーソルの位置が要素の半分より上
//             this.style.borderTop = '2px solid blue';
//             this.style.borderBottom = '';
//         } else {
//             //マウスカーソルの位置が要素の半分より下
//             this.style.borderTop = '';
//             this.style.borderBottom = '2px solid blue';
//         }
//     };
//     elm.ondragleave = function () {
//         this.style.borderTop = '';
//         this.style.borderBottom = '';
//     };
//     elm.ondrop = function () {
//         event.preventDefault();
//         let id = event.dataTransfer.getData('text/plain');
//         let elm_drag = document.getElementById(id);

//         let rect = this.getBoundingClientRect();
//         if ((event.clientY - rect.top) < (this.clientHeight / 2)) {
//             //マウスカーソルの位置が要素の半分より上
//             this.parentNode.insertBefore(elm_drag, this);
//         } else {
//             //マウスカーソルの位置が要素の半分より下
//             this.parentNode.insertBefore(elm_drag, this.nextSibling);
//         }
//         this.style.borderTop = '';
//         this.style.borderBottom = '';
//     };
// });
