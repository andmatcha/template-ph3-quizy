const questionsLimit = 20; //設問数の上限
const choicesLimit = 10; // 設問ごとの選択肢数上限

// ファイルをアップロードするとプレビューする
function previewFile(file, iteration) {
    var fileData = new FileReader();
    fileData.onload = (function () {
        document.getElementById(`imagePreview${iteration}`).src = fileData.result;
    });
    fileData.readAsDataURL(file.files[0]);
}

// 選択肢を追加
function addChoice(iteration, questionId) {
    const choicesList = document.getElementById(`choicesList${iteration}`);
    if (choicesList.childElementCount >= choicesLimit) {
        return;
    }
    // 新しいli要素を作る
    const newChoice = document.querySelector('.js_choice').cloneNode(true);
    newChoice.removeAttribute('id');
    newChoice.querySelector('input').value = '';
    newChoice.name = `new_choice[${questionId}]`;
    // 新しい入力欄を追加
    choicesList.insertAdjacentElement('beforeend', newChoice);
}

// 選択肢を削除
function deleteChoice(btn) {
    btn.parentNode.remove();
}

// 問題番号のoptionタグ
function createOptionHTML(num) {
    option = `<option value="${num}">${num}</option>`;
    return option;
}

// 設問を追加
function addQuestion() {
    const questionsList = document.getElementById('questionsList');
    if (questionsList.childElementCount >= questionsLimit) {
        return;
    }
    const newQuestionNum = questionsList.childElementCount + 1;
    // 設問追加用のテンプレートをコピーして#iteration#をnewQuestionNumに置換してquestionListに挿入
    let newQuestion = document.getElementById('new_question').cloneNode(true);
    newQuestion.removeAttribute('id');
    newQuestion.classList.remove('hide');
    let newQuestionStr = newQuestion.outerHTML;
    newQuestionStr = newQuestionStr.replace(/\#iteration\#/g, newQuestionNum);
    const tmpEl = document.createElement('div');
    tmpEl.innerHTML = newQuestionStr;
    newQuestion = tmpEl.firstChild;
    questionsList.insertAdjacentElement('beforeend', newQuestion);

    // 全てのセレクトボックスに新しいoptionタグを追加
    const newOption = createOptionHTML(newQuestionNum);
    document.querySelectorAll('#questionsList .js_order_select').forEach(el => {
        el.insertAdjacentHTML('beforeend', newOption);
    });

    // 新たに追加した設問のセレクトボックスの該当するoptionタグにselected属性を付与
    document.querySelectorAll('#questionsList .js_order_select')[newQuestionNum - 1].querySelector(`option[value="${newQuestionNum}"]`).setAttribute('selected', true);
}

// 問題番号の重複をチェック
function checkSelectUnique() {
    const selectEls = document.querySelectorAll('#questionsList .js_order_select');
    const values = [];
    selectEls.forEach(el => {
        values.push(el.value);
    });
    const setValues = new Set(values);
    if (setValues.size == values.length) {
        return true;
    } else {
        return false;
    }
}

function sendForm() {
    if (checkSelectUnique()) {
        const form = document.getElementById('edit_form');
        form.submit();
    } else {
        alert('問題番号が重複しています。');
    }
}

// 問題番号のoptionを選択した時にselected属性を切り替える
document.querySelectorAll('#questionsList .js_order_select').forEach(el => {
    el.addEventListener('change', () => {
        el.querySelector('option[selected]').removeAttribute('selected');

        const value = el.value;
        el.querySelector(`option[value="${value}"]`).setAttribute('selected', true);
    });
})

window.addEventListener('DOMContentLoaded', () => {
    // 問題番号のセレクトボックスに問題数分のoptionを入れる
    document.querySelectorAll('#questionsList>*').forEach((v, i) => {
        const iteration = i + 1;
        document.querySelectorAll('#questionsList .js_order_select').forEach((selectEl, questionIndex) => {
            optionEl = createOptionHTML(iteration);
            selectEl.insertAdjacentHTML('beforeend', optionEl);
        });
    });

    // 問題番号のoptionタグにselected属性をつける
    document.querySelectorAll('#questionsList .js_order_select').forEach((el, index) => {
        el.children[index].setAttribute('selected', true);
    });
});
