// フォームの要素を取得
const form = document.getElementById('bq_form');
// 初めのタイトル・順序を保存
const titles = [];
document.querySelectorAll('.js_title_input').forEach(el => {
    titles.push(el.value);
});

// 編集ボタン押下時
function editBtn() {
    // 編集・完了ボタンの表示切り替え
    document.getElementById('edit_btn').classList.add('hide');
    document.getElementById('done_btn').classList.remove('hide');
    // draggable属性をtrueにする
    document.querySelectorAll('.js_drag').forEach(el => {
        el.setAttribute('draggable', true);
    });
    // ドラッグ用のアイコンと削除ボタンを表示
    document.querySelectorAll('.js_drag_icon, .js_delete_btn').forEach(el => {
        el.classList.remove('hide');
    });
    // 問題タイトルの表示部分を入力欄に変更
    document.querySelectorAll('.js_title_disp').forEach(el => {
        el.classList.add('hide');
    });
    document.querySelectorAll('.js_title_input').forEach(el => {
        el.classList.remove('hide');
    });
}

// 完了ボタン押下時
function doneBtn() {
    // 変更があるか判定
    const newTitles = [];
    document.querySelectorAll('.js_title_input').forEach(el => {
        newTitles.push(el.value);
    });
    if (JSON.stringify(titles) == JSON.stringify(newTitles)) {
        // 変更がない場合
        // 編集・完了ボタンの表示切り替え
        document.getElementById('edit_btn').classList.remove('hide');
        document.getElementById('done_btn').classList.add('hide');
        // draggable属性を削除する
        document.querySelectorAll('.js_drag').forEach(el => {
            el.removeAttribute('draggable');
        });
        // ドラッグ用のアイコンと削除ボタンを非表示
        document.querySelectorAll('.js_drag_icon, .js_delete_btn').forEach(el => {
            el.classList.add('hide');
        });
        // 問題タイトルの表示部分を入力欄から文字表示に変更
        document.querySelectorAll('.js_title_disp').forEach(el => {
            el.classList.remove('hide');
        });
        document.querySelectorAll('.js_title_input').forEach(el => {
            el.classList.add('hide');
        });
    } else {
        // 変更がある場合
        if (confirm('変更を確定しますか？')) {
            // 問題タイトルの順序を更新
            document.querySelectorAll('.js_bq_order').forEach((el, index) => {
                el.value = index + 1;
            });
            // フォーム送信
            form.submit();
        }
    }
}

function deleteBtn(bqId) {
    if (confirm('本当に削除しますか？')) {
        const deleteForm = document.getElementById('delete_form');
        const deleteInput = document.getElementById('delete_input');
        deleteInput.value = bqId;
        deleteForm.submit();
    }
}
