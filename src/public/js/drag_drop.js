document.querySelectorAll('.js_drag').forEach(item => {
    item.addEventListener('dragstart', e => {
        if (e.target.classList.contains('js_drag')) {
            e.dataTransfer.setData('text/plain', e.target.id);
        }
    });

    item.addEventListener('dragover', e => {
        e.preventDefault();
        let rect = e.target.getBoundingClientRect();

        if (e.target.classList.contains('js_drag')) {
            if ((e.clientY - rect.top) < (e.target.clientHeight / 2)) {
                //マウスカーソルの位置が要素の半分より上
                e.target.style.borderTop = '2px solid blue';
                e.target.style.borderBottom = '';
            } else {
                //マウスカーソルの位置が要素の半分より下
                e.target.style.borderTop = '';
                e.target.style.borderBottom = '2px solid blue';
            }
        }
    });

    item.addEventListener('dragleave', e => {
        if (e.target.classList.contains('js_drag')) {
            e.target.style.borderTop = '';
            e.target.style.borderBottom = '';
        }
    });

    item.addEventListener('drop', e => {
        e.preventDefault();
        let id = e.dataTransfer.getData('text/plain');
        let elm_drag = document.getElementById(id);

        let rect = e.target.getBoundingClientRect();

        if (e.target.classList.contains('js_drag')) {
            if ((e.clientY - rect.top) < (e.target.clientHeight / 2)) {
                //マウスカーソルの位置が要素の半分より上
                e.target.parentNode.insertBefore(elm_drag, e.target);
            } else {
                //マウスカーソルの位置が要素の半分より下
                e.target.parentNode.insertBefore(elm_drag, e.target.nextSibling);
            }
        }
        e.target.style.borderTop = '';
        e.target.style.borderBottom = '';
    });
});
