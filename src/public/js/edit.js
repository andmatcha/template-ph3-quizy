const questionsLimit = 20; //設問数の上限
const choicesLimit = 10; // 設問ごとの選択肢数上限
const deletedChoices = [];
let countAddChoice = 0;

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
    countAddChoice++;
    const choicesList = document.getElementById(`choicesList${iteration}`);
    if (choicesList.childElementCount >= choicesLimit) {
        return;
    }
    // 新しいli要素を作る
    const newChoice = document.querySelector('.js_choice').cloneNode(true);
    newChoice.querySelector('input[type="text"]').value = '';
    newChoice.querySelector('input[type="radio"]').value = `new_choice${countAddChoice}`;
    newChoice.querySelector('input[type="radio"]').removeAttribute('checked');
    newChoice.querySelector('.js_delete_btn').setAttribute('onclick', "deleteChoice(this, 'new')");
    if (questionId == 'new') {
        newChoice.querySelector('input[type="text"]').setAttribute('name', `new_questions[${iteration}][choices][new_choice${countAddChoice}]`);
        newChoice.querySelector('input[type="radio"]').setAttribute('name', `new_questions[${iteration}][valid_choice]`);
    } else {
        newChoice.querySelector('input[type="text"]').setAttribute('name', `questions[${questionId}][new_choices][new_choice${countAddChoice}]`);
        newChoice.querySelector('input[type="radio"]').setAttribute('name', `questions[${questionId}][valid_choice]`);
    }
    choicesList.insertAdjacentElement('beforeend', newChoice);
}

// 選択肢を削除
function deleteChoice(btn, choiceId) {
    if (choiceId != 'new') {
        deletedChoices.push(choiceId);
    }
    btn.parentNode.remove();
}

// // 問題番号のoptionタグ
// function createOptionHTML(num) {
//     option = `<option value="${num}">${num}</option>`;
//     return option;
// }

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

    // // 全てのセレクトボックスに新しいoptionタグを追加
    // const newOption = createOptionHTML(newQuestionNum);
    // document.querySelectorAll('.js_order_select').forEach(el => {
    //     el.insertAdjacentHTML('beforeend', newOption);
    // });

    // // 新たに追加した設問のセレクトボックスの該当するoptionタグにselected属性を付与
    // document.querySelectorAll('#questionsList .js_order_select')[newQuestionNum - 1].querySelector(`option[value="${newQuestionNum}"]`).setAttribute('selected', true);
}

// // 問題番号の重複をチェック
// function checkSelectUnique() {
//     const selectEls = document.querySelectorAll('#questionsList .js_order_select');
//     const values = [];
//     selectEls.forEach(el => {
//         values.push(el.value);
//     });
//     const setValues = new Set(values);
//     if (setValues.size == values.length) {
//         return true;
//     } else {
//         return false;
//     }
// }

// フォーム送信
function sendForm() {
    // if (!checkSelectUnique()) {
    //     alert('問題番号が重複しています。');
    //     return;
    // }

    const form = document.getElementById('edit_form');
    deletedChoices.forEach(choiceId => {
        const deleteInput = document.createElement('input');
        deleteInput.type = 'hidden';
        deleteInput.setAttribute('name', 'deleted_choices[]');
        deleteInput.value = choiceId;
        form.appendChild(deleteInput);
    });

    form.submit();
}

// // 問題番号のoptionを選択した時にselected属性を切り替える
// document.querySelectorAll('#questionsList .js_order_select').forEach(el => {
//     el.addEventListener('change', () => {
//         el.querySelector('option[selected]').removeAttribute('selected');

//         const value = el.value;
//         el.querySelector(`option[value="${value}"]`).setAttribute('selected', true);
//     });
// })

window.addEventListener('DOMContentLoaded', () => {
    // // 問題番号のセレクトボックスに問題数分のoptionを入れる
    // document.querySelectorAll('#questionsList>*').forEach((v, i) => {
    //     const iteration = i + 1;
    //     document.querySelectorAll('.js_order_select').forEach((selectEl, questionIndex) => {
    //         optionEl = createOptionHTML(iteration);
    //         selectEl.insertAdjacentHTML('beforeend', optionEl);
    //     });
    // });

    // // 問題番号のoptionタグにselected属性をつける
    // document.querySelectorAll('#questionsList .js_order_select').forEach((el, index) => {
    //     el.children[index].setAttribute('selected', true);
    // });
});
