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

// 設問を追加
function addQuestion() {
    const questionsList = document.getElementById('questionsList');
    if (questionsList.childElementCount >= questionsLimit) {
        return;
    }
    const newQuestionNum = questionsList.childElementCount + 1;
    // 設問追加用のテンプレートをコピーして#iteration#をnewQuestionNumに置換してquestionListに挿入
    let newQuestion = document.getElementById('new_question').cloneNode(true);
    newQuestion.id = `new_question${newQuestionNum}`;
    newQuestion.classList.remove('hide');
    let newQuestionStr = newQuestion.outerHTML;
    newQuestionStr = newQuestionStr.replace(/\#iteration\#/g, newQuestionNum);
    const tmpEl = document.createElement('div');
    tmpEl.innerHTML = newQuestionStr;
    newQuestion = tmpEl.firstChild;
    questionsList.insertAdjacentElement('beforeend', newQuestion);
}

// フォーム送信
function sendForm() {
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

// 設問削除
function deleteQuestion(question_id, is_new) {
    if (is_new) {
        document.getElementById(`new_question${question_id}`).remove();
    } else {
        if (confirm('本当に削除しますか？')) {
            document.getElementById('delete_input').value = question_id;
            document.getElementById('delete_form').submit();
        }
    }
}

// 並び替えボタン
function sortBtn() {
    const sortBtnEl = document.getElementById('sort_btn');
    const editForm = document.getElementById('edit_form');
    const sortForm = document.getElementById('sort_form');
    editForm.classList.toggle('hide');
    sortForm.classList.toggle('hide');
    if (editForm.classList.contains('hide')) {
        sortBtnEl.innerText = '戻る';
    } else {
        sortBtnEl.innerText = '並び替え';
    }
}

function sendSortForm() {
    const sortForm = document.getElementById('sort_form');
    if (confirm('変更を確定しますか？')) {
        document.querySelectorAll('.js_order_input').forEach((el, index) => {
            el.value = index + 1;
        });
        sortForm.submit();
    }
}

// 設問が増えた場合並び替えボタンを消す
function switchSortBtnAvailability(questionCount) {
    const target = document.getElementById('questionsList');
    const config = {
        childList: true
    };

    const questionsListObserver = new MutationObserver(() => {
        const sortBtnEl = document.getElementById('sort_btn');
        if (document.getElementById('questionsList').childElementCount != questionCount) {
            sortBtnEl.classList.add('hide');
        } else {
            sortBtnEl.classList.remove('hide');
        }
    });

    questionsListObserver.observe(target, config);
}

// 並び替えボタン、並び替えがあったら完了ボタンにする
function switchSortDone(prevSortListItemIds) {
    const target = document.getElementById('sort_list');
    const config = {
        childList: true
    };

    const sortListObserver = new MutationObserver(() => {
        const sortBtnEl = document.getElementById('sort_btn');
        const doneBtnEl = document.getElementById('sort_done_btn');

        // 並び替え画面で設問が入れ替わったら戻るボタン(並び替えボタン)を消して完了ボタンを出す
        const sortListItemIds = [];
        document.querySelectorAll('#sort_list>*').forEach(el => {
            sortListItemIds.push(el.id);
        });
        if (JSON.stringify(sortListItemIds) !== JSON.stringify(prevSortListItemIds)) {
            sortBtnEl.classList.add('hide');
            doneBtnEl.classList.remove('hide');
        } else {
            sortBtnEl.classList.remove('hide');
            doneBtnEl.classList.add('hide');
        }
    });

    sortListObserver.observe(target, config);
}

window.addEventListener('DOMContentLoaded', () => {
    switchSortBtnAvailability(document.getElementById('questionsList').childElementCount);

    // 並び替え画面の設問の順序比較用
    const prevSortListItemIds = [];
    document.querySelectorAll('#sort_list>*').forEach(el => {
        prevSortListItemIds.push(el.id);
    });
    switchSortDone(prevSortListItemIds);
});
