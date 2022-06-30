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
    const newChoice = document.getElementById('new_choice').cloneNode(true);
    newChoice.removeAttribute('id');
    newChoice.classList.remove('hide');
    // 新しい入力欄を追加
    choicesList.insertAdjacentElement('beforeend', newChoice);
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

    // xx問目のセレクトボックスにoptionを追加
    const newOption = document.createElement('option');
    newOption.value = newQuestionNum;
    newOption.innerText = newQuestionNum;
    const orderSelect = document.getElementById('order_select');
    orderSelect.insertAdjacentElement('beforeend', newOption);
}

// 問題番号の重複をチェック
function checkSelectUnique() {
    const selectEls = document.querySelectorAll('.js_order_select');
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

window.addEventListener('DOMContentLoaded', () => {
    // xx問目のセレクトボックスに問題数分のoptionを入れる
    document.querySelectorAll('#questionsList>*').forEach((v, i) => {
        const iteration = i + 1;
        let optionEl = `<option value="${iteration}">${iteration}</option>`;
        document.querySelectorAll('.js_order_select').forEach((selectEl, questionIndex) => {
            if (iteration == questionIndex + 1) {
                optionEl = `<option value="${iteration}" selected>${iteration}</option>`;
            }
            selectEl.insertAdjacentHTML('beforeend', optionEl);
        });
    });
});
