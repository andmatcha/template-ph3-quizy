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
